<?php session_start()?>
<!DOCTYPE html>
<head>
<title>修改个人资料</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
td{ padding:5px;}
</style>
<script>
</script>
</head>

<body>
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
$res=$conn->query("select * from users where user_id='".$_SESSION['user_id']."' and user_pwd='".$_SESSION['user_pwd']."'");

$arr=$res->fetch_assoc();
if($arr)
{
?>
<form id="form1" name="form1" method="post" action="myuser_edit_ok.php">
  <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#CCCCCC" >
    <tr>
      <td width="12%" height="30" align="right" bgcolor="#FFFFFF">账号：</td>
      <td width="88%" height="30" bgcolor="#FFFFFF"><input name="user_id" type="text" id="user_id" value="<?=$arr['user_id'] ?>" readonly="readonly" /></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">密码：</td>
      <td height="30" bgcolor="#FFFFFF"><input type="password" name="user_pwd" value="<?php echo $arr['user_pwd'] ?>" id="user_pwd" /></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">再次输入密码：</td>
      <td height="30" bgcolor="#FFFFFF"><input type="password" name="user_pwd2" value="<?php echo $arr['user_pwd'] ?>"  id="user_pwd2" /></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">姓名：</td>
      <td height="30" bgcolor="#FFFFFF"><input type="text" name="user_name" value="<?php echo $arr['user_name'] ?>"  id="user_name" /></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">性别：</td>
      <td height="30" bgcolor="#FFFFFF">
     
      <input type="radio" name="user_sex" id="radio" value="男"  <?php if($arr['user_sex']=='男'){ ?> checked="checked"   <?php } ?> />男
      <input type="radio" name="user_sex" id="radio2" value="女"  <?php if($arr['user_sex']=='女'){ ?> checked="checked"   <?php } ?> />女
 
        </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="30" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="提交" />
      <input type="reset" name="button2" id="button2" value="重置" /></td>
    </tr>
  </table>
</form>
<?php
}
else
{
echo "<script>alert('请先登录');window.top.location.href='login.html'</script>";
	}
	}
 ?>
</body>
</html>
