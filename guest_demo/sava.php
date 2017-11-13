<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
		include '../conn/conn.php';
		include 'newClass.php';
		
		$mag=new newClass();
		
		$id=$_GET['id'];
		//echo $id;  测试id是否拿到了
		$title=$mag->magic($_POST["title"]);
		$content=$mag->magic($_POST["content"]);
		$username=$mag->magic($_POST["username"]);
		$recontent=$mag->magic($_POST["recontent"]);
		
		//echo $title.$content.$username.$recontent; 测试拿到的数据是否能输出
		
		$result=mysql_query("update guestlist set title='$title',username='$username',content='$content',recontent='$recontent',username='$username',replay='1' where id='$id'");
		
		
		if($result==1)
		{
			echo "<script>alert('回复成功');location.href='index.php';</script>";
		}
		else
		{
			echo "<script>alert('回复失败');location.href='index.php';</script>";
		}
?>
</body>
</html>