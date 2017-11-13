<!--
	作者：1366718626@qq.com
	时间：2017-04-03
	描述：支付成功页面
-->
<!dotype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
	<head>
		<!-- 声明当前页面的三要素-->
			
			<meta name="keywords" content="关键词，关键词" >
			<meta name="description" content="">
			<title>支付结果--卷恋支付平台</title>
			
			<!-- css/script-->
			<style type="text/css">
				*{
					margin: 0px;
					padding: 0xp;
				}
				body{
					background-image:url(../images/2.jpg);
					background-size: cover;
					
				}
				img{
					filter:alpha(opacity=70);  
					-moz-opacity:0.7;  -khtml-opacity: 0.7;  opacity: 0.7; 
				}
				body .b_zf{
					margin:140px auto;
				}
				
			</style>
	</head>
<body>
	
			<h1 class="b_zf" align="center">支付成功！对方已收到你的货款</h1>
			<div class="b_xx">
				<h2>订单号：<?php echo $r2_TrxId;?></h2>
				<h2>订单金额：<?php echo $r3_Amt;?></h2>
					
			</div>
			
	
		<?php
			
			
			$r1_Code=$_GET['r1_Code'];
			$r2_TrxId=$_GET['r2_TrxId'];
			$r3_Amt=$_GET['r3_Amt'];
			
			$conn = mysql_connect("localhost","root","123456");
			
			mysql_query("set name utf-8");
			
			mysql_select_db("tb_ticket",$conn);
			
//			if($conn!=null){
//				echo "success";
//			}
//			else{
//				echo "bad!";
//			}

			$sql = "insert into date_money(p2_Order,p3_Amt,p5_Pid,now) valuss('$r2_TrxId','$r3_Amt','p5_Pid','$r1_Code')";
			
			if(mysql_query($sql)){
				echo  "订单写入数据库成功！";
			}
			else{
				echo "订单未成功写入数据库1";
			}
			
			
			
			
			
			
?>
	</body>
</html>
