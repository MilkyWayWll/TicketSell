<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
		
	}
	body
	{
		background-image: url(../images/2.jpg);
		background-size: cover;
	}
	.top{
	margin:70px;

	}
	.m_date{
		margin-top: -30px;
	}
</style>
</head>
<?php 
						include_once 'test.php'; 
					//获取用户提交的订单信息
				$p0_Cmd="Buy";
				$p1_MerId="10001126856";
				$p2_Order=$_REQUEST['p2_Order'];
				$p3_Amt=$_REQUEST['p3_Amt'];
				$p4_Cur="CNY";
				$p5_Pid=$_REQUEST['p5_Pid'];
				$p6_Pcat="";
				$p7_Pdesc="";
				$p8_Url="http://loaclhost/yeebao/payResult.php";
				$p9_SAF="0";
				$pa_MP="";
				$pd_FrpId=$_REQUEST['pd_FrpId'];
				$pr_NeedResponse="1";

					//把请求参数一个个按顺序拼接
					$data="";
					$data=$data.$p0_Cmd;
					$data=$data.$p1_MerId;
					$data=$data.$p2_Order;
					$data=$data.$p3_Amt;
					$data=$data.$p4_Cur;
					$data=$data.$p5_Pid;
					$data=$data.$p6_Pcat;
					$data=$data.$p7_Pdesc;
					$data=$data.$p8_Url;
					$data=$data.$p9_SAF;
					$data=$data.$pa_MP;
					$data=$data.$pd_FrpId;
					$data=$data.$pr_NeedResponse;
					$merchantKey ="69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl";
					
					//hmac是签名串，是用于易宝和商家相互确认的关键字（MD5-hmac）
					$hmac=HmacMd5($data,$merchantKey);

					
					?> 
					<br />
					<div class="top">
					<h1 align="center">确认提交页面</h1><hr /><br /><br /><br />
					<div id="main"  align="center">
						您的订单号是：<?php echo $p2_Order."<br>"; ?><br /><br />
						支付的金额是：<?php echo $p3_Amt."<br>"; ?>
					</div>
					</div>
					<!--把要提交的数据用隐藏域表示-->
					<div  class="m_date" align="center">
							<form action="https://www.yeepay.com/app-merchant-proxy/node" method="post">
									<input type="hidden" name="p0_Cmd" value="<?php echo $p0_Cmd; ?>"/>
									<input type="hidden" name="p1_MerId" value="<?php echo $p1_MerId; ?>"/>
									<input type="hidden" name="p2_Order" value="<?php echo $p2_Order; ?>"/>
									<input type="hidden" name="p3_Amt" value="<?php echo $p3_Amt; ?>"/>
									<input type="hidden" name="p4_Cur" value="<?php echo $p4_Cur; ?>"/>
									<input type="hidden" name="p5_Pid" value="<?php echo $p5_Pid; ?>"/>
									<input type="hidden" name="p6_Pcat" value="<?php echo $p6_Pcat; ?>"/>
									<input type="hidden" name="p7_Pdesc" value="<?php echo $p7_Pdesc; ?>"/>
									<input type="hidden" name="p8_Url" value="<?php echo $p8_Url; ?>"/>
									<input type="hidden" name="p9_SAF" value="<?php echo $p9_SAF; ?>"/>
									<input type="hidden" name="pa_MP" value="<?php echo $pa_MP; ?>"/>
									<input type="hidden" name="pd_FrpId" value="<?php echo $pd_FrpId; ?>"/>
									<input type="hidden" name="pr_NeedResponse" value="<?php echo $pr_NeedResponse; ?>"/>
									<input type="hidden" name="hmac" value="<?php echo $hmac; ?>"/>
									<input type="submit" value="确认支付"/>
						</form>
				</div>
</html>