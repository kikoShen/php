<?php
@session_start();
include 'mysql.php';
$file_id=$_GET['id'];
$db=new DB();
$info=$db->getFileInfo($file_id);
$info=$db->fetch($info);
$filePath=$info['path'];
$fileName=$info['file_name'];
$file=fopen($_SERVER['DOCUMENT_ROOT']."/".$filePath.$fileName,"r");
Header("Content-type:application/octet-stream");
Header("Accept-Range:bytes");
Header("Accept-Length:".$info['file_size']);
Header("Content-Disposition:attachment;filename=".$fileName);
echo  fread($file, $info['file_size']);
fclose($file);
echo "<script language='javascript'>location.href='yunpan.php';</script>";
?>