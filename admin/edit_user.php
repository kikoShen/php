<?php
include("../mysql.php");
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
<form method="post" action="delselect.php">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 反馈管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall" onclick="CheckAll()"><span class="icon-check"></span> 全选</button>
          <a href="delselect.php"><button type="button" class="button border-red" ><span class="icon-trash-o"></span> 批量删除</button></a>
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
function convertRank($rank){
  switch ($rank) {
    case '0':
      return '超级管理员' ;
      break;
    case '1':
      return '管理员' ;
      break;
    case '2':
      return '普通用户' ;
      break;
    default:
      return '非法用户';
      break;
  }

 function delete($id){
    $db=new DB();
    $signal=$db->deleteSingleUser("id",$id);
    if($signal){
    header("location:edit_user.php");
     }else {
       echo "<script>alert('删除用户失败！');history.back(); </script>";
     }
 }

}
 ?>


<?php 
                        $db=new DB();
                        $result=$db->getUsers();
                        if(isset($_GET['curPage'])){
                            $page=$_GET['curPage'];
                        }else{
                          $page=1;
                        }
                           
                          $result=$db->fenye($result,"user",$page,"");


                           while ($row=$db->fetch($result) ) {                     
                        echo '<tr><td><input type="checkbox" name="dell[]">'.$row['id']."</td><td>".$row['user_name']."</td><td>".$row['email']."</td><td>" ;
                          echo convertRank($row['rank'])."</td><td>".$row['create_time'].'</td><td><div class="button-group"> 
                           <a class="button border-red" href="userdelete.php?id='.$row['id'].'">
                          <span class="icon-trash-o"></span> 删除</a> <a class="button border-red" href="rank.php?id='.$row['id'].'">
                          <span class="icon-cog"></span> 编辑</a></div></td></tr>';
                            
                           }
                        
 ?>
     


      <td colspan="8"><div class="pagelist"> 
      <!-- <c:forEach var="i"  begin="1" end="${pages}" > </span><a href="admin/feedback_${i}.html">${i}</a></c:forEach>  -->
<?php
$maxPage=$_SESSION['maxPage'];
echo "<a href='edit_user.php?curPage=$page'>".$page."</a>";
if($page>1){
	$prevPage=$page-1;
	echo "<a href='edit_user.php?curPage=$prevPage'>上一页</a>";
}if($page<$maxPage){
	$nextPage=$page+1;
	echo "<a href='edit_user.php?curPage=$nextPage'>下一页</a>";
}
?>

      
    
      </div></td>
    </table>
  </div>
</form>
<script type="text/javascript">
var checkall=document.getElementsByName("dell[]");  
            function CheckAll(){                          //全选  
                for(var $i=0;$i<checkall.length;$i++){  
                    checkall[$i].checked=true;  
                }  
            }  




</script>
</body>
</html>