<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目修改删除</title>
</head>

<body>
<?php
if($_SESSION['user_id']==NULL || $_SESSION['user_pwd']==NULL)
{
	echo "<script>alert('请先登录');location.href='login.html'</script>";
	}
else
{
require("../db_webconfig.php");
$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$conn->query("set names utf8");
$res=$conn->query("select user_id,user_pwd from users where user_id='".$_SESSION['user_id']."' and user_pwd='".$_SESSION['user_pwd']."'");
$arr=$res->fetch_assoc();
if(!$arr)
{
	echo "<script>alert('请先登录');location.href='login.html'</script>";
}
	}
	
	
if(empty($_GET['id'])==false)
{
$result=$conn->query("select id,cloumn_ide,cloumn_up_ide,cloumn_name,cloumn_type from clumns where id=".$_GET['id']."");
while($sdr=$result->fetch_assoc())
{
	cloumn_list_del($sdr['cloumn_ide']);
	
	$res=$conn->query("delete from  clumns where id=".$_GET['id']."");
	}	


	echo "<script>alert('删除成功');location.href='?'</script>";

	}
	
function cloumn_list_del($up_ide)
{
require("../db_webconfig.php");
$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$conn->query("set names utf8");
$result=$conn->query("select id,cloumn_ide,cloumn_up_ide,cloumn_name,cloumn_type from clumns where cloumn_up_ide='".$up_ide."'");
while($sdr=$result->fetch_assoc())
{
	cloumn_list_del($sdr['cloumn_ide']);
	
	$res=$conn->query("delete from  clumns where cloumn_ide='".$sdr['cloumn_ide']."'");
	
	}

}
	
?>


 
<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#CCCCCC">
  <tr>
    <td height="40">栏目名称</td>
    <td height="40" style="width:150px; min-width:150px;">栏目类型</td>
    <td height="40"  style="width:150px; min-width:150px;">操作</td>
  </tr>
 <?php
function cloumn_list($up_ide,$sd)
{
$sd++;
require("../db_webconfig.php");
$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$conn->query("set names utf8");
$result=$conn->query("select id,cloumn_ide,cloumn_up_ide,cloumn_name,cloumn_type from clumns where cloumn_up_ide='".$up_ide."' ");
while($sdr=$result->fetch_assoc())
{
 ?>
  <tr>
    <td height="40" bgcolor="#FFFFFF"><span style="margin-left:<?=(int)$sd*30?>px;"><?=$sdr["cloumn_name"]?></span></td>
    <td height="40" bgcolor="#FFFFFF" align="center"><?=$sdr["cloumn_type"]?></td>
    <td height="40" bgcolor="#FFFFFF" align="center">
    <input type="button"  value="修改"  onclick="location.href='cloumn_edit.php?id=<?=$sdr["id"]?>&action=xg'"/>
    <input type="button"  value="删除" onclick="location.href='?id=<?=$sdr["id"]?>&action=del'"/>
    </td>
  </tr>
<?php
cloumn_list($sdr["cloumn_ide"],$sd);
}
}

cloumn_list(0,0);
?>
</table>

 

</body>

</html>