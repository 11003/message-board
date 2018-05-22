<?php session_start()?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("../db_webconfig.php");

//单数据查询
$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$res=$conn->query("select user_id,user_pwd from users where user_id='".$_POST['user_id']."' and user_pwd='".$_POST['user_pwd']."'");
$arr=$res->fetch_assoc();
if($arr)
{
//成功
$_SESSION['user_id']=$arr['user_id'];
$_SESSION['user_pwd']=$arr['user_pwd'];
echo "<script>alert('登录成功');location.href='index.php'</script>";
}
else
{
//失败

echo "<script>alert('账号密码不正确');history.go(-1);</script>";
}

?>