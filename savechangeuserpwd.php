<?php
session_start();
$p1=md5(trim($_POST[p1]));
$p2=trim($_POST[p2]);

$name=$_SESSION[username];
class chkchange
   {
	   var $username;
	   var $p1;
	   var $p2;
	   function chkchange($x,$y,$z)
	    {
		  $this->username=$x;
		  $this->p1=$y;
		  $this->p2=$z;
		
		}
	   function changepwd()
	   {include("conn/conn.php");
	    $sql=mysql_query("select * from tb_user where username='".$this->username."'",$conn);
	    $info=mysql_fetch_array($sql);
		if($info[userpwd]!=$this->p1)
		 {
		   echo "<script>alert('原密码输入错误!');history.back();</script>";
		   exit;
		 }
		 else
		 {
		   mysql_query("update tb_user set userpwd='".md5($this->p2)."' ,pwd1='$this->p2' where username='$this->name'",$conn);
		   echo "<script>alert('密码修改成功!');history.back();</script>";
		   exit;
		 }
	   }
  }
 $obj=new chkchange($name,$p1,$p2); 
 $obj->changepwd() 
?>