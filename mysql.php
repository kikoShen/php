<?php
require_once("conn.php");

class DB{
    private $db;
    private $result; //mysqli_result
    private $array;  //mysqli_array
    private $signal; //bool

    function __construct(){
    	$this->db=new Conn('localhost:3306','root','gzh1105','ej');
        $this->db->connect();

    }

    function fetch($result){
        return $this->db->myArray($result);
    }

    function getRows($result){
    	return $this->db->rows($result);
    }

    //登录
 	function login($name,$pwd){
       $tableName="user";
       $condition="where user_name = '".$name."' and password = '".$pwd."'";
       $this->result=$this->db->select($tableName,$condition);
       if ($this->result) {
         $this->array=$this->db->myArray($this->result);  
         mysqli_free_result($this->result);
       }
       return $this->array;
 	}

 	function register($name,$pwd,$email){
 	    $tableName="user";
      $fields="(user_name,password,email)";
      $value="('".$name."','".$pwd."','".$email."')";
      $this->result=$this->db->insert($tableName,$fields,$value);
      return $this->result;
 	}

    //发帖
 	function post($own,$board,$title,$text,$author){
      $tableName="post";
      $fields="(own,board,title,text,author)";
      $value="(".$own.",".$board.",'".$title."','".$text."','".$author."')";
      $this->result=$this->db->insert($tableName,$fields,$value);
       //boolean 
       return $this->result;  

 	}

    //显示某类的所有帖子
    function getPost($type){
       $tableName="post";
       switch ($type) {
       	case '0':
       		$condition="where board = 0 ORDER BY id DESC";//emotion
       		break;
       	case '1':
       		$condition="where board = 1 ORDER BY id DESC";//trade
       		break;
       	case '2':
       		$condition="where board = 2 ORDER BY id DESC";//mix
       		break;
       	default:
       		$condition="ORDER BY id DESC";
       		break;
       }
      
      //结果集
       $this->result=$this->db->select($tableName,$condition);
       $row=$this->db->rows($this->result); 
       return $this->result;
    }

    //个人发帖
    function getSelfPost($author){
       $tableName="post";
       $condition="where author='".$author."' and own = 0 ORDER BY id DESC";      
      //结果集
       $this->result=$this->db->select($tableName,$condition);
       // $row=$this->db->rows($this->result); 
       return $this->result;
    }

    //单个帖子
    function getTie($id){
      $tableName="post";
       $condition="where id = ".$id;     
        // $_SESSION['condition']=$condition;
       $this->result=$this->db->select($tableName,$condition);
         // $_SESSION['result']=$this->result;
       $row=$this->db->myArray($this->result);
       return $row;
    }

    //获得个人信息(已知条件，已知信息）
    function getSelf($info,$content){
    	$tableName="user";
    	$condition="where ".$info." = '".$content."'";
    	$this->result=$this->db->select($tableName,$condition);
    	$oneRow=$this->db->myArray($this->result);
       return $oneRow;
    }

     //全体用户信息
    function getUsers(){
       $tableName="user";
       $condition="";
       $this->result=$this->db->select($tableName,$condition);
       return $this->result;
    }

    // 分页显示
    function fenye($result,$tableName,$page,$prefix){
    $rowOnePage=5;
    $totalRows=$this->db->rows($result);
    if($totalRows%$rowOnePage==0){
	   $maxPage=(int)($totalRows/$rowOnePage);
    }else{
	$maxPage=(int)($totalRows/$rowOnePage)+1;
    }  
    $start=$rowOnePage*($page-1);
    $_SESSION['maxPage']=$maxPage;
    $condition=$prefix."ORDER BY id DESC LIMIT $start,$rowOnePage";
    // $_SESSION['condition']=$condition;
    $this->result=$this->db->select($tableName,$condition);
    return $this->result;
    }

    //他人发帖
    function getOtherPost($user){
    	$tableName="post";
       $condition="where author='".$user."' and own = 0 ORDER BY id DESC";      
       $this->result=$this->db->select($tableName,$condition); 
       return $this->result;
    }

