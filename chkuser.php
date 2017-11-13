<?php 

	session_start();
 if($_POST[username]!="" || $_POST[userpwd]!="")
  {
  	$servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "db_ticket";
    $conn = mysql_connect($servername,$username,$password)or die(mysql_error());
    mysql_select_db($dbname);
    mysql_query("set names utf-8");
	   
    $user_name=$_POST[username]; 
	  echo $user_name;
		  //接收表单提交的用户名
    $user_pwd=$_POST[userpwd];
    //$sql=$conn->query("call admin_regs('".$admin_user."','".$admin_pass."')");
	$sql = mysql_query("select * from tb_user where username = '".$user_name."' and userpwd='".$user_pwd."'",$conn);
	$info = mysql_fetch_array($sql);
    //$res=$sql->fetch_array(MYSQL_BOTH);
    if($info==false){
		echo "<script>alert('用户登录失败!');</script>";	
	}else{
	    
		
				$_SESSION["username"]=$info[name];
			   //session_register("producelist");
			   $producelist="";
			   //session_register("quatity");
			    $quatity="";
				//$user=$_SESSION["username"];
				//echo "$user";
		
               header("location:index.php");
               exit;
   
 }
}
?>