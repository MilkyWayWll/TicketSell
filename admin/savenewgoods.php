<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include("conn/conn.php");
if(is_numeric($_POST[shichangjia])==false || is_numeric($_POST[huiyuanjia])==false)
 {
   echo "<script>alert('价格只能为数字！');history.back();</script>";
   exit;
 }
if(is_numeric($_POST[shuliang])==false)
 {
   echo "<script>alert('数量只能为数字！');history.back();</script>";
   exit;
 }
$mingcheng=$_POST[mingcheng];
$nian=$_POST[nian];
$yue=$_POST[yue];
$ri=$_POST[ri];
$price=$_POST[price];
$studentprice=$_POST[studentprice];
$typeid=$_POST[typeid];
$dengji=$_POST[dengji];
$type=$_POST[type];
$qidian=$_POST[qidian];
$end=$_POST[end];
$tuijian=$_POST[tuijian];
$shuliang=$_POST[shuliang];
$upfile=$_POST[upfile];

if(ceil(($studentprice/$price)*100)<=80)
 {
 
    $tejia=1;
 }
 else
 {
    $tejia=0;
 }


function getname($exname){
   $dir = "upimages/";
   $i=1;
   if(!is_dir($dir)){
      mkdir($dir,0777);
   }
   
   while(true){
       if(!is_file($dir.$i.".".$exname)){
	       $name=$i.".".$exname;
	       break;
	   }
	   $i++;
	 }

   return $dir.$name;
}

$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));
$uploadfile = getname($exname);

move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);
if(trim($_FILES['upfile']['name']!=""))
 { 
  $uploadfile="admin/".$uploadfile;
}
else
 {
  $uploadfile="";
 }

$tishi=$_POST[tishi];
$starttime=$nian."-".$yue."-".$ri;
mysql_query("insert into tb_piaoyuan(mingcheng,type,starttime,dengji,end,tupian,typeid,price,student,qidian,tuijian,shuliang,cishu)values('$mingcheng','$type','$starttime','$dengji','$end','$uploadfile','$typeid','$price','$studentprice','$qidian','$tuijian','$shuliang','0')",$conn);
echo "<script>alert('该票".$mingcheng."添加成功!');window.location.href='addgoods.php';</script>";
?>