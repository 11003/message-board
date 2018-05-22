<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改内容</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php
@$id=$_GET['id'];
mysql_connect('localhost','root','12345678');
mysql_query('set names utf8');
mysql_select_db('bbs');
if(isset($_POST["button"])){
	$content=$_POST['content'];
	$title=$_POST['title'];
	$user=$_POST['user'];
	$sql="update message set title='$title',user='$user',content='$content' where id=$id";
	
	if(mysql_query($sql)){
		header("location:list.php");
	}else{
		echo '修改失败';
		exit();
	}
}

	$sql="select * from message where id=$id";
	$rs=mysql_query($sql);
	@$rows=mysql_fetch_assoc($rs);
?>
<form method="post">
<table align="center">
<div align="center" style="margin-bottom: 20px"><h1>修改内容</h1></div>
	<tr>
		<td>标题</td>
		<td><input type="text" name="title" id="title" value="<?php echo $rows['title'] ?>"></td>
	</tr>
	<tr>
		<td>用户</td>
		<td><input type="text" name="user" id="user" value="<?php echo $rows['user'] ?>"></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><input type="text" name="content" id="content" value="<?php echo $rows['content'] ?>"></td>
	</tr>
</table>
<input type="submit" name="button" id="submit" value="修改" style="width: 100%">
<input type="button" name="button2" value="返回" onclick="location.href='list.php'" style="width: 100%">
</form>
</body>
</html>