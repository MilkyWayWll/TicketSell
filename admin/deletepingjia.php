<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST))
 {
     $id=$value;
     mysql_query("delete from tb_pingjia where id=".$id."",$conn);
 
 }
header("location:editpinglun.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">