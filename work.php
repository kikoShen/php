<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Codester | Work</title>
	  
	</head>

	<body>

<?php 
@session_start(); 
include("header.php");
include("spinner.php"); 
include 'mysql.php';
$db=new DB();
if(empty($_GET['author'])||$_GET['author']==$_SESSION['username']){
    $who=$_SESSION['username'];
}else{
    $who=$_GET['author'];
}
?>
<div class="bg-content">       
  <!-- Content -->      
      <div id="content"><div class="ic"></div>
    <div class="container">
          <div class="row">
        <article class="span12">
        <h4>repository</h4>
         </article>
        <div class="clear"></div>
        <ul class="portfolio clearfix">   
<?php
 $result=$db->isPub($who);
 $rows=$db->getRows($result);
 if($rows>0){
   while ($row=$db->fetch($result) ) {  
     echo '<li class="box"><a href="cloud/'.$who."/".$row['file_name'].'" class="magnifier" >
     <img alt="" width="270" height="192" src="cloud/'.$who."/".$row['file_name'].'"></a>
     <a class="button border-red" href="download_file.php?id='.$row['id'].'"> <span ></span> 下载</a></li>';
   }
 }else{
  echo "<li>此人还未作出任何贡献</li>";
 }


?>
                 
           <!-- <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/1.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/2.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/3.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/4.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/5.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/6.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/7.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/8.jpg"></a></li>
           <div class="clear"></div>
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/9.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/10.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/11.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/12.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/13.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/14.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/15.jpg"></a></li> 
           <li class="box"><a href="img/image-blank.png" class="magnifier" ><img alt="" src="img/work/16.jpg"></a></li>   -->                
           </ul> 
      </div>
        </div>
  </div>
    </div>

<?php
include("footer.php"); 
?>
</body>
</html>