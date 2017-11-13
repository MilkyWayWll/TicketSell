
<?php
  
	   include("conn/conn.php");
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>火车在线售票系统</title>
<link rel="stylesheet" type="text/css" href="css/mytrain.css">
<SCRIPT type="text/javascript" src="js/mytrain.js"></SCRIPT>
</head>
<body>
<DIV class="store_head">
  <DIV id="head_top" class="top">
    <DIV class="logo" align="center"><A href="index.php"><IMG src="image/logo.gif" width="500" height="60" border="0"></A></DIV>
    <DIV class="store_tel"><img src="image/top.jpg" /></DIV>
  </DIV>
  <DIV class="flower">&nbsp;</DIV>
  <DIV class="nav">
    <UL class="MainMenu_ul">
      <LI class="line">&nbsp;</LI>
      <LI id="ShowHome" class="nav_li" page="Home"><A href="index.php"><IMG src="image/nav_index.gif" height="29" border="0"></A></LI>
      <LI class="line">&nbsp;</LI>
      <LI id="ShowList" class="nav_li" page="List"><A href="ticketselect.php"><IMG src="image/nav_2.gif"  height="29"></A></LI>
      <LI class="line">&nbsp;</LI>
      <LI id="ShowStation" class="nav_li" page="Station"><A href="showtuijian.php"><IMG src="image/nav_3.gif" ="101" height="29"></A></LI>
      <LI class="line">&nbsp;</LI>
      <LI id="ShowTrain" class="nav_li" page="Train"><A href="showtejia.php"><IMG src="image/nav_4.gif"  height="29"></A></LI>
      <LI class="line">&nbsp;</LI>
      <LI id="ShowUser" class="nav_li" page="User"><A href="gouwuche.php"><IMG src="image/nav_5.gif"  height="29" border="0"></A></LI>
      <LI class="line">&nbsp;</LI>
      <LI id="ShowManage" class="nav_li" page="Manage"><A href="guest_demo/index.php"><IMG src="image/7.jpg"  height="29" border="0"></A></LI>
	
    </UL>
  </DIV>
  <TABLE width="1003" border="0" align="center" cellpadding="0" cellspacing="0" class="search">
    <TBODY>
      <TR>
        <td width="30%" height="39"><div class="copyright">Program by</div></TD>
        <td width="20%"><div class="cPrange" align="center">翁玲龙</div></td>
        <td width="20%"><div class="cPrange" align="center">刘庆锦 姜致帮</div></td>
        <td width="30%"><div class="cPrange" align="center">蔡紫强 王柏秋</div></td>
      </TR>
    </TBODY>
  </TABLE>
</DIV>
