<html>	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
	}
body {
	
	background-image:url(../images/1.jpg);
	background-size:cover;
	background-repeat:no-repeat;

	
}
h1{
	margin-top:38px;
	
	}
.top{
	margin-top: 80px;
}
.main{
	margin-top: 30px;
}
.main-botton{
	margin:100px auto auto 680px;

}
</style>
</head>
<body>

<div class="top" align="center">
<h1>恋途买票支付界面</h1><hr /><br />
		 <?
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
	
		 			$date=date("Ymdhms");
		 			//echo $date;
		 			srand((double)microtime()*10); 
					//随机产生0-99之间的整数 
					$randval=rand(0,9); 
					//echo $randval;
					$sum=$date.$randval;
					
					$price=$_POST['con_price'];
					echo "订单价格.$price";
					
					
		 	
		 ?>
		 <div class="main">
		<form name="pay_index" method="post" action="reg_index.php"> 
			<table>
				<tr>
					<p>
					订单号：<input name="p2_Order" type="text" value="<?echo $sum;?>" />
					发起金额：<input name="p3_Amt" type="text" /><br />
					便捷支付 : <input name=" p5_Pid"  type="radio" value="交付党费"/>支付党费
					</p>
				</tr>
				<br />
				<br />
				<tr align="center"><h3>请选择支付银行：</h3>
		
				<td>
					<input type="radio" name="pd_FrpId" value="CCB-NET" />建设银行
					<div class="img"><img src="../images/logo/CCB.jpg"></div>
					
				</td>
				<td>
					<input type="radio" name="pd_FrpId" value="ICBC-NET" />工商银行
					<div class="img"><img src="../images/logo/ICBC.jpg"></div>
					
				</td>
				<td>
					<input type="radio" name="pd_FrpId" value="CMBCHINA-NET" />招商银行
					<div class="img"><img src="../images/logo/cmbchain.jpg"></div>
					
				</td>
				<td>
					<input type="radio" name="pd_FrpId" value="CEB-NET" />光大银行
					<div class="img"><img src="../images/logo/CEB.jpg"></div>
				</td>
				<br />
				</tr>
			</table>
            <table >
           		 <tr align="center">
           		 	<td>
           		 		<input type="hidden" name="p_df" value="<? echo $p_df;?>" />
           		 	</td>
            		<td>
					<input type="radio" name="pd_FrpId" value="ABC-NET" />农业银行
					<div class="img"><img src="../images/logo/ABC.jpg"></div>
                    </td>
                    <td>
					<input type="radio" name="pd_FrpId" value="CIB-NET" />兴业银行
					<div class="img"><img src="../images/logo/CIB.jpg"></div>
                    </td>
                    <td>
					<input type="radio" name="pd_FrpId" value="POST-NET" />中国邮政
					<div class="img"><img src="../images/logo/POST.jpg"></div>
                    </td>
                    <td>
					<input type="radio" name="pd_FrpId" value="BOCO-NET" />交通银行
					<div class="img"><img src="../images/logo/BOCO.jpg"></div>
                    </td>
                 </tr>
            </table>
            <br />
			<input name="but_ok" type="submit" value="确定提交" />	
		</form>	
	</div>
	</div>
	<div class="main-botton">
			<form action="" method="post">
				<span>订单查询</span>
				<input type="submit" value="确定"/>
			</form>
			
			
				<?
				$conn=mysql_connect("localhost","root","123456");
				mysql_query("set names 'utf-8'");
				mysql_select_db("db_ticket",$conn);
				$result=mysql_query("select * from date_monry",$conn);
				print_r($result);
?>

<table border="1" width="30%">
	<tr	bgcolor="#00FF66">
					<td>id</td>
    				<td>用户名</td>
					<td>订单号</td>
					<td>金额</td>
					<td>类型</td>
					<td>支付状态</td>
   </tr>
<? 
    while($row=mysql_fetch_assoc($result)){
    	?>
    <tr>
    				<td><?=$row['id']?></td>
				    <td><?=$row['username']?></td>
				    <td><?=$row['p2_Order']?></td>
					<td><?=$row['p3_Amt']?></td>
					<td><?=$row['p5_Pid']?></td>
					<td><?=$row['now']?></td>
    </tr>
	<?
	}
	?>	
	</div>
    </table>
</body>

</html>
