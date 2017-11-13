<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST))
  {
    mysql_query("delete from tb_user where id=".$value."",$conn); 
	mysql_query("delete from tb_pingjia where userid=".$value."");
	mysql_query("delete from tb_leaveword where userid=".$value."",$conn);
  }
header("location:edituser.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">