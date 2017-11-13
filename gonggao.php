<?php
 include("top.php");
 header("ContentType=text/html;charset=utf-8");
?>
<tr align= "left" valign="top" bgcolor="#F0F0F0"><?php include("left.php")?>
</tr>
<div class="m_right" style=" width: 600px; height:380px; margin-left: 450px;margin-top: -400px;">
	<table width="557" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="557" height="46" background="image/line3.gif"><div align="center" style="color: #FFFFFF"></div></td>
        </tr>
        <tr>
          <td height="150"><table width="530"  border="0" align="center" cellpadding="0" cellspacing="1">
              <?php
		     
		     $id=$_GET[id];
			 $sql=mysql_query("select * from tb_gonggao where id='".$id."'",$conn);
			 $info=mysql_fetch_array($sql);
		     include("function.php");
		   
		   ?>
              <tr>
                <td width="24" height="25" bgcolor="#FFFFFF"><div align="center"></div></td>
                <td width="315" bgcolor="#FFFFFF"><div align="center">公告主题：<?php echo unhtml($info[title]);?></div></td>
                <td width="66" bgcolor="#FFFFFF"><div align="center">发布时间：</div></td>
					<td width="120" bgcolor="#FFFFFF"><div align="left"><?php echo $info[time];?></div></td>
              </tr>
              <tr>
                <td height="125" bgcolor="#FFFFFF"><div align="center"></div></td>
                <td height="125" colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo unhtml($info[content]);?></div></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="530" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="right"><a href="gonggaolist.php">继续查看</a></div></td>
        </tr>
      </table>
</div>
<?php
 include("bottom.php");
?>