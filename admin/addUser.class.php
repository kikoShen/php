<?php
@session_start();
include("../mysql.php");
$user_name=$_POST['username'];
$email=$_POST['email'];
$rank=$_POST['authority'];
$passwd=$_POST['password'];


$db=new DB();
$signal=$db->addUser($user_name,$passwd,$email,$rank);
if($signal){
	echo "<script>alert('添加成功');location.href='edit_user.php';</script>";
     }else {
       echo "<script>alert('添加失败！');history.back(); </script>";
     }


?>