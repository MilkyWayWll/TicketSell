<?php
 include("top.php");
 include("conn/conn.php");
?>
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
<tr align= "left" valign="top" bgcolor="#F0F0F0"><?php include("left.php")?></tr>
<div class="m_right" style=" width: 600px; height:380px; margin-left: 360px;margin-top: -330px;">
<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="581" align="center" valign="top" bgcolor="#FFFFFF"><table width="557" height="6" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td></td>
      </tr>
    </table>      
      <table width="530" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="25" bgcolor="#EEEEEE">&nbsp;&nbsp;票源信息</td>
        </tr>
      </table>
        <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#666666">
              <table width="530" border="0" align="center" cellpadding="0" cellspacing="1">
                <?php
		     $sql=mysql_query("select * from tb_piaoyuan where id=".$_GET[id]."",$conn); 
			 $info=mysql_fetch_object($sql);
		   ?>
                <tr>
                  <td width="89" height="80" rowspan="4" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
                      <?php
			    if($info->tupian==""){
				  echo "暂无图片";
				}
				else
				{
			  ?>
                      <a href="<?php echo $info->tupian;?>" target="_blank"><img src="<?php echo $info->tupian;?>" alt="查看大图" width="80" height="80" border="0"></a>
                      <?php
			    }
			  ?>
                  </div></td>
                  <td width="92" height="20" align="left" bgcolor="#FFFFFF"><div align="center">名称：</div></td>
                  <td width="134" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->mingcheng;?></div></td>
                  <td width="100" bgcolor="#FFFFFF"><div align="center">发车时间：</div></td>
                  <td width="129" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->starttime;?></div></td>
                </tr>
                <tr>
                  <td height="20" align="left" bgcolor="#FFFFFF"><div align="center">学生价：</div></td>
                  <td width="134" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->studentprice;?></div></td>
                  <td width="100" bgcolor="#FFFFFF"><div align="center">成人价：</div></td>
                  <td width="129" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->price;?></div></td>
                </tr>
                <tr>
                  <td height="20" align="left" bgcolor="#FFFFFF"><div align="center">客运方式：</div></td>
                  <td width="134" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->dengji;?></div></td>
                  <td width="100" bgcolor="#FFFFFF"><div align="center">起点：</div></td>
                  <td width="129" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->qidian;?></div></td>
                </tr>
                <tr>
                  <td height="20" align="left" bgcolor="#FFFFFF"><div align="center">终点：</div></td>
                  <td width="134" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->end;?></div></td>
                  <td width="100" bgcolor="#FFFFFF"><div align="center">数量：</div></td>
                  <td width="129" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->shuliang;?></div></td>
                </tr>
                <tr>
                  <td width="89" height="69" bgcolor="#FFFFFF"><div align="center">安全提示：</div></td>
                  <td height="69" colspan="4" bgcolor="#FFFFFF" valign="top"><div align="left"><br>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $info->tishi;?></div></td>
                </tr>
            </table></td>
          </tr>
        </table>
        <table width="530" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="right"><a href="addgouwuche.php?id=<?php echo $info->id;?>">加入订单</a>&nbsp;&nbsp;</div></td>
          </tr>
        </table>
        <?php
	   if($_SESSION[username]!="")
	   {
	  
	  ?>
  <form name="form1" method="post" action="savepj.php?id=<?php echo $info->id;?>" onSubmit="return chkinput(this)">
  <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" bgcolor="#EEEEEE"><div align="center" style="color: #FFFFFF">
                  <div align="left">&nbsp;&nbsp;<span style="color: #000000">发表评论</span></div>
              </div></td>
            </tr>
            <tr>
              <td height="150" bgcolor="#999999"><table width="530" border="0" align="center" cellpadding="0" cellspacing="1">
                  <script language="javascript">
		    function chkinput(form)
			{
			   if(form.title.value=="")
			   {
			     alert("请输入评论主题!");
				 form.title.select();
				 return(false);
			   }
			   if(form.content.value=="")
			   {
			     alert("请输入评论内容!");
				 form.content.select();
				 return(false);
			   }
			   return(true);
			}
		  </script>
                  <tr>
                    <td width="80" height="25" bgcolor="#FFFFFF"><div align="center">评论主题：</div></td>
                    <td width="467" bgcolor="#FFFFFF"><div align="left">
                        <input type="text" name="title" size="30" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                    </div></td>
                  </tr>
                  <tr>
                    <td height="125" bgcolor="#FFFFFF"><div align="center">评论内容：</div></td>
                    <td height="125" bgcolor="#FFFFFF"><div align="left">
                        <textarea name="content" cols="70" rows="10" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></textarea>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
        </table>
          <table width="530" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><div align="center">
                  <input name="submit2" type="submit" class="buttoncss" value="发表">
&nbsp;&nbsp;&nbsp;<a href="showpl.php?id=<?php echo $_GET[id];?>">查看该票评论</a></div></td>
            </tr>
          </table>
      </form>
    <?php
	   }
	  
	  ?></td></tr>
</table>
</div>
	<div class="down" style=" width: auto; height: 120px; margin-top: 130px;">
		<?php include("bottom.php");
?>
	</div>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