    function deleteSingleUser($info,$content){
    	$tableName="user";
    	$condition="where ".$info." = ".$content;
    	$_SESSION['condition']=$condition;
    	//true or false
    	$this->result=$this->db->delete($tableName,$condition);
    	return $this->result;
    }

     //id更新user信息
     function UpdateUser($id,$user_name,$passwd,$email,$rank){
     	$tableName="user";
     	$change="user_name='".$user_name."',password='".$passwd."',email='".$email."',rank=".$rank;
     	$condition="where id =".$id;
     	$this->signal=$this->db->update($tableName,$change,$condition);
     	return $this->signal;
     }

    function addUser($user_name,$passwd,$email,$rank){
         $tableName="user";
         $fields="(user_name,password,email,rank)";
         $value="('".$user_name."','".$passwd."','".$email."',".$rank.")";
         $this->signal=$this->db->insert($tableName,$fields,$value);
         return $this->signal;
    }


    //插入用户文件夹记录到user_files表
    function createDir($userid,$file_name,$path){
      $tableName="user_files";
      $fields="(user_id,file_name,type,path)";
      $value="(".$userid.",'".$file_name."', 0 ,'".$path."')";
      $this->result=$this->db->insert($tableName,$fields,$value);
      //boolean
      return $this->result;
    }
      // 插入上传文件记录到user_files表
      function uploadFile($userid,$file_name,$path,$size){
      $tableName="user_files";
      $fields="(user_id,file_name,type,path,file_size)";
      $value="(".$userid.",'".$file_name."', 1 ,'".$path."',".$size.")";
      $this->result=$this->db->insert($tableName,$fields,$value);
      //boolean
      return $this->result;
    }
//upload_file.php 暂未用到
//查找“xx” 文件是否存在，返回关联数组
      function fileExists($filename){
      $tableName="user_files";
       $condition="where filename = ".$filename;     
        // $_SESSION['condition']=$condition;
       $this->result=$this->db->select($tableName,$condition);
         // $_SESSION['result']=$this->result;
       $row=$this->db->myArray($this->result);
       return $row;
    }
    
    //获取当前用户文件夹下的所有的上传记录
    function getFiles($path){
      $tableName="user_files";
       $condition="where path = '".$path."'";
       $this->result=$this->db->select($tableName,$condition);
         // $_SESSION['result']=$this->result;
       return $this->result;
    }

    //获取某个文件在users_files里的信息
     function getFileInfo($id){
      $tableName="user_files";
       $condition="where id = ".$id;
       $this->result=$this->db->select($tableName,$condition);
          //$_SESSION['result']=$this->result;
       return $this->result;
    }


    function delDir($path){
      $tableName="user_files";
      $condition="where path  LIKE'".$path."%'";
      //true or false
      $this->result=$this->db->delete($tableName,$condition);
      return $this->result;
    }

    function delFile($path,$filename){
      $tableName="user_files";
      $condition="where path = '".$path."' and file_name ='".$filename."'";
      //true or false
      $this->result=$this->db->delete($tableName,$condition);
      return $this->result;
    }
  
  
    function share($id){
      $tableName="user_files";
      $change="pub = 1";
      $condition="where id = ".$id;
      $this->result=$this->db->update($tableName,$change,$condition);
      return $this->result;//影响行数
  }

  function cancelShare($id){
      $tableName="user_files";
      $change="pub = 0";
      $condition="where id = ".$id;
      $this->result=$this->db->update($tableName,$change,$condition);
      return $this->result;//影响行数
  }

 //查询此人是否有共享文件
function isPub($who){
       $tableName="user_files";
       $condition="where pub= 1 and path LIKE'cloud/".$who."/%'";      
      //结果集
       $this->result=$this->db->select($tableName,$condition);
       // $row=$this->db->rows($this->result); 
       return $this->result;
  }
}



?>