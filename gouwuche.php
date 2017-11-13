<?php
 session_start();
 if($_SESSION[username]!=$_POST[username]){
    echo "<script>alert('请先登录，后购票!');history.back();</script>";
	exit;
  }
?>
<?php
 include("top.php");
?>
<tr align= "left" valign="top" bgcolor="#F0F0F0"><?php include("left.php")?></tr>
<div class="m_right" style=" width: 600px; height:380px; margin-left: 450px;margin-top: -350px;">
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="561" align="center" valign="top" bgcolor="#FFFFFF"><table width="550" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
    </table>
      <table width="557" border="0" align="center" cellpadding="0" cellspacing="0">
        <form name="form1" method="POST" action="yibaopay/index.php">
          <tr>
            <td height="46" background="images/cart.gif"></td>
          </tr>
          <tr>
            <td  bgcolor="#FFFFFF"><table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
                <?php
			  //session_register("total");
			  if($_GET[qk]=="yes"){
			     $_SESSION[producelist]="";
				 $_SESSION[quatity]=""; 
			  }
			   $arraygwc=explode("@",$_SESSION[producelist]);
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
				   echo "<tr>";
                   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>您的订单列表为空!</td>";
                   echo"</tr>";
				}
			  else{ 
			?>
                <tr>
                  <td width="125" height="25" bgcolor="#FFFFFF"><div align="center">名称</div></td>
                  <td width="52" bgcolor="#FFFFFF"><div align="center">数量</div></td>
                  <td width="64" bgcolor="#FFFFFF"><div align="center">成人价</div></td>
                  <td width="64" bgcolor="#FFFFFF"><div align="center">学生价</div></td>
                  <td width="51" bgcolor="#FFFFFF"><div align="center">折扣</div></td>
                  <td width="66" bgcolor="#FFFFFF"><div align="center">小计</div></td>
                  <td width="71" bgcolor="#FFFFFF"><div align="center">操作</div></td>
                </tr>
                <?php
			    $total=0;
			    $array=explode("@",$_SESSION[producelist]);
				$arrayquatity=explode("@",$_SESSION[quatity]);
				 while(list($name,$value)=each($_POST)){
					  for($i=0;$i<count($array)-1;$i++){
					    if(($array[$i])==$name){
						  $arrayquatity[$i]=$value;  
						}
					}
				}
			    $_SESSION[quatity]=implode("@",$arrayquatity);
				
				for($i=0;$i<count($array)-1;$i++){ 
				   $id=$array[$i];
				   $num=$arrayquatity[$i];
				  
				  if($id!=""){
				   $sql=mysql_query("select * from tb_piaoyuan where id='".$id."'",$conn);
				   $info=mysql_fetch_array($sql);
				   $total1=$num*$info[studentprice];
				   $total+=$total1;
				   $_SESSION["total"]=$total;
			?>
                <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[mingcheng];?></div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">
                  <input type="text" name="<?php echo $info[id];?>" size="2" class="inputcss" value=<?php echo $num;?>>
                  </div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[price];?>元</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[studentprice];?>元</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">
                  <?php echo @(ceil(($info[studentprice]/$info[price])*100))."%";?>
                  </div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[studentprice]*$num."元";?></div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><a href="removegwc.php?id=<?php echo $info[id]?>">删除</a></div></td>
                </tr>
                <?php
			      }
				 }
			 ?>
                <tr>
                  <td height="25" colspan="8" bgcolor="#FFFFFF"><div align="right">
                      <table width="500" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="125"><div align="center">请核对信息</div></td>
                          <td width="125"><div align="center"><input type="submit" value="立即付款" /></div></td>
                          <td width="125"><div align="center"><a href="gouwuche.php?qk=yes">清空列表</a></div></td>
                          <td width="125"><div align="left">总计：<input type="text" name="con_price" value="<?php echo $total;?>"/></div></td>
                        </tr>
                      </table>
                  </div></td>
                </tr>
                <?php
			 }
			?>
            </table></td>
          </tr>
        </form>
    </table></td>
  </tr>
</table>
</div>
<?php
 include("bottom.php");
?>