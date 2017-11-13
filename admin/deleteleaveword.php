<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST))
{
   mysql_query("delete from tb_leaveword where id='".$value."'",$conn);

}
header("location:lookleaveword.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">