<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
<div class="spinner"></div> 
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="work.php">Work</a></li>
                <li class="sub-menu"><a href="board.php">Board</a>
                    <ul>
                      <li><a href="emotion.php">Emotion</a></li>
                      <li><a href="trade.php">Trade</a></li>
                      <li><a href="mix.php">Mix</a></li>
                    </ul>
                </li>
                <?php 
                  if(isset($_SESSION['username'])){
                    echo '<li class="sub-menu"><a href="self_center.php">'.$_SESSION['username'].'</a><ul>
                    <li><a href="logout.php">Logout</a></li>
                  </ul></li>';
                  }else{
                    echo '<li><a href="login.php">Login</a></li>';
                  }
                ?>
                
                <li><a href="contact.php">Contact</a></li>
              </ul>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </header> 
</body>
</html>