<?php  
@session_start();
include("header.php");
include("spinner.php"); 
include("mysql.php");
$db=new DB();
$row=$db->getTie($_GET['id']);
// var_dump($_SESSION['condition']);
// var_dump($_SESSION['result']);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Codester | <?php  echo $row['title'];?></title>
</head>
<body>

<div class="bg-content">
    <!--  content  -->
    <div id="content"><div class="ic"></div>
        <div class="container">
            <div class="row">
                <article class="span8">
                    <div class="inner-1">
                        <ul class="list-blog">

                            

                        <?php 
                        if($row){    
                                echo '<li>
                                     <h3>'.$row['title'].'</h3>
                                    <time datetime="2017-04-07" class="date-1"><i class="icon-calendar icon-white"></i>'.$row['post_time'].'</time>
                                   <div class="name-author"><i class="icon-user icon-white"></i> <a href="#">'.$row['author'].'</a></div>
                                    <a href="#" class="comments"><i class="icon-comment icon-white"></i>评论数:0</a>

                                     <div class="clear"></div>'.$row['text'].'<br><br></li>';

                                   
                            
                           
                        }else{
                            header("location:404.php");
                           }
                        ?>

                        
                             </ul>
      




                    
                    </div> <!-- inner-1 -->

                </article>
                 <?php
                 include("right_nav.php");
                ?>
            </div>
        </div>
    </div>
 </div>

   <?php include("footer.php"); ?>
</body>
</html>
