
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Codester | Search</title>
</head>
<body>
<?php  
@session_start();
include("header.php");
include("spinner.php"); 
include("mysql.php");

?>
<div class="bg-content">  

<!-- only  content  changes-->
<section id="content">
  <div class="container">
    <div class="row">
      <div class="span12">
            <h3>Search result:</h3>
            <div id="search-results"></div>
    </div>  
    </div>        

</div>  
</section>
</div>

   <?php include("footer.php"); ?>
</body>
</html>
