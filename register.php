
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<title>Codester |  Register </title>

     <script type="text/javascript">

          function passwords(){
              var pas1,pas2;

              pas1=document.getElementById("password").value;
              pas2=document.getElementById("repassword").value;
              if(pas1.length<6){
                  $("#pass-result").html("密码长度小于6位");
                  $("#pass-result").css("color","red");
                  $("#submit_btn").attr("disabled", true);
                  return;
              }
              var regex = new RegExp('(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9]).{8,30}');//字母数字混合8-30位
              if(!regex.test(pas1)){
                  $("#pass-result").html(" too weak password");
                  $("#pass-result").css("color","red");
                  $("#submit_btn").attr("disabled", false);
                  return ;
              }
              if(!(pas1==pas2 && pas2!='')){
                  $("#pass-result").html("重复密码不匹配");
                  $("#pass-result").css("color","red");
                  $("#submit_btn").attr("disabled", true);
                  return;
              }else{
                  $("#pass-result").html("有效的密码");
                  $("#pass-result").css("color","green");
                  $("#submit_btn").attr("disabled", false);
              }

          }

    function checkuser(){
        if(register.username.value!="")&&(register.email.value!="")&&(register.password.value!="")&&(register.repassword.value!=""){
            return true;
        }else{
            alert("用户名或邮箱或密码不能为空！")
        }
    } 
          
      </script>

  <body>
   <?php
include("header.php");
   ?>
<div class="bg-content">
  
      <?php  
include("spinner.php"); 
?>
      <!-- content -->
 
        <div class="container">
          <div class="main_box">
    <div class="login_box">
      <div class="login_logo">
      <h3>注 册</h3>
      <a href="login.php">already have an account？click here</a>
      </div>
    
      <div class="login_form">
        <form action="register.class.php" id="login_form" method="post" onsubmit="return checkuser()" name="register">
        <div class="form-group" id="email-container">
              <label id="show-result"  class="t"></label>
            <label id="username" for="user_name" class="t">用户名：</label>
            <input id="username" value="" name="username" type="text"   class="form-control x319 in" autocomplete="off">
          </div>
          <div class="form-group" id="email-container">
              <label id="show-result"  class="t"></label>
            <label id="email-title" for="email" class="t">邮　箱：</label>
            <input id="email" value="" name="email" type="text"   class="form-control x319 in" autocomplete="off">
          </div>
          <div class="form-group">
              <label id="pass-result"  class="t"></label>
            <label for="password" class="t">密　码：</label>
            <input id="password" value=""  onkeypress="passwords()"  onblur="passwords()" name="password" type="password"
            class="password form-control x319 in"/>
          </div>
          <div class="form-group">
            <label for="repassword" class="t">确认密码：</label>
            <input id="repassword" value="" onkeypress="passwords()" onblur="passwords()" name="repassword" type="password"
            class="password form-control x319 in"/>
          </div>
          <div class="form-group">
            <label for="j_captcha" class="t">验证码：</label>
             <input id="j_captcha" name="j_captcha" type="text" class="form-control x164 in">
            <img id="captcha_img" alt="点击更换" title="点击更换" src="img/captcha.jpeg" class="m">
          </div>
          <div class="form-group space">
            <label class="t"></label>　　　
            <button type="submit"  id="submit_btn"
            class="btn btn-primary btn-lg"  >&nbsp;注&nbsp;册&nbsp; </button>
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
