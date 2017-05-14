<?php
@session_start();
@include 'mysql.php';
$db=new DB();

$file_id=$_GET['id'];
$info=$db->getFileInfo($file_id);
$info=$db->fetch($info);
$filePath=$info['path'];
$filename=$info['file_name'];

if($db->cancelShare($file_id)>0){
	echo "<script language='javascript'>alert('取消成功');location.href='yunpan.php';</script>";
}
?>