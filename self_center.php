<?php 
@session_start();
?>
<script language="javascript" type="text/javascript">
    if(top.location!=self.location)top.location=self.location;
</script>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Codester | SelfCenter</title>
	<meta charset="utf-8">
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
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
<script type="text/javascript">
    var count=0;
    function update_userdata(){
        if(count==0){
            document.getElementById('user_name').disabled = false;
            document.getElementById("real_name").disabled=false;
            count++;
        }else{
                document.getElementById('data_form').submit();
            count=0;
        }
    }var count2=0;
    function update_password(){
        if(count2==0){

            document.getElementById('pre_password').disabled = false;
            document.getElementById("password").disabled=false;
            document.getElementById("repassword").disabled=false;
            count2++;
        }else{
                document.getElementById('data_form2').submit();
            count2=0;
        }
    }
    function agre(id1,id2,id3){
        var array = new Array();
        array.push(id1);
        array.push(id2);
        array.push(id3);
        $.ajax({
            url:'friend/agr',
            type:'post',
            async : false,
            data: "FriendPair=" + array,
            dataType: "json",
            success:function(data){
                location.reload();
                $("div #friend-list").html(data);
                $("div #friend_make").html(data);
                $("div #message-box").html(data);
            },
            error:function(data){
                alert("添加失败");
            },

        })
    }
    var showing= 0;
    function show(){
        if(showing==0){
            $("div #e-talk").show();
            showing=1;
        }else{
            $("div #e-talk").hide();
            showing=0;
        }
    }
    function del(id1,id2){
        var array = new Array();
        array.push(id1);
        array.push(id2);
        $.ajax({
            url:'friend/de',
            type:'post',
            data: "FriendPair=" + array,
            dataType: "json",
            async : false,
            success:function(data){
                location.reload();
                $("div #friend-list").html(data);
                $("div #friend_make").html(data);
                $("div #message-box").html(data);
            },
            error:function(data){
                alert("删除失败");
            },

        })
    }
    function disag(id){
        $.ajax({
            url:'http://localhost:8080/YouthEase/message/del_friend_request',
            type:'post',
            data: "msgid=" + id,
            dataType: "json",
            success:function(data){
                location.reload();
                $("div #message-box").html(data);

            },
            error:function(data){
                alert("拒绝失败");
            },

        })
    }
</script>
</head>
<body>
	

<!-- header start -->
<header>
      <div class="container clearfix">
    <div class="row">
          <div class="span12">
        <div class="navbar navbar_">
              <div class="container">
            <h1 class="brand brand_"><a href="index.html"><img alt="" src="img/logo.png"> </a></h1>
            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
                  <ul class="nav sf-menu">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="work.html">Work</a></li>
                <li><a href="blog.html">Blog</a></li>
                <?php 
                  if(isset($_SESSION['username'])){
                    echo '<li class="sub-menu"><a href="self_center.php">'.$_SESSION['username'].'</a><ul>
                    <li><a href="logout.php">Logout</a></li>
                  </ul></li>';
                  }else{
                    echo '<li><a href="login.php">Login</a></li>';
                  }
                ?>
                
                <li><a href="contact.html">Contact</a></li>
              </ul>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </header>

