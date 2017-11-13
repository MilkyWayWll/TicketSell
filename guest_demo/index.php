<?php
		error_reporting(0);
		include "../conn/conn.php";
		include "newClass.php";
		
		$id=$_GET['id'];
		
		session_start();
		if($_session!="ok")
		{
				
		}
		else
		{
				exit;
		}
		
		
		
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
				
				#main_guest{ margin:50px 30px 0px 0px;; }
				
				
				#main_guest .main_guest_text1{width:120px; height:20px; margin-left:60px; color:red; font-size:18px;}
				#main_guest .main_guest_text2 td tr{ width:70px; height:5px;float:left; margin:0px 0px 30px 0px;}
				
				#main_content{margin-top:50px;}
				#main_content .main_content_text1{ width:1024px; height:50px;  margin-left:10px; font-size:18px; color:red;}
				#main_content .main_content_text1 .main_content_text2 i{ width:1024px; height:10px;margin:0px auto; line-height:10px; text-align:center}
				
				#main_guest .main_guest_text3{ width:1024px; height:80px;  margin:5px 0px 5px 5px;}
				
				#button .b_text{ width:auto; height:30px; margin:60px; auto; line-height:30px;}
			body {
	background-image: url(../images/1.jpg);
	background-size:cover;
}
            </style>
	</head>
	<body>
    	<div id="main">
		<div class="top">
				<div class="t_logo" bgcolor="#000"><a href="../main/index.php">恋途支付留言系统</a>
				  <hr></div>
                <div class="t_text"></div>
                
                <div class="t_text_main">
                <?php
                
					if($_SESSION["isok"])
					{
							echo "登入成功,欢迎您回来！";
					}
					else
					{
						
				?>
                </div>	
                
                <div class="t_left">
				
                <div class="t_left_text">
                        <form name="form_admin" method="POST" action="login.php" onSubmit="return check2();"/>
                        	用户名：<input name="user" type="text" id="user" />
                            密 码 ：<input name="pwd" type="password" id="pwd"/>
                            <input type="submit" id="submit" name="submit" value="确定"/>
                        
                        </form>
                       	</div>
                </div>
			<?php 
			
					}
			
			?>
				
				
		</div>
		
		<div id="main_guest">
				<div class="main_guest_text1">留言列表</div>
                <div class="main_guest_text2">
                	<td>
                   		<tr>&nbsp;<?php echo $infoCount;?>条留言</tr> 
                    	
                    </td>          
                </div>
                <?php
                		$re=mysql_query("select * from guestlist limit ".($currpage-1)*$pagesize.",".$pagesize);
						while($row=mysql_fetch_array($re))
						{
							
				
                
					echo '	
							<div class="main_guest_text3">
							 <td>
								<p><tr></tr> 
								<tr>用户名:'.$row["username"].'&nbsp;</tr>
								<tr>&nbsp;&nbsp;时间:'.$row["adddate"].'</tr>
								</p>
								<p><tr>标题:'.$row["title"].'</tr></p>
								<p><tr>留言：'.$row["content"].'</tr></p> ';
								
							if($row['replay']==1){	
								echo '
								 
								<p style=" font-size:16px; line-height:20px;  margin-left:30px;color:red;"><tr>管理员回复：'.$row['recontent'].'</tr></p>
								
							</td>
						</div>
						';
						}
						
						//echo $row['replay']; 测试管理员是否回复
						
						
						if($_SESSION['isok']=="ok")
							{
								echo "<a href='del.php?id=".$row['id']."'>删除</a> &nbsp;";
								echo "<a href='edit.php?id=".$row['id']."'>回复</a><br><br>";
							}
						
               			}
						
				echo "页码"; 	
				 for($i=1;$i<=$pagecount;$i++)
                {
                	echo "<a href='?page=$i'>$i</a>&nbsp;";
                }
				
				?> 
                
               
                  
		</div>
		
		<div id="main_content">
                <div class="main_content_text1">发表留言<hr>
                	
                
                </div>
               <div class="main_content_text2">
                        <form name="form1" method="post" action="reg_index.php" onSubmit="return check();"> 
                            <table border="1">
                                <p>留言标题<input name="title" type="text" id="title" value=""/></p>
                                <p>用户网名<input name="username" type="text" id="username" value=""/></p>														                             <p>留言内容<textarea name="content" rows="10" cols="80" id="content"></textarea></p>
                                <br>
                              	<input type="submit" name="submit" id="submit" value="确认留言"/>
                            </table>
                            
                        </form>
                	</div>
		</div>
		
		<div id="button">
		</div>
		
		
		</div>
	</body>
</html>