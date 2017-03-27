<?php
include("../mysql.php");
$rowOnePage=7;
$sql="select * from user";
$result=$link->query($sql);
$totalRows=$result->num_rows;
if($totalRows%$rowOnePage==0){
	$maxPage=(int)($totalRows/$rowOnePage);
}else{
	$maxPage=(int)($totalRows/$rowOnePage)+1;
}
if(isset($_GET['curPage'])){
	$page=$_GET['curPage'];
}else{
	$curPage=$page=1;
}
$start=$rowOnePage*($page-1);
$query_str="SELECT * FROM user ORDER BY id LIMIT $start,$rowOnePage";
$result=$link->query($query_str);

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <base href="<%=basePath%>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="../css/pintuer.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 反馈管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall" onclick="SelectAll()"><span class="icon-check"></span> 全选</button>
          <button type="button" class="button border-red" onclick="DelSelect(-1)"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>邮箱</th>
        <th>等级</th>
         <th width="120">注册时间</th>
        <th>操作</th>       
      </tr>
      
<?php
while ($row=$result->fetch_assoc() ) {
    echo '<tr><td><input type="checkbox">'.$row['id']."</td><td>".$row['user_name']."</td><td>".$row['email']."</td><td>".$row['rank']."</td><td>".$row['create_time'].'</td><td><div class="button-group"> <a class="button border-red" href="userdelete.php?id='.$row['id'].'">
    <span class="icon-trash-o"></span> 删除</a> <a class="button border-red" href="rank.php?id='.$row['id'].'">
    <span class="icon-trash-o"></span> 编辑</a></div></td></tr>';
}
?>
     


      <td colspan="8"><div class="pagelist"> 
      <!-- <c:forEach var="i"  begin="1" end="${pages}" > </span><a href="admin/feedback_${i}.html">${i}</a></c:forEach>  -->
      <?php
      echo "<a href='?curPage=$page'>".$page."</a>";
if($page>1){
	$prevPage=$page-1;
	echo "<a href='?curPage=$prevPage'>上一页</a>";
}if($page<$maxPage){
	$nextPage=$page+1;
	echo "<a href='?curPage=$nextPage'>下一页</a>";
}
$result->close(); // 释放结果集;
$link->close();
      ?>
      </div></td>
    </table>
  </div>
</form>
<script type="text/javascript">
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(id){
    var Checkbox=false;
    var array = new Array();

    if(id!=-1){
        array.push(id);
        Checkbox=true;

    }else{
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
                var key=this.id;
                array.push(key);
                alert(key);
            }
        });
    }

	if (Checkbox){
        var t=confirm("您确认要删除选中的内容吗？");
        if (t==false) return false;
        else{
            $.ajax({
                url:'delete/contact',
                type:'post',
                data: "DeleteList=" + array,
                dataType: "json",
                success:function(data){
                    location.reload()
                },
                error:function(data){
                    alert("删除失败");
                },

            })
        }


    }
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body>
</html>