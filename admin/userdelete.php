<?php
include("../mysql.php");
// $sql="delete from user where id='".$_GET['id']."'";

//    $link->query($sql);
$id=$_GET['id'];
$db=new DB();
    $signal=$db->deleteSingleUser("id",$id);
    // echo $_SESSION['condition'];
    // var_dump($signal);
    if($signal){
    header("location:edit_user.php");
     }else {
       echo "<script>alert('删除用户失败！');history.back(); </script>";
     }

 

?>
