<?php
		error_reporting(0);
		include "../conn/conn.php";
		include "newClass.php";
		
		$id=$_GET['id'];
		//echo $id;  测试拿到的ID是否显示
		
		//通过ID拿到具体信息
		$result=mysql_query("select * from guestlist where id=$id");
		while($row=mysql_fetch_assoc($result))
		{
				$title=$row['title'];
				$content=$row['content'];
				$username=$row['username'];
				$recontent=$row['recontent'];
		}
		
		//echo $title.$content.$uername; 测试是否查询到相应数据
		
		
		$mag=new  newClass();
		
		//每页显示条数
		$pagesize = 3;
		//总条数 
		$result=mysql_query("select count(*) from guestlist ");
		$row=mysql_fetch_row($result);
		$infoCount = $row[0];
		//一共多少页
		$pagecount=ceil($infoCount/$pagesize);
		//当前是那一页
		$currpage = empty($_GET['page'])?1:$_GET['page'];
		
		if($currpage>$pagecount)
		{
			$currpage=1;
		}
		
		session_start();
		//echo $_SESSION["isok"];//查看登入值是否在
		
		
		
		

?>
<!DOCTYPE HTML>
<html>
	<head>
			<title>用户留言</title>
			<meta accesskey="" charset="utf-8"  />
            <script type="text/javascript" >
            	function check()
				{
						if(document.form1.title.value==""||document.form1.title.value.size<=3)
						{
							alert('请输入长度不小于5的标题');
							return false;
							
						}
						
						if(document.form1.username.value==""||document.form1.username.value.size<=3)
						{
							alert('请输入长度不小于3的用户名');
							return false;
						}
						
						if(document.form1.content.value==""||document.form1.content.value.size<=10)
						{
							alert('请提交长度不小于10的内容');
							return false;
						}
						if(document.form1.recontent.value==""||document.form1.recontent.value.size<=8)
						{
							alert('请提交长度不小于8的内容');
							return false;
						}
						
						
						return true;
							
				}
				function check2()
				{
					if(document.form_admin.user.value==""||document.form_admin.pwd.value=="")
						{
							alert('请输入账号和密码');
							return false;
						}	
				}
				
            
            </script>
			<style type="text/css">
				*{
					margin:0px;
					padding:0px;
				}
				#main{
					margin-left:250px;
					font-family:"微软雅黑";
					
					}
			
				
				.top .t_logo{width: 240px;height: 50px;}
				.top .t_logo{text-align:center; line-height:50px; font-size:28px; font-family:"微软雅黑"; color:red;}
				#main .top .t_text_main{ margin-left:500px; margin-bottom:-30px; margin-top:-30px;}
				.top .t_text{width:120px;height:20px;margin:5px 0px 5px 40px;text-align:center; line-height:20px;}
				.top .t_left{width:200px; height:30px; float:right; margin-top:-60px;}
				.top .t_left .t_left_text{ margin-left:-640px; line-height:30px; margin-top:20px;}
				
				#main_guest{ margin:50px 0px 0px 0px;; }
				
				
				#main_guest .main_guest_text1{width:120px; height:20px; margin-left:60px; color:red; font-size:18px;}
				#main_guest .main_guest_text2 td tr{ width:70px; height:5px;float:left; margin:0xp auto;}
				
				#main_content{margin-top:70px;}
				#main_content .main_content_text1{ width:1024px; height:50px;  margin-left:10px; font-size:18px; color:red;}
				#main_content .main_content_text1 .main_content_text2 i{ width:1024px; height:10px;margin:0px auto; line-height:10px; text-align:center}
				
				#main_guest .main_guest_text3{ width:1024px; height:80px;  margin:5px 0px 5px 5px;}
				
				.button .b_text{ margin-top:260px;} 
			body {
	background-image: url(../images/bg.jpg);
}
            </style>
	</head>
	<body>
   	<div id="main">
		<div class="top">
		  <div class="t_logo">恋途支付留言系统
				  <hr></div>
                
                <div class="t_text_main">
               
                </div>	
                
                <div class="t_left">
				
                <div class="t_left_text">
                       
               	  </div>
                </div>
			
				
				
		</div>
		
		<div id="main_guest">
				<div class="main_guest_text1"></div>
		</div>
		<div id="main_content">
                <div class="main_content_text1">回复留言<hr>
                	
                
                </div>
               <div class="main_content_text2">
                        <form name="form1" method="post" action="sava.php?id=<?php echo $id; ?>" onSubmit="return check();"> 
                            <table border="1">
                                <p>留言标题<input name="title" type="text" id="title" value="<?php echo $title;?>"/></p>
                                <p>用户网名<input name="username" type="text" id="username" value="<?php echo $username; ?>"/></p>														                            
                                 <p>留言内容<textarea name="content" rows="10" cols="80" id="content"><?php echo $content;?></textarea></p>
                                 <p>回复内容<textarea name="recontent" rows="10" cols="80" id="recontent"><?php echo $recontent;?></textarea></p><br>
                              	<input type="submit" name="submit" id="submit" value="确认回复"/>
                            </table>
                            
                        </form>
       	  </div>
		</div>
		
		<div class="button">
		
		</div>
		
		
		</div>
	</body>
</html>