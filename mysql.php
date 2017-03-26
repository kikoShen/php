<?php
  define(HOSTNAME,'localhost:3306');
  define(DBUSERID,'root');
  define(PASSWORD,'gzh1105');
  define(DBNAME,'ej');

  $link=new mysqli(HOSTNAME,DBUSERID,PASSWORD,DBNAME);
  if($link->connect_error){
  	print 'connection failed'.$link->connect_error;
    exit();
  }else
    print "connection success <br/>";

$link ->query("set names GB2312");




?>