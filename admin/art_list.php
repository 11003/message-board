<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

<?php

require("../db_webconfig.php");
$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$conn->query("set names utf8");
$page=1;
if($_GET["page"]==null || $_GET["page"]<1)
{
	$page=1;
	}
else
{
	$page=(int)$_GET["page"];
}

$res2=$conn->query("select count(id) as num from art");
$arr2=$res2->fetch_assoc();
$total=$arr2["num"];

if($total%3==0)
{
if($page>$total/3)
{
	$page=$total/3;
	$all=$total/3;
	}
}
else
{
	if($page>$total/3)
	{
	$page=(int)($total/3)+1;
	$all=(int)($total/3)+1;
	}
	}

$start=($page-1)*3;
$res=$conn->query("select * from art  limit ".$start.",3");
while($arr=$res->fetch_assoc())
{
?>
<table border="1">
  <tr>
   <td width="200"><?=$arr["id"]?></td>
    <td width="200"><?=$arr["title"]?></td>
    <td  width="200"><?=$arr["fbsj"]?></td>
    <td  width="200">修改 删除</td>
  </tr>
</table>

<?
	}
echo "共：".$total."记录&nbsp;共". $all."页";
?>
<input  type="button" value="上一页"  onclick="location.href='?page=<?=$page-1?>'"/>
<input  type="button" value="下一页"  onclick="location.href='?page=<?=$page+1?>'"/>

</body>
</html>