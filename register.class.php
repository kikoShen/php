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
    $filename=iconv("GB2312", "UTF-8", $_SESSION['username']);
        //绝对路径开头带“／” ,相对路径直接写根目录下的路径名
        $DOCUMENT_ROOT='cloud/'.$filename; //cloud/php
        $_SESSION['USER_ROOT']=$DOCUMENT_ROOT;
        
        
    }else{
      echo "<script language='javascript'>alert('register failed');";
  }

     $mkdir=mkdir($DOCUMENT_ROOT);//创建文件夹
     $info=$db->getSelf("user_name",$_SESSION['username']);
     $dir_result=$db->createDir($info['id'],$filename,$DOCUMENT_ROOT);
     if($mkdir&&$dir_result){
      echo "<script language='javascript'>alert('register success');location.href='index.php';</script>";
  }else{
      echo "<script language='javascript'>alert('register failed');";
  }
  

  ?>
