<?php
include("../mysql.php");
$sql="delete from user where id='".$_GET['id']."'";

   $link->query($sql);
 
  header("location:edit_user.php");
?>
