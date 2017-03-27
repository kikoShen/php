<?php
@session_start();
include("../mysql.php");
$user_name=$_POST['username'];
$id=$_GET['id'];
$email=$_POST['email'];
$rank=$_POST['authority'];
$passwd=$_POST['password'];
$sql="update user set user_name='".$user_name."',password='".$passwd."',email='".$email."',rank='".$rank."' where id='".$id."'";
$result=$link->query($sql)or die("修改失败！");

if($result){
 header("location:edit_user.php");
}

?>