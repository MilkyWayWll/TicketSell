<meta charset="utf-8">
<?php
session_start();
include("conn/conn.php");
if($_SESSION["username"]!=$_POST[username]){
  echo "<script>alert('请先登录后购票!');history.back();</script>"; 
  exit;
 }
$id=strval($_GET[id]);
$sql=mysql_query("select * from tb_piaoyuan where id='".$id."'",$conn); 
$info=mysql_fetch_array($sql);
if($info[shuliang]<=0){
   echo "<script>alert('该票源已经售完!');history.back();</script>";
   exit;
 }
  $array=explode("@",$_SESSION[producelist]);
  for($i=0;$i<count($array)-1;$i++){
	 if($array[$i]==$id){
	     echo "<script>alert('该票已经在您的订单中!');history.back();</script>";
		 exit;
	  }
	}
  $_SESSION[producelist]=$_SESSION[producelist].$id."@";
  $_SESSION[quatity]=$_SESSION[quatity]."1@";
  header("location:gouwuche.php");
?> 