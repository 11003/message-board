<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("../db_webconfig.php");

$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$conn->query("set names utf8");

if($_POST['dz']=="xg")
{
	
$res=$conn->query("update clumns set cloumn_ide='".$_POST['cloumn_ide']."',cloumn_up_ide='".$_POST['cloumn_up_ide']."',cloumn_name='".$_POST['cloumn_name']."',cloumn_type='".$_POST['cloumn_type']."',cloumn_matter='".$_POST['cloumn_matter']."' where id=".$_POST['id']."");
if($res)
{
	echo "<script>alert('修改成功');location.href='cloumn_list.php'</script>";
}
else
{
	echo "<script>alert('修改失败');history.go(-1)</script>";
	}
	
	}
else
{
$res=$conn->query("insert into clumns (cloumn_ide,cloumn_up_ide,cloumn_name,cloumn_type,cloumn_matter) values ('".$_POST['cloumn_ide']."','".$_POST['cloumn_up_ide']."','".$_POST['cloumn_name']."','".$_POST['cloumn_type']."','".$_POST['cloumn_matter']."')");
if($res)
{
	echo "<script>alert('添加成功');location.href='cloumn_list.php'</script>";
}
else
{
	echo "<script>alert('添加失败');history.go(-1)</script>";
	}
}

?>