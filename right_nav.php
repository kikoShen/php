<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<article class="span4">
    <h3 class="extra">Search</h3>
          <form id="search" action="search.php" method="GET" accept-charset="utf-8" >
            <div class="clearfix">
              <input type="text" name="s" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" >
              <a href="#" onClick="document.getElementById('search').submit()" class="btn btn-1">Search</a> </div>
          </form>
                    <h3>分类</h3>
                    <ul class="list extra extra1">
                        <li><a href="#">诸位up主的声音</a></li>
                        <li><a href="#">原创视频</a></li>
                        <li><a href="#">摄影</a></li>
                        <li><a href="#">平面设计</a></li>
                        <li><a href="#">coder开源项目</a></li>
                    </ul>
                    <h3>时间轴</h3>
                    <div class="wrapper">
                        <ul class="list extra2 list-pad ">
                            <li><a href="#">May 2012</a></li>
                            <li><a href="#">April 2012</a></li>
                            <li><a href="#">March 2012</a></li>
                            <li><a href="#">February 2012</a></li>
                            <li><a href="#">January 2012</a></li>
                            <li><a href="#">December 2011</a></li>
                        </ul>
                        <ul class="list extra2">
                            <li><a href="#">November 2012</a></li>
                            <li><a href="#">October 2012</a></li>
                            <li><a href="#">September 2012</a></li>
                            <li><a href="#">August 2012</a></li>
                            <li><a href="#">July 2012</a></li>
                            <li><a href="#">June 2012</a></li>
                        </ul>

                    </div>
                </article>
</body>
</html>