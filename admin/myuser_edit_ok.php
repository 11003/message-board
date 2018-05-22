<?php session_start()?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
if($_SESSION['user_id']==NULL || $_SESSION['user_pwd']==NULL)
{
	echo "<script>alert('请先登录');window.top.location.href='login.html'</script>";
	}
else
{
require("../db_webconfig.php");
$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$conn->query("set names utf8");
$res=$conn->query("update users set user_pwd='".$_POST['user_pwd']."',user_name='".$_POST['user_name']."',user_sex='".$_POST['user_sex']."'  where user_id='".$_POST['user_id']."'");
if($res)
{
	echo "<script>alert('修改成功');location.href='myuser_edit.php'</script>";
}
else
{
	echo "<script>alert('修改失败');location.href='myuser_edit.php'</script>";
	}
}
?>
