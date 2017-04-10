<?php
require_once("conn.php");

class DB{
    private $db;
    private $result;
    private $array;
    private $signal;

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
      $value="('".$user."','".$passwd."','".$email."')";
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
       		$condition="where board = 0 ORDER BY id DESC";
       		break;
       	case '1':
       		$condition="where board = 1 ORDER BY id DESC";
       		break;
       	case '2':
       		$condition="where board = 2 ORDER BY id DESC";
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

    function getSelfPost($author){
       $tableName="post";
       $condition="where author='".$author."' and own = 0 ORDER BY id DESC";      
      //结果集
       $this->result=$this->db->select($tableName,$condition);
       // $row=$this->db->rows($this->result); 
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
    $_SESSION['condition']=$condition;
    $this->result=$this->db->select($tableName,$condition);
    return $this->result;
    }

    function getOtherPost($user){
    	$tableName="post";
       $condition="where author='".$user."' and own = 0 ORDER BY id DESC";      
      //结果集
       $this->result=$this->db->select($tableName,$condition);
       // $row=$this->db->rows($this->result); 
       return $this->result;
    }

}



?>