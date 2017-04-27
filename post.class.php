<?php
@session_start();
@include("mysql.php");

$author=$_SESSION['username'];
$text=trim($_POST['editor1']);
$board=$_POST['types'];
$title=$_POST['title'];


$db=new DB();
   $row=$db->post("0",$board,$title,$text,$author);

if($row)
	{

        // $_SESSION['type']=$board;
		echo "<script language='javascript'>location.href='board.php';</script>";
	}else{
		echo "<script language='javascript'>alert('unknown error......');";
	}



// function SelPost($type){
//    $conn=new Conn();
//    $db=$conn->open();
  
   
//    if($type=='board'){
//    	$sql="select * from post where own ='0'";
//    }else{
//    	$sql="select * from post where own ='0' and board ='".$type."'";
//    }
//    $rs=$db->query($sql);
//    if(!$rs->EOF){
//        return $rs;
//    }else{
//    	   return null;
//    }





?>