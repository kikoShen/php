<?php
@session_start();
@include 'mysql.php';
$db=new DB();
$path=$_SESSION['USER_ROOT']."/";

function addFileToZip($path,$zip){
	$handler=opendir($path); 
	while(($filename=readdir($handler))!==false){
		if($filename != "." && $filename != ".."){
			if(is_dir($path."/".$filename)){
				addFileToZip($path."/".$filename, $zip);
        }else { //将文件加入zip对象
        	$zip->addFile($path."/".$filename);
        }
    }
}
@closedir($path);
}


if(($_FILES['file']['type']=="image/gif")||($_FILES['file']['type']=="image/jpeg")||($_FILES['file']['type']=="image/jpg")||($_FILES['file']['type']=="application/zip")||($_FILES['file']['type']=="application/octet-stream")||($_FILES['file']['type']=="image/png")){
	if($_FILES['file']['size']<30*1024*1024){ // 不超过30MB
		if($_FILES['file']['error']>0){
			echo "错误提示 : ".$_FILES['file']['error']."<br/>";
		}else{
			echo "文件名：".$_FILES['file']['name']."</br>";
			echo "size:".$_FILES['file']['size']."</br>";
			echo "type:".$_FILES['file']['type']."</br>";
			echo "tmp_time:".$_FILES['file']['tmp_name']."</br>";
			  //数据库中插入记录 先检验是否存在同名文件，有则弹出消息进行删除。再插入记录。
			if(file_exists($_SERVER['DOCUMENT_ROOT']."/".$_SESSION['USER_ROOT']."/".$_FILES['file']['name']))
				echo "<script language='javascript'>alert('存在同名文件,请先删除原文件！');location.href='yunpan.php';</script>";
			else{
				move_uploaded_file($_FILES['file']['tmp_name'], 
					$_SERVER['DOCUMENT_ROOT']."/".$_SESSION['USER_ROOT']."/".$_FILES['file']['name']);

				$filename= $_FILES['file']['name'];
				$info=$db->getSelf("user_name",$_SESSION['username']);
                    $DOCUMENT_ROOT=$DOCUMENT_ROOT='cloud/'.$_SESSION['username']."/";   //cloud/php/       
                    $file_result=$db->uploadFile($info['id'],$filename,$DOCUMENT_ROOT,$_FILES['file']['size']);//size:bytes
                    if($file_result)
                    	echo "<script language='javascript'>alert('上传成功');location.href='yunpan.php';</script>";
                    
                }
            }

        }
        else
        	echo "<script language='javascript'>alert('文件过胖了哦，请回去瘦身一下再来。');location.href='yunpan.php';</script>";

    }else{
    	$zip=new ZipArchive();
    // 	if($zip->open('share.zip', ZipArchive::OVERWRITE)=== TRUE){
    // 		addFileToZip($path, $zip); 
    // 		$zip->close(); 
    // 	}
    // }
    	if($zip->open('note.zip',ZipArchive::OVERWRITE)===TRUE){
    		$zip->addFile($_FILES['file']['name']);
    		$zip->close();
    	}
    }


    ?>

