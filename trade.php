
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Codester | Trade</title>
</head>
<body>
<?php  
@session_start();
include("header.php");
include("spinner.php"); 
include("mysql.php");

?>
<div class="bg-content">
    <!--  content  -->
    <div id="content"><div class="ic"></div>
        <div class="container">
            <div class="row">
                <article class="span8">
                    <div class="inner-1">
                        <ul class="list-blog">

                            

                        <?php 
                        $db=new DB();
                        $result=$db->getPost('1');
                        $prefix="where board= 1 and own = 0 ";
                        if(isset($_GET['curPage'])){
                            $page=$_GET['curPage'];
                        }else{
                          $page=1;
                        }
                        if($result){
                          $result=$db->fenye($result,"post",$page,$prefix);
                           while ($row=$db->fetch($result) ) {
                                
                                
                                echo '<li>
                                     <h3>'.$row['title'].'</h3>
                                    <time datetime="2017-04-07" class="date-1"><i class="icon-calendar icon-white"></i>'.$row['post_time'].'</time>
                                   <div class="name-author"><i class="icon-user icon-white"></i> <a href="#">'.$row['author'].'</a></div>
                                    <a href="#" class="comments"><i class="icon-comment icon-white"></i>评论数:0</a>

                                     <div class="clear"></div>'.$row['text'].'<br><br>';

                                   
                                   echo '<a href="tie.php?id='.$row['id'].'" class="btn btn-1">Read More</a></li>';
                            
                           }
                        }else{
                            echo "<li><h5>还没有人发言...宝宝心里苦> </h5></li>";
                           }
                        ?>


                    <div class="pagelist"> 
                     <?php
                            $maxPage=$_SESSION['maxPage'];
                            echo "<a href='board.php?curPage=$page'>".$page."</a>";
                        if($page>1){
                            $prevPage=$page-1;
                            echo "<a href='board.php?curPage=$prevPage'>上一页</a>";
                        }if($page<$maxPage){
                            $nextPage=$page+1;
                            echo "<a href='board.php?curPage=$nextPage'>下一页</a>";
                        }
                       

                    ?>
                    <!-- action并没有起到预期作用 -->
                    <form id="jump" action="board.php?curPage='document.getElementById('curPage').value'" method="GET" accept-charset="utf-8" >
                    <div class="clearfix">
                    <input type="text" name="curPage" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" >
                    <button type="submit"  id="submit_btn" class="btn btn-primary btn-lg">&nbsp;转&nbsp;到&nbsp; </button>
                    </form>
                    </div> 

                        
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
