<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<style>
	table{border:1px solid #000;border-collapse: collapse}
	tr,td{border:1px solid #000}
</style>
<script>
function jump(id){
	if(confirm("确定删除吗?")){
		location.href='del.php?id='+id;
	}
}	
</script>
</head>

<body>
<div><h1 style="text-align: center">查看留言板</h1></div>
<table width="700" align="center">
<?php
	include 'conn.php';
	$sql='select * from message order by id desc';
	$query=mysql_query($sql);
	while($rows=mysql_fetch_assoc($query)){
	
?>
	<tr>
		<td bgcolor="#D7282B" style="color: wheat">编号：<?php echo $rows['id']; ?>
		</td>
	</tr>
	<tr>
		<td>标题：<?php echo $rows['title']; ?></td>
	</tr>
	<tr>
		<td>用户：<?php echo $rows['user']; ?>
		<div style="float: right"><input type="button" value="删除" onclick="jump(<?php echo $rows['id'] ?>)"></div></td>
	</tr>
	<tr>
		<td>发表内容：<?php echo $rows['content'] ?>
		<div style="float: right">
		<?php echo'<input type="button" value="修改" onclick="location.href=\'modify.php?id='.$rows['id'].'\'"/>' ?></div>
		</td>
	</tr>
	<tr>
		<td><div style="text-align: right;color: deeppink">发表时间：<?php echo $rows['lastdate']?></div></td>
	</tr>
	<tr><td><br><br></td></tr>
<?php } ?>

	<tr>
		<td><input type="button" value="返回" onclick="location.href='add.php'" style="float: right;width: 100%"></td>
	</tr>
	
</table>
</body>
</html>