<?php

$dir="cloud/kiko";

$re=mkdir($dir);


echo"Prepare to build file.<p>";

if($re){

	echo"File build complete.<p>";

	// $re1=rmdir($dir);

	if($re1){

		echo"File delete complete.<p>";

	}else{

		echo"File delete failed.<p>";

	}

}else{

	echo"File build failed.<p>";

}




?>
