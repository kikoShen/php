<?php
@session_start();
$user=trim($_POST['username']);
$passwd=trim($_POST['password']);
$email=trim($_POST['email']);


include ("mysql.php");
    $db=new DB();
    $result=$db->register($user,$passwd,$email);
    
	if($result)
	{
        $_SESSION['username']=$user;
		echo "<script language='javascript'>alert('register success');location.href='index.php';</script>";
	}else{
		echo "<script language='javascript'>alert('register failed');";
	}
    

?>
