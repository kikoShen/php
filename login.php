<?php
include("header.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<title>Codester | Login </title>


    <script>        
    
    function checkuser(){
        if(login.username.value!="")&&(login.password.value!=""){
            return true;
        }else{
            alert("用户名或密码不能为空！")
        }
    }            



    </script>
    <body>

    <?php  include("spinner.php"); ?>
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
        <form action="login.class.php" id="login_form" method="post" name="login"
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
   include("footer.php");
?>
  </body>

</html>
