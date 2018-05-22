<?php session_start()?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
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
$conn->query("set names gbk");
$res=$conn->query("select user_id,user_pwd from users where user_id='".$_SESSION['user_id']."' and user_pwd='".$_SESSION['user_pwd']."'");
$arr=$res->fetch_assoc();
if(!$arr)
{
	echo "<script>alert('请先登录');location.href='login.html'</script>";
}
	}
 ?>
<div class="top" ></div>
<div class="left" >
<ul>
<li><a href="myuser_edit.php" target="right">修改个人资料</a></li>
<li><a href="cloumn_edit.php" target="right">栏目添加</a></li>
<li><a href="cloumn_list.php" target="right">栏目修改删除</a></li>
<li><a href="art_edit.php" target="right">添加文章</a></li>
<li><a href="art_list.php" target="right">修改删除文章</a></li>



</ul>
</div>
<div class="right" >
<iframe id="right" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>