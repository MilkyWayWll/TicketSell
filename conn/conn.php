<?php
$conn=mysql_connect("localhost","root","123456") or die("数据库服务器连接错误".mysql_error());
mysql_select_db("db_ticket",$conn) or die("数据库访问错误".mysql_error());
mysql_query("set character set utf-8");
mysql_query("set names utf-8");
?>