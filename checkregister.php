<?php
@session_start();
$user=trim($_POST['username']);
$passwd=trim($_POST['password']);
$email=trim($_POST['emial']);


include ("mysql.php");

	$sql="insert into user(user_name,password,email) values('".$user."','".$passwd."','".$email."')";
    $result=$link->query($sql);
    
	if($result)
	{
        $_SESSION['username']=$user;
		echo "<script language='javascript'>alert('register success');location.href='index.php';</script>";
	}else{
		echo "<script language='javascript'>alert('register failed');";
	}


?>