<div class="bg-content">
    <div id="content"><div class="ic"></div>
        <div class="container">
            <div class="row">


                <article class="span8" style="float:right" >
                    <h4>我的帖子</h4>
                    <div class="inner-1">
                        <ul class="list-blog">
                            beta-version

                            <div class="container" >
                                <iframe scrolling="auto" rameborder="0" src="${centerUser.id}_1.myforum" name="right" width="80%" height="60%"></iframe>
                            </div>

                        </ul>

                    </div>

                    <c:if test="${centerUser.id==user.id}">

                        <div class="inner-1">
                            <div class="container" hidden="true" id="e-talk">
                                <h4>奇妙交流</h4>
                                <iframe scrolling="auto"  rameborder="0" src="etalk_out.html" name="right" width="80%" height="60%"></iframe>
                            </div>
                        </div>
                    </c:if>
                </article>


                <article class="span4">
                    <article class="span12">
                        <h3 >头像</h3>
                    </article>
                    <div class="thumbnails thumbnails-1 ">
                        <img  src="${iconUrl}" alt="" width="265"  >  </div>
                    <div>
                        <c:if test="${user.id==centerUser.id}">
                            <section> <a href="#" class="link-1"></a>
                                <form id="${user.id}" action="uploads/userIcon" method="post" enctype="multipart/form-data">
                                    照片：<input type="file" name="icon" src=""/>
                                    <button type="submit"  id="submit_btn"
                                            class="btn btn-primary btn-lg">&nbsp;上&nbsp;传&nbsp; </button>
                                </form>
                            </section>
                        </c:if>
                    </div>
                </article>
                <article class="span8" style="float:none;width: 300px;">
                    <h3 >个人资料</h3>
                    <form id="data_form" action = "user/update">

                        <div class="control-group">
                            <label class="control-label" for="user_name">用户名：</label>
                            <div class="controls">
                                <input type="text" name="nuserName" id="user_name" placeholder="user_name" value="${centerUser.nuserName}" disabled="true">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="real_name">真实姓名：</label>
                            <div class="controls">
                                <input type="text" name="realName" id="real_name" placeholder="real_name" value="${centerUser.realName}" disabled="true">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail" >邮箱：</label>
                            <div class="controls">
                                <input type="text" name="email" id="inputEmail" placeholder="Email" value="${centerUser.email} "disabled= "true">
                            </div>
                        </div>
                        <!--  <div class="control-group">
                            <label class="control-label" for="inputPassword">密码：</label>
                            <div class="controls">
                                <input type="password" name="passwordHash" id="inputPassword" placeholder="Password" value="" disabled= "true">
                            </div>
                        </div>-->
                        <div class="control-group">
                            <label class="control-label" for="inputSchool" >学校：</label>
                            <div class="controls">
                                <input type="text" id="inputSchool" placeholder="School" value="" disabled= "true">
                            </div>
                            <input type="hidden" id="userId" name="id" value="${centerUser.id}">
                        </div>
                        <c:if test="${user.id==centerUser.id}">
                            <div>
                                <section> <a href="#" class="link-1"></a>
                                    <button type="button"  id="button_update_two" onclick="update_userdata()"
                                            class="btn btn-primary btn-lg">修改信息 </button>
                                    <button id="submit_btn2" style="position: relative;left:30px;" type="button"   onclick="update_password()"
                                            class="btn btn-primary btn-lg">修改密码 </button>
                                </section>
                            </div>
                        </c:if>

                    </form>



                    <form id="data_form2" action = "user/update">
                        <input type="hidden" id="userId2" name="id" value="${centerUser.id}">
                        <div class="control-group">
                            <label id="show-result"  class="t"></label>
                            <label class="control-label" id=for="user_name">原密码：</label>
                            <div class="controls">

                                <input type="password" name="prepassword" id="pre_password" placeholder="user_name" onblur="check()" onkeypress="passwords()"  onblur="passwords()"disabled="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label id="pass-result"  class="t"></label>
                            <label for="password" class="t">密　码：</label>
                            <input id="password" value=""  disabled="true" onkeypress="passwords()"  onblur="passwords()" name="passwordHash" type="password"
                                   class="password form-control x319 in"/>
                        </div>
                        <div class="form-group">
                            <label for="repassword" class="t">确认密码：</label>
                            <input id="repassword" value="" disabled="true" onkeypress="passwords()" onblur="passwords()" name="repassword" type="password"
                                   class="password form-control x319 in"/>
                        </div>
                    </form>






                    <c:if test="${user.id!=centerUser.id}">
                        <div id="friend_make">
                            <section>

                                <c:if test="${befriend==false}">
                                <form action="friend/add" method="post">
                                    <input type="hidden" name="targetId"  value="${centerUser.id}"/>
                                    <input type="hidden" name="sourceId" value="${user.id}">
                                    <button type="submit"  id="button_friend_request" onclick=""
                                            class="btn btn-primary btn-lg">好友申请</button>
                                    </c:if>
                                    <c:if test="${befriend==true}">
                                        <button type="button"  id="button_friend_dequest" onclick="del(${centerUser.id},${user.id})"
                                                class="btn btn-primary btn-lg">删除好友</button>
                                    </c:if>
                                </form>
                            </section>
                        </div>
                    </c:if>
                    <c:if test="${user.authority==666}">
                        <section> <a href="admin/index.php" class="link-1">



                            <button type="submit"  id="button_manage"
                                    class="btn btn-primary btn-lg">&nbsp;管&nbsp;理&nbsp; </button></a>

                        </section>
                    </c:if>

                </article>

                <article class="span4">
                    <h3 class="extra">寻找易友</h3>
                    <form id="search" action="" method="GET" accept-charset="utf-8" >
                        <div class="clearfix">
                            <input type="text" name="s" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" >
                            <a href="#" onClick="document.getElementById('search').submit()" class="btn btn-1">GO!</a> </div>
                    </form>
                    <h3>最近联系</h3>
                    <ul class="list extra extra1">
                    </ul>
                    <h3>易友</h3>
                    <div id="friend-list" class="wrapper">
                        <ul class="list extra2 list-pad ">
                            <c:forEach items="${friends}" varStatus="i" var="item" >
                                <li><a href="self_center_p/${item.id}"> ${item.nuserName} </a></li>
                            </c:forEach>
                        </ul>
                    </div>
                    <h3>消息</h3>
                    <div id="message-box" class="wrapper">
                        <ul class="list extra2 list-pad ">
                            <c:forEach items="${messages}" varStatus="i" var="item" >
                                <c:if test="${item.type=='friend_making'}">
                                    <li>
                                            ${item.content}
                                    </li>
                                    <li>
                                        <section>
                                            <button type="button"  id="agr${item.id}"
                                                    class="btn btn-primary btn-small" onclick="agre(${item.targetId},${item.sourceId},${item.id} )">&nbsp;同&nbsp;意&nbsp; </button>
                                            <button type="button"  id="ref${item.id}"
                                                    class="btn btn-primary btn-small" onclick="disag(${item.id})">&nbsp;拒&nbsp;绝&nbsp; </button>
                                        </section>
                                    </li>
                                </c:if>

                            </c:forEach>
                        </ul>
                    </div>
                    <c:if test="${centerUser.id==user.id}">
                        <button type="button"   class="btn btn-primary btn-small" id="${user.id}" onclick="show()"> Ease Talk</button>
                    </c:if>
                </article>

            </div>


        </div>

    </div>


</div>


<!--============================== footer =================================-->
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
