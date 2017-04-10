<?php
include("../mysql.php");

$checkbox=false;
	$str="";
	$array=$_GET['dell'];
	for($i=0;$i<$array.length;$i++){
		if($array[$i].checked==true){
          $str+=$array[$i].val()+",";
		}
	}
     alert($str.substring(0,$str.length-1));
	if($str!=""){
		$checkbox=true;

	}
	
	 $select=$str.split[","];

	if ($checkbox){
        $t=confirm("您确认要删除选中的内容吗？");
        if ($t==false) 
        {
        	return false;
        	location.reload();
        }
        else{           
             $sql="delete from user where id='";
             foreach ($str as $value) {
             	$value=$value+"','";
                 $sql+=$value;
             }
             $sql+="'";
            
            $link->query($sql);  
           location.load();

        }


    }
	else{
		alert("请选择您要删除的内容!");
		return false;
	}




















$sql="delete from user where id='".$_GET['id']."'";

   $link->query($sql);
 
  header("location:edit_user.php");


?>