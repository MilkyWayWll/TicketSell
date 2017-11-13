<?php
 include("top.php");
?>
<tr align= "left" valign="top" bgcolor="#F0F0F0"><?php include("left.php")?></tr>
<div class="m_right" style=" width: 600px; height:380px; margin-left: 450px;margin-top: -350px;">
<table width="550" height="auto" border="0" align="center" cellpadding="0" cellspacing="0">
        <?php
	     $sql=mysql_query("select * from tb_piaoyuan order by starttime desc limit 0,4",$conn); 
		 $info=mysql_fetch_array($sql);
		 if($info==false){
		   echo "本站暂无最新产品!";
		  } 
		 else{ 
		    do{ 
	   ?>
        <tr>
          <td width="89"  rowspan="6"><div align="center">
              <?php
			 if($info[tupian]==""){
			   echo "暂无图片!";
			 }
			 else{
			?>
              <a href="lookinfo.php?id=<?php echo $info[id];?>">
                  <img border="0" src="<?php echo $info[tupian];?>" width="90" height="120"></a>
              <?php
			 }
			?>
          </div></td>
          <td width="93" height="20"><div align="center" style="color: #000000">车票：</div></td>
          <td colspan="5">
              <div align="left"><a href="lookinfo.php?id=<?php echo $info[id];?>"><?php echo $info[mingcheng];?></a>
              </div></td>
        </tr>
        <tr>
          <td width="93" height="20"><div align="center" style="color: #000000">出发站：</div></td>
          <td width="101" height="20"><div align="left"><?php echo $info[qidian];?></div></td>
          <td width="62"><div align="center" style="color: #000000">到达站：</div></td>
          <td colspan="3"><div align="left"><?php echo $info[end];?></div></td>
        </tr>
        <tr>
          <td width="93" height="20"><div align="center" style="color: #000000">座位类型：</div></td>
          <td height="20" colspan="5"><div align="left"><?php echo $info[type];?></div></td>
        </tr>
        <tr>
          <td height="20"><div align="center" style="color: #000000">出发时间：</div></td>
          <td height="20"><div align="left"><?php echo $info[starttime];?></div></td>
          <td height="20"><div align="center" style="color: #000000">数量：</div></td>
          <td width="69" height="20"><div align="left"><?php echo $info[shuliang];?>张</div></td>
          <td width="63"><div align="center" style="color: #000000">历时：</div></td>
          <td width="73"><div align="left"><?php echo $info[haoshi];?></div></td>
        </tr>
        <tr>
          <td height="20"><div align="center" style="color: #000000">价格：</div></td>
          <td height="20"><div align="left"><?php echo $info[price];?>元</div></td>
          <td height="20"><div align="center" style="color: #000000">学生票价：</div></td>
          <td height="20"><div align="left"><?php echo $info[studentprice];?>元</div></td>
          <td height="20"><div align="center" style="color: #000000">折扣率：</div></td>
          <td height="20"><div align="left"><?php echo (@ceil(($info[studentprice]/$info[price])*100))."%";?></div></td>
        </tr>
        <tr>
          <td height="20" colspan="6" width="461"><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="addgouwuche.php?id=<?php echo $info[id];?>">
                      <img src="image/b1.gif" width="50" height="15" border="0" style="cursor:hand"></a>
              </div></td>
        </tr>
        <tr>
          <td height="10" colspan="7" background="image/line1.gif"></td>
        </tr>
        <?php
	    	}while($info=mysql_fetch_array($sql));
		 }
		?>
      </table>
	</div>
	<div class="down" style=" width: auto; height: 120px; margin-top: 130px;">
		<?php include("bottom.php");
?>
	</div>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">