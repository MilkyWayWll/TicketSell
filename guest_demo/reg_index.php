<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
			include "newClass.php";
			$mag = new newClass();
			include('../conn/conn.php');
			error_reporting(E_ALL^E_NOTICE^E_WARNING);
			
		//获取用户输入的内容
		$title=$mag->magic($_POST['title']);
		$username=$mag->magic($_POST['username']);
		$content=$mag->magic($_POST['content']);
		
		echo $title.$username.$content;
		
		//转译用户恶意输入的php代码
		function magic($str)
		{
		  	$str=trim($str);
			if(!get_magic_quotes_gpc())
			{
				$str=addslashes($str);
			}
			return htmlspecialchars($str);
		}
		
		
		//连接数据库
		
		
		
		$isok = mysql_query("insert into guestlist(title,content,username) values('$title','$content','$username')");
		if($isok)
		{
			echo 'success';
			echo "<script>alert('执行成功');location.href='index.php'</script>";
		}
		else
		{
			echo 'bad';
			echo "<script>alert('执行失败');location.href='index.php'</script>";
		}


?>
</body>
</html>