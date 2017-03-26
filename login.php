

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<title>Codester | Login </title>
<link rel="icon" href="http://dzyngiri.com/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="http://dzyngiri.com/favicon.png" type="image/x-icon" />
    <meta name="description" content="Codester is a free responsive Bootstrap template by Dzyngiri">
    <meta name="keywords" content="free, template, bootstrap, responsive">
    <meta name="author" content="Inbetwin Networks">  
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/kwicks-slider.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>    
    <script type="text/javascript" src="js/touchTouch.jquery.js"></script>
    <script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}  </script>

    <script>        
         jQuery(window).load(function() {   
         $x = $(window).width();        
    if($x > 1024)
    {           
    jQuery("#content .row").preloader();    }   
         
     jQuery('.magnifier').touchTouch();         
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});  
          }); 
    
    function checkuser(){
        if(login.username.value!="")&&(login.password.value!=""){
            return true;
        }else{
            alert("用户名或密码不能为空！")
        }
    }            



    </script>
<div class="bg-content">
  
      
      <!-- content -->
        <div class="container">
          <div class="main_box">
    <div class="login_box">
      <div class="login_logo">
      <h3>登 录</h3>
      <a href="register.php">sign up to find interesting thing</a>
      </div>
    
      <div class="login_form">
        <form action="checklogin.php" id="login_form" method="post" name="login"
             onsubmit="return checkuser()">
          <div class="form-group">
            <label for="text" class="t">用户名　：</label>
            <input id="username"  name="username" type="text" class="form-control x319 in"
            autocomplete="off">
          </div>
          <div class="form-group">
            <label for="password" class="t">密　码：</label>
            <input id="password"  name="password" type="password"
            class="password form-control x319 in">
          </div>
          
          <!-- <div class="form-group">
            <label for="j_captcha" class="t">验证码：</label>
             <input id="j_captcha" name="j_captcha" type="text" class="form-control x164 in">
            <img id="captcha_img" alt="点击更换" title="点击更换" src="img/captcha.jpeg" class="m">
          </div>
           <div class="form-group">
            <label class="t"></label>
            <label for="j_remember" class="m">
            <input id="j_remember" type="checkbox" value="true">&nbsp;记住登陆账号!</label>
          </div> -->
          <div class="form-group space">
            <label class="t"></label>　　　
            <button type="submit"  id="submit_btn"
            class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp; </button>
            <input type="reset" value="&nbsp;重&nbsp;置&nbsp;" class="btn btn-default btn-lg">
          </div>
        </form>
      </div>
    </div>
    
  </div>
      </div>
    </div>


<?php 
   
?>
  
<!-- footer -->
<footer>
      <div class="container clearfix">
    <ul class="list-social pull-right">
          <li><a class="icon-1" href="#"></a></li>
          <li><a class="icon-2" href="#"></a></li>
          <li><a class="icon-3" href="#"></a></li>
          <li><a class="icon-4" href="#"></a></li>
        </ul>
    <div class="privacy pull-left">&copy; Copyright &copy; 2016.College Art  All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/"></a></div>
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
  </body>
</html>
