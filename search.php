<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
      <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
        <script language="javascript">
	    function chkinput1(form)
		{
		  if(form.name.value=="")
		   {
		     alert("请输入关键字!");
			 form.name.select();
			 return(false);
		   }
		  if(form.jg.value=="")
		   {
		     alert("请输入价格!");
			 form.jg.select();
			 return(false);
		   }
		   return(true);
		}
	  </script>
        <form name="form1" method="post" action="serchorder.php" onSubmit="return chkinput1(this)">
          <tr>
            <td height="25" bgcolor="#F0F0F0"><div align="center" style="color: #6A0206">票源高级查找</div></td>
          </tr>
          <tr>
            <td height="50" bgcolor="#FFEDBF"><table width="400" height="80" border="0" cellpadding="0" cellspacing="1">
                <tr>
                  <td width="68" height="25" bgcolor="#FFFFFF"><div align="center">关键字:</div></td>
                  <td width="207" bgcolor="#FFFFFF"><div align="left">
                      <input name="name" type="text" class="inputcss" id="name" size="25">
                  </div></td>
                  <td width="51" bgcolor="#FFFFFF"><div align="center">模糊:</div></td>
                  <td width="69" bgcolor="#FFFFFF"><div align="center">
                      <input name="mh" type="checkbox" value="1" checked>
                  </div></td>
                </tr>
                <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">价格:</div></td>
                  <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                      <select name="dx">
                        <option selected value="1">大于</option>
                        <option value="-1">小于</option>
                        <option value="0">等于</option>
                      </select>
&nbsp;
                <select name="jg" class="inputcss">
                  <option selected value=500>50</option>
                  <option value=100>100</option>
                  <option value=150>150</option>
                  <option value=200>200</option>
                  <option value=300>300</option>
                </select>
                元</div></td>
                </tr>
                <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">座位类型:</div></td>
                  <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                      <select name="lb">
                        <?php
						  include("conn/conn.php");
				 $sql=mysql_query("select * from tb_type order by id desc",$conn);
				 $info=mysql_fetch_array($sql);
				 if($info==false)
				   {
				     echo " <option>本站暂无商品类别</option>";
				   }
				  else
				  { 
				    do
					 {
				?>
                        <option value=<?php echo $info[id];?>><?php echo $info[typename];?></option>
                        <?php
				     }while($info=mysql_fetch_array($sql));
				 }
				?>
                      </select>
                  </div></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF"><div align="center">
                <input name="submit2" type="submit" class="buttoncss" value="开始查找">
            </div></td>
          </tr>
        </form>
    </table>
</body>
</html>