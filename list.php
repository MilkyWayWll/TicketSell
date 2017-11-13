<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
      <table width="530" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#F0F0F0">
          <td width="92" height="25"><div align="center" style="color: #990000">名称</div></td>
          <td width="83"><div align="center" style="color: #990000">品牌</div></td>
          <td width="62"><div align="center" style="color: #990000">市场价</div></td>
          <td width="62"><div align="center" style="color: #990000">会员价</div></td>
          <td width="161"><div align="center" style="color: #990000">上市时间</div></td>
          <td width="48"><div align="center" style="color: #FFFFFF"><span class="style1"></span></div></td>
          <td width="42"><div align="center" style="color: #990000">操作</div></td>
        </tr>
        <?php
		 do{
		?>
        <tr bgcolor="#FFFFFF">
          <td height="25"><div align="center"><?php echo $info[mingcheng];?></div></td>
          <td height="25"><div align="center"><?php echo $info[pinpai];?></div></td>
          <td height="25"><div align="center"><?php echo $info[shichangjia];?></div></td>
          <td height="25"><div align="center"><?php echo $info[huiyuanjia];?></div></td>
          <td height="25"><div align="center"><?php echo $info[addtime];?></div></td>
          <td height="25"><div align="center"><a href="lookinfo.php?id=<?php echo $info[id];?>">查看</a></div></td>
          <td height="25"><div align="center"><a href="addgouwuche.php?id=<?php echo $info[id];?>">购物</a></div></td>
        </tr>
        <?php
		   }while($info=mysql_fetch_array($sql));
		 
		?>
    </table>
</body>
</html>