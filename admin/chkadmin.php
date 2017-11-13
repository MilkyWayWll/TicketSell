<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 class chkinput{
   var $name;
   var $pwd;

   function chkinput($x,$y)
    {
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput()
   {
       $conn=mysql_connect("localhost","root","123456") or die("数据库服务器连接错误".mysql_error());
       mysql_select_db("db_ticket",$conn) or die("数据库访问错误".mysql_error());
       mysql_query("set character set utf-8");
       mysql_query("set names utf-8");
     $sql=mysql_query("select * from tb_admin where name='".$this->name."'",$conn);
     $info=mysql_fetch_array($sql);
     if($info==false)
       {
          echo "<script language='javascript'>alert('不存在此管理员！');history.back();</script>";
          exit;
       }
      else
       {
          if($info[pwd]==$this->pwd){
               header("location:default.php");
            }
          else
           {
             echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
             exit;
           }

      }    
   }
 }


    $obj=new chkinput(trim($_POST[name]),md5(trim($_POST[pwd])));
    $obj->checkinput();

?>