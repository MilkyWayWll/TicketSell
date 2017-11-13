<?php
 include("top.php");
 include("conn/conn.php");
 header("ContentType=text/html;charset=utf-8");
?>
<tr align= "left" valign="top" bgcolor="#F0F0F0"><?php include("left.php")?>
</tr>
<div class="m_right" style=" width: 600px; height:380px; margin-left: 360px;margin-top: -360px;">
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>    
    <td width="561" align="center" valign="top" bgcolor="#FFFFFF">
     <table width="550" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
      <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="25" bgcolor="#EEEEEE"><div align="center" style="color: #000">余票查询</div></td>
        </tr>
        <tr>
          <td height="50" ><table width="550" height="50" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr>
                <td bgcolor="#FFFFFF">
                  <table width="550" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                    <script language="javascript">
			     function chkinput3(form)
				 {
				   if((form.qidian.value=="")&&(form.end.value==""))
				    {
				      alert("请输入出发地或目的地");
					  form.start.select();
					  return(false);
				    }
				   return(true);
				    
				 }
			   </script>
                    <form name="form3" method="post" action="ticketselect.php" onSubmit="return chkinput3(this)">
                      <tr>
                        <td height="25"><div align="center">出发地:
                                <input name="qidian" type="text" class="inputcss" id="qidian" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'"
                                onMouseOut="this.style.backgroundColor='#e8f4ff'" size="25">
                                目的地: 
                      <input type="text" name="end" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                        </div></td>
                      </tr>
                                            <tr>
                        <td height="25"><div align="center">发车时间:
                                <input name="starttime" type="text" class="inputcss" id="startdate" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'"
                                onMouseOut="this.style.backgroundColor='#e8f4ff'" size="25">
                                历时: 
                                <input type="text" name="haoshi" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                        </div></td>
                      </tr>
                      <tr>
                        <td height="25">
                          <div align="center">
                            <input type="hidden" value="show_find" name="show_find">
                            <input name="submit2" type="submit" class="buttoncss" value="查 询">
                        </div></td>
                      </tr>
                    </form>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="550" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <?php
	    if($_POST[show_find]!="")
		 {
	      $qidian=trim($_POST[qidian]);
		  $end=trim($_POST[end]);
		  $starttime=trim($_POST[starttime]);
		  $haoshi=trim($_POST[haoshi]);
		  if($start=="")
		   {
		       $sql=mysql_query("select * from tb_piaoyuan where end='".$end."'",$conn);
		   }
		  elseif($end=="")
		  {
		      $sql=mysql_query("select * from tb_piaoyuan where qidian='".$qidian."'",$conn);
		   }
			 elseif($starttime==""){
				 $sql=mysql_query("select * from tb_piaoyuan where haoshi='".$haoshi."'",$conn);
			 }
			 elseif($backtime==""){
				 $sql=mysql_query("select * from tb_piaoyuan where starttime='".$starttime."'",$conn);
			 }
		  else
		  {
		      $sql=mysql_query("select * from tb_piaoyuan where qidian='".$qidian."'and end ='".$end."'",$conn);
			  $sql=mysql_query("select * from tb_piaoyuan where starttime='".$startdate."'and backtime ='".$end."'",$conn);
		  }
		  $info=mysql_fetch_array($sql);
		  if($info==false)
		   {
		      echo "<div algin='center'>对不起,没有符合条件的车票!</div>";    
		   }
		   else
		   {
	  ?>
      <table width="525" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="25" bgcolor="#F0F0F0"><div align="center" style="color: #6E0202">查询结果</div></td>
          <td height="25" bgcolor="#F0F0F0"><div align="center" style="color: #6E0202"></div></td>
        </tr>
        <tr>
          <td height="50" bgcolor="#555555"><table width="550" height="50" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr>
                <td width="77" height="25" bgcolor="#FFFFFF"><div align="center">出发地</div></td>
                <td width="77" bgcolor="#FFFFFF"><div align="center">目的地</div></td>
                <td width="77" bgcolor="#FFFFFF"><div align="center">发车时间</div></td>
                <td width="77" bgcolor="#FFFFFF"><div align="center">返程时间</div></td>
                <td width="77" bgcolor="#FFFFFF"><div align="center">座位类型</div></td>
                <td width="77" bgcolor="#FFFFFF"><div align="center">安全提示</div></td>
                <td width="77" bgcolor="#FFFFFF"><div align="center">金额</div></td>
              </tr>
              <?php
			
			  do
			  {
			
			?>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[qidian];?></div></td>
                <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[end];?></div></td>
                <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[starttime];?></div></td>
                <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[haoshi];?></div></td>
                <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[type];?></div></td>
                <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[tishi];?></div></td>
                <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info[price];?></div></td>
              </tr>
              <?php
			   }while($info=mysql_fetch_array($sql));
			?>
          </table></td>
        </tr>
      </table>
      <span style="color: #6E0202">
                  <input name="submit3" type="button" class="buttoncss" value="订单管理" onclick="javascript:window.location='admin/lookdd.php'">  
      </span>
       <span style="color: #6E0202">
                  <input name="submit4" type="button" class="buttoncss" value="订购" onclick="javascript:window.location='addgouwuche.php'">  
      </span>
    <?php
		   }
		  }
		?></td>
  </tr>
</table>
</div>
<?php
  include("bottom.php");
?>