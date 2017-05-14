<?php 
@session_start();
include "mysql.php";
if(isset($_SESSION['username'])){
   $user=$_SESSION[username];

}else{
 echo "<script language='javascript'>alert('请先登录');location.href='login.php';</script>";

}

function FileSizeChange($size){
    $kb=$size/1024;
    if($kb>0.5&&$kb<1024)
        $size=substr($kb, 0,4).KB;
    if($kb>1024)
        $size=substr($kb, 0,4).MB;
    if($kb<0.5)
        $size=$size.Bytes;
    return $size;
}
function FileSuffix($filename){ //去掉后缀名.xxx 
    $filename=explode(".", $filename);
    return $filename[0];
}




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<title>Codester |  Repository </title>
</html>
<body>
    <?php
    include("header.php");
    ?>
    <div class="bg-content">
        <?php  
        include("spinner.php"); 
        ?>
        <div class="bg-content">
         <div id="content"><div class="ic"></div>
         <div class="container">
            <div class="row">
              <article class="span8">
                <div class="inner-1">
                 <ul class="list-blog">
                   <li>
                   <!--  <div class="small" >   
                        <input type="file" hidden="true" id="file_upload" name="addon" />
                        <button type="button"  id="file_button"
                        class="btn btn-primary btn-lg" onclick="document.getElementById('file_upload').click();" >&nbsp;上&nbsp;传&nbsp; </button>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div> -->

                    <form role="form" action="upload_file.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="file">上传文件</label>
                            <input type="file" id="file" name="file">
                        </div>
                        
                        <button type="submit" class="btn btn-default">提交</button>
                    </form>



                </li>
                <li>
                    <table class="table table-hover text-center">

                        <?php

        // 直接读取的本地文件，应该从user_files读取
        // $path=$_SESSION["DOCUMENT_ROOT"];
        // @$handle=opendir(path);
        // $sum=0;
        // if($handle){
        //    while($file=readdir($handle)){
        //      $dir=$path."/".$file;
        //      echo "文件名：".$file."&nbsp;&nbsp;";
        //      echo "size:".@filesize($file)."&nbsp;&nbsp;";
        //      echo "creatime:".@date("Y-m-j H:i:s",filectime($file))."&nbsp;&nbsp;";   
        //      $sum+1;
        //                              echo "<hr/>"; //水平线分隔
        //                              echo "已全部加载，共".$sum."个";
        //                              closedir($handle);
        //                          }
        //                      }else{
        //                         echo "<h3>Please commit your files first.</h3>";
        //                     }


         // 根据路径和文件名来遍历
                        $db=new DB();
                        if(isset($_GET['curPage'])){
                            $page=$_GET['curPage'];
                        }else{
                          $page=1;
                      }
                      $path=$_SESSION["USER_ROOT"]."/";
                      $result=$db->getFiles($path);
                      $rows=$db->getRows($result);
                      $prefix="where path ='".$path."'";
                      if($rows>0){
                        echo ' <tr>
                        <th><input type="checkbox" name="SelectAll[]"></th>
                        <th width="150">文件名</th>       
                        <th>大小</th>    
                        <th width="160">修改时间</th>
                        <th width="150">操作</th>       
                    </tr>';                
                    $result=$db->fenye($result,"user_files",$page,$prefix);                         
                    $sum=0;

                    while ($row=$db->fetch($result) ) {  
                        echo '<tr><td><input type="checkbox" name="dell[]"></td>';
                        // echo '<td><a href="yunpan.php?path='.$path."/".$row['file_name'].'">'.$row['file_name']."</a></td>";
                        echo "<td>".FileSuffix($row['file_name'])."</td>";
                        echo "<td>".FileSizeChange($row['file_size'])."</td>" ;

                        echo "<td>".$row['create_time'].'</td>
                        <td><div class="button-group"> 
                           <a class="button border-red" href="delete_file.php?id='.$row['id'].'"><span ></span> 删除</a> 
                           <a class="button border-red" href="download_file.php?id='.$row['id'].'"> <span ></span> 下载</a>';
                           if($row['pub']==0)
                               echo '<a class="button border-red" href="share_file.php?id='.$row['id'].'"> 共享</a>';
                           else
                            echo '<a class="button border-red" href="cancel_share.php?id='.$row['id'].'"> 取消共享</a>';
                        echo '</div></td></tr>';
                        $sum+=1;


                    }
                    echo "已全部加载，共".$sum."个";
                }else{
                    echo "<li><h3>Please commit your files first.</h3></li>";
                }
                ?>

                <td colspan="8"><div class="pagelist"> 
                  <!-- <c:forEach var="i"  begin="1" end="${pages}" > </span><a href="admin/feedback_${i}.html">${i}</a></c:forEach>  -->
                  <?php
                  $maxPage=$_SESSION['maxPage'];
                  echo "<a href='yunpan.php?curPage=$page'>".$page."</a>";
                  if($page>1){
                    $prevPage=$page-1;
                    echo "<a href='yunpan.php?curPage=$prevPage'>上一页</a>";
                }if($page<$maxPage){
                    $nextPage=$page+1;
                    echo "<a href='yunpan.php?curPage=$nextPage'>下一页</a>";
                }
                ?>



            </div></td>
        </table>

    </li>
</ul>
</div>
</article>
</div>
</div>



</div>
<?php
include("footer.php"); 
?>
</body>