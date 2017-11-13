
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>更改商品信息</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<?php 
  include("conn/conn.php");
  $sql1=mysql_query("select * from tb_piaoyuan where id=".$_GET[id]."",$conn);
  $info1=mysql_fetch_array($sql1);
?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<p>&nbsp;</p>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" bgcolor="#0099FF"><div align="center" class="style1">修改票源信息</div></td>
  </tr>
  <tr>
    <td height="253" bgcolor="#666666"><table width="750" border="0" cellpadding="0" cellspacing="0">
        <script language="javascript">
	function chkinput(form)
	{
	  if(form.mingcheng.value=="")
	   {
	     alert("请输入票源名称!");
		 form.mingcheng.select();
		 return(false);
	   }
	  
	
	
	  if(form.studentprice.value=="")
	   {
	     alert("请输入学生价!");
		 form.studentprice.select();
		 return(false);
	   }
	 
	
	
	  if(form.price.value=="")
	   {
	     alert("请输入成人价!");
		 form.price.select();
		 return(false);
	   }
	  if(form.dengji.value=="")
	   {
	     alert("请输入客运方式!");
		 form.dengji.select();
		 return(false);
	   }
	   
	   
	   if(form.qidian.value=="")
	   {
	     alert("请输入起点!");
		 form.qidian.select();
		 return(false);
	   }
	   
	   if(form.end.value=="")
	   {
	     alert("请输入终点!");
		 form.end.select();
		 return(false);
	   }
	   if(form.shuliang.value=="")
	   {
	     alert("请输入票源数量!");
		 form.shuliang.select();
		 return(false);
	   }
	   if(form.tishi.value=="")
	   {
	     alert("请输入安全提示!");
		 form.tishi.select();
		 return(false);
	   }
	   return(true);
	}
    </script>
        <form name="form1"  enctype="multipart/form-data" method="post" action="savechangegoods.php?id=<?php echo $_GET[id];?>" onSubmit="return chkinput(this)">
          <tr>
            <td width="129" height="25" bgcolor="#FFFFFF"><div align="center">票源名称：</div></td>
            <td width="618" bgcolor="#FFFFFF"><div align="left">
                <input type="text" name="mingcheng" size="25" class="inputcss" value="<?php echo $info1[mingcheng];?>">
            </div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">发车时间：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">
                <select name="nian" class="inputcss">
                  <?php 
  for($i=1995;$i<=2050;$i++)
  {
 ?>
                  <option <?php if(substr($info1[starttime],0,4)==$i){echo "selected";}?>><?php echo $i;?></option>
                  <?php 
  }
 ?>
                </select>
                年
                <select name="yue" class="inputcss">
                  <?php 
            for($i=1;$i<=12;$i++)
             {
            ?>
                  <option <?php if(substr($info1[starttime],5,1)==$i){echo "selected";} ?>><?php echo $i;?></option>
                  <?php 
             }
             ?>
                </select>
                月
                <select name="ri" class="inputcss">
                  <?php 
            for($i=1;$i<=31;$i++)
             {
            ?>
                  <option <?php if(substr($info1[starttime],7,1)==$i){echo "selected";} ?>><?php echo $i;?></option>
                  <?php 
             }
             ?>
                </select>
                日</div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">价格：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">成人票价：
                    <input type="text" name="price" size="10" class="inputcss" value="<?php echo $info1[price];?>">
                元&nbsp;&nbsp;学生价：
                <input type="text" name="studentprice" size="10" class="inputcss" value="<?php echo $info1[studentprice];?>">
                元</div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">座位类型：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">
                <?php
			$sql=mysql_query("select * from tb_type order by id desc",$conn);
			$info=mysql_fetch_array($sql);
			if($info==false)
			{
			  echo "请先添加座位类型!";
			}
			else
			{
			?>
                <select name="typeid" class="inputcss">
                  <?php
			do
			{
			?>
                  <option value=<?php echo $info[id];?> <?php if($info1[typeid]==$info[id]) {echo "selected";}?>><?php echo $info[typename];?></option>
                  <?php
			}
			while($info=mysql_fetch_array($sql));
			?>
                </select>
                <?php
		     }
		    ?>
            </div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">客运方式：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">
                <select name="dengji" class="inputcss">
                  <option value="火车" <?php if(trim($info1[dengji])=="火车"){echo "selected";}?>>火车</option>
                  <option value="动车" <?php if(trim($info1[dengji])=="动车"){echo "selected";}?>>动车</option>
                  <option value="高铁" <?php if(trim($info1[dengji])=="高铁"){echo "selected";}?>>高铁</option>
                </select>
            </div></td>
          </tr>
          <tr>
            <td height="22" bgcolor="#FFFFFF"><div align="center">出发地：</div></td>
            <td height="22" bgcolor="#FFFFFF"><div align="left">
                <input type="text" name="qidian" class="inputcss" size="20" value="<?php echo $info1[qidian];?>">
            </div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">目的地：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">
                <input type="text" name="end" class="inputcss" size="20" value="<?php echo $info1[end];?>">
            </div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">是否置顶：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">
                <select name="tuijian" class="inputcss" >
                  <option value=1 <?php if($info1[tuijian]==1) {echo "selected";}?>>是</option>
                  <option value=0 <?php if($info1[tuijian]==0) {echo "selected";}?>>否</option>
                </select>
            </div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">数量：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">
                <input type="text" name="shuliang" class="inputcss" size="20" value="<?php echo $info1[shuliang];?>">
            </div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">图片：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input name="upfile" type="file" class="inputcss" id="upfile" size="30">
            </div></td>
          </tr>
          <tr>
            <td height="80" bgcolor="#FFFFFF"><div align="center">安全提示：</div></td>
            <td height="25" bgcolor="#FFFFFF"><div align="left">
                <textarea name="tishi" cols="50" rows="8" class="inputcss"><?php echo $info1[tishi];?></textarea>
            </div></td>
          </tr>
          <tr>
            <td height="25" colspan="2" bgcolor="#FFFFFF"><div align="center">
              <input type="submit" class="buttoncss" value="更改">
              &nbsp;&nbsp;
                <input type="reset" value="取消" class="buttoncss">
            </div></td>
          </tr>
        </form>
    </table></td>
  </tr>
</table>
</body>
</html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
