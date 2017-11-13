<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include("conn/conn.php");
$mingcheng=$_POST[mingcheng];
$nian=$_POST[nian];
$yue=$_POST[yue];
$ri=$_POST[ri];
$price=$_POST[price];
$studentprice=$_POST[studentprice];
$typeid=$_POST[typeid];
$type=$_POST[type];
$dengji=$_POST[dengji];
$qidian=$_POST[qidian];
$end=$_POST[end];
$tuijian=$_POST[tuijian];
$shuliang=$_POST[shuliang];
//$upfile=$_POST[upfile];

 if(ceil(($studentprice/$price)*100)<=80)
 {
 
    $tejia=1;
 }
 else
 {
    $tejia=0;
 }
if($upfile!="")
{
$sql=mysql_query("select * from tb_piaoyuan where id=".$_GET[id]."",$conn);
$info=mysql_fetch_array($sql);
@unlink(substr($info[tupian],6,(strlen($info[tupian])-6)));
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

$uploadfile="admin/".$uploadfile;

$tishi=$_POST[tishi];
$starttime=$nian."-".$yue."-".$ri;

mysql_query("update tb_piaoyuan set mingcheng='$mingcheng',type='$type',starttime='$starttime',dengji='$dengji',end='$end',tupian='$uploadfile',typeid='$typeid',price='$price',studentprice='$studentprice',qidian='$qidian',tuijian='$tuijian',shuliang='$shuliang' where id=".$_GET[id]."",$conn);
echo "<script>alert('该票".$mingcheng."修改成功!');history.back();;</script>";
?>