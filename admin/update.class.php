<?php
@session_start();
include("../mysql.php");
$user_name=$_POST['username'];
$id=$_GET['id'];
$email=$_POST['email'];
$rank=$_POST['authority'];
$passwd=$_POST['password'];


$db=new DB();
$signal=$db->updateUser($id,$user_name,$passwd,$email,$rank);
if($signal){
	echo "<script>alert('更新成功');location.href='edit_user.php';</script>";
     }else {
       echo "<script>alert('更新失败！');history.back(); </script>";
     }


?>