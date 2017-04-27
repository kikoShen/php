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
        $DOCUMENT_ROOT='cloud/'.$_SESSION['username'];//绝对路径开头带“／” ,相对路径直接写根目录下的路径名


        mkdir($DOCUMENT_ROOT);
		echo "<script language='javascript'>alert('register success');location.href='index.php';</script>";
	}else{
		echo "<script language='javascript'>alert('register failed');";
	}
    

?>
