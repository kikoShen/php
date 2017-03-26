<?php 
   $user=trim($_POST['username']);
   $passwd=trim($_POST['password']);
   

   include ("mysql.php");

   $sql="select user_name,password from user where user_name = '$_POST[username]' and password = '$_POST[password]'";  
   $result=$link->query($sql) or die(mysql_error());
   if($result->num_rows>0){
        $row=$result->fetch_assoc();
        session_start();
        $_SESSION['username']=$row['user_name'];
        echo "<script language='javascript'>alert('Login Success');location.href='index.php';</script>";
   }else{
     print "<script>alert('密码或用户名错误！');history.back(); </script>";
   }

?>