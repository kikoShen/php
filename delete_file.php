<?php
@session_start();
@include 'mysql.php';
$db=new DB();

$file_id=$_GET['id'];
$info=$db->getFileInfo($file_id);
$info=$db->fetch($info);
$filePath=$info['path'];
$filename=$info['file_name'];
delDir($filePath.$filename);

 if($info['type']==1){
  	$db->delFile($filePath,$filename);
  }else{
  	$db->delDir($filePath);
  }


echo "<script language='javascript'>alert('删除成功');location.href='yunpan.php';</script>";



?>

<?php
function delDir($dir){
	if(file_exists($dir)){
		if($dir_handle=@opendir($dir)){
			while($filename=readdir($dir_handle)){
				if($filename!="."&&$filename!=".."){
					$subFile=$dir."/".$filename;
					if(is_dir($subFile))
						delDir($subFile);
					if(is_file($subFile))
						unlink($subFile);
				}
			}
			closedir($dir_handle);
			rmdir($dir);
		}else{
			unlink($dir);
		}

	}
}

?>