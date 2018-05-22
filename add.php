<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="kindeditor/kindeditor/kindeditor-all-min.js"></script>
	<style>
		span .ke-container{margin: 0 auto;}
	</style>
	<script>
		function check(){
	 	var user=document.getElementById("user").value;
	 	var title=document.getElementById("title").value;
		var content=document.getElementById("content").value;
		
		if(user=="" || title=="" || content==""){
			alert("内容不能为空");
			return false;
		}else{
			alert("OK");
			return true;
		}
	}
	</script>
</head>
<body>
<?php

if(isset($_POST['button'])){
include 'conn.php';

	$id=$_POST['id'];
	$user=$_POST['user'];
	$title=$_POST['title'];
	$content=$_POST['content'];

	$sql="insert into message values(NULL,'$user','$title','$content',now())";
	if(mysql_query($sql)){;
	echo "<script>alert('留言成功')</script>";
	header('location:list.php');
	}else{
		echo "添加失败";
	}
}
?>
<div><h1 style="margin-bottom: 30px;text-align: center;">留言板</h1></div>
	<form action="" method="post" style="text-align: center;" onSubmit="return check()">
		用户：<input type="text" name="user" id="user"><br/>
		标题：<input type="text" name="title" id="title"><br/>
		内容：<span><textarea name="content" placeholder="写下你的心得吧!" id="content"></textarea>
				<script>
                    KindEditor.ready(function(K) {
                        window.editor = K.create('#content',{
                            afterBlur:function(){this.sync();}
                        })
                    });
                </script>
			 </span><br/>
		<input type="submit" name="button" value="发布留言">
		<a href="list.php">查看留言</a>
	</form>

</body>
</html>