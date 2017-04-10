<?php 
   $user=trim($_POST['username']);
   $passwd=trim($_POST['password']);
   
   require_once("mysql.php");
   $db=new DB();
   $row=$db->login($user,$passwd);
   if($row){
        session_start();
        $_SESSION['username']=$row['user_name'];
        echo "<script language='javascript'>alert('Login Success');location.href='index.php';</script>";
   }else{
     print "<script>alert('密码或用户名错误！');history.back(); </script>";
   }

?>