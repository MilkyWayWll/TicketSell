<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST)){
 mysql_query("delete from tb_type where id='".$value."'",$conn);
 mysql_query("delete from tb_shangpin where id='".$value."'",$conn);
 }
 header("location:showleibie.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">