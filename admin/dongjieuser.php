<?php
include("conn/conn.php");
$id=$_GET[id];
$sql=mysql_query("select * from tb_user where id=".$id."",$conn);
$info=mysql_fetch_array($sql);
if($info[dongjie]==0)
   {
     mysql_query("update tb_user set dongjie=1 where id='".$id."'",$conn);
   }
 else
  {
     mysql_query("update tb_user set dongjie=0 where id='".$id."'",$conn); 
  }
 header("location:lookuserinfo.php?id=".$id."");   
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">