<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
		//引入文件
		include "../conn/conn.php";
		include "newClass.php";	
		//new一个类的对象赋值给一个变量
		$mag = new newClass();
		
		//然后通过变量(这里是一个方法)->变量的形式调用
		
		$user=$mag->magic($_POST['user']);	
		$pwd=$mag->magic($_POST['pwd']);
		
		
		
		
		$re=mysql_query("select count(*) from tb_admin where name='$user' and pwd='$pwd'");
		$row=mysql_fetch_row($re);
		$isok = $row[0]; //输出返回值为0表示未找到，返回1为找到
		
		if($isok)
		{
			session_start();
			$_SESSION["isok"]="ok";
			echo "<script> alert('登入成功！');location.href='index.php';</script>";
		}
		else
		{
			echo "登入失败";
		}
		
		
?>
</body>
</html>