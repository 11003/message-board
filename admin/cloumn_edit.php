<?php ini_set('date.timezone','Asia/Shanghai'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑栏目</title>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
function show()
{
document.getElementById('tr_nr').style.display="table-row";
	}
function show2()
{
document.getElementById('tr_nr').style.display="none";
	}

var ue = UE.getEditor('cloumn_matter');
</script>
</head>

<body>

<?php
require("../db_webconfig.php");
$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$conn->query("set names utf8");

$cloumn_ide="";
$sel_ide="0";
$cloumn_name="";
$cloumn_type="";
$cloumn_matter="";
$dz="";
$id="";
if(empty($_GET['id'])==false)
{
	$result=$conn->query("select * from clumns where id='".$_GET['id']."'");
	if($sdr=$result->fetch_assoc())
	{
		$id=$sdr['id'];
		$cloumn_ide=$sdr['cloumn_ide'];
		$cloumn_name=$sdr['cloumn_name'];
		$cloumn_type=$sdr['cloumn_type'];
		$cloumn_matter=$sdr['cloumn_matter'];
		$sel_ide=$sdr['cloumn_up_ide'];
	}
	else
	
	{
	$id="0";
	$sel_ide="0";
	$cloumn_ide=date('Ymd').time();
	$cloumn_name="";
	}
	$dz="xg";
}
else

{
	$id="0";
	$sel_ide="0";
	$cloumn_ide=trim(date('Ymd').time());
	$cloumn_name="";
	$dz="tj";
	}



function cloumn_list($up_ide,$sd,$sel_ide1)
{
$sd="--".$sd;
require("../db_webconfig.php");
$conn=new mysqli($mysql_server,$mysql_userid,$mysql_pwd,$mysql_data);
$conn->query("set names utf8");
$result=$conn->query("select cloumn_ide,cloumn_up_ide,cloumn_name,cloumn_type from clumns where cloumn_up_ide='".$up_ide."'");
while($sdr=$result->fetch_assoc())
{
if($sdr['cloumn_ide']==$sel_ide1)
{
	echo " <option  value=\"".$sdr['cloumn_ide']."\" selected=\"selected\" >".$sd.$sdr['cloumn_name']."</option>";
}
else
{
	echo " <option  value=\"".$sdr['cloumn_ide']." \">".$sd.$sdr['cloumn_name']."</option>";
	}
	
	cloumn_list($sdr["cloumn_ide"],$sd,$sel_ide1);
}

}

?>
<form id="form1" name="form1" method="post" action="cloumn_edit_ok.php">
<input type="hidden" name="dz" value="<?=$dz?>" />
<input type="hidden" name="id" value="<?=$id?>" />
  <table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr>
      <td width="8%">栏目编号：</td>
      <td width="92%"><input name="cloumn_ide" type="text" id="cloumn_ide" value="<?=$cloumn_ide?>" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>所属栏目：</td>
      <td><select name="cloumn_up_ide" id="cloumn_up_ide">
    <option value="0" >顶级栏目</option>
     <?=cloumn_list("0","",$sel_ide)?>
      </select></td>
    </tr>
    <tr>
      <td>栏目名称：</td>
      <td><input type="text" name="cloumn_name" id="cloumn_name"  value="<?=$cloumn_name?>" /></td>
    </tr>
    <tr>
      <td>栏目类型：</td>
      <td><input name="cloumn_type" type="radio" id="radio" value="单栏目" checked="checked" onclick="show()" />
      单栏目
      <input type="radio" name="cloumn_type" id="radio2" value="多栏目" onclick="show2()" />
      多栏目</td>
    </tr>
    <tr id="tr_nr">
      <td>栏目内容：</td>
      <td><textarea name="cloumn_matter" id="cloumn_matter" style="width:800px; height:400px;" cols="45" rows="5"><?=$cloumn_matter?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="提交" /></td>
    </tr>
  </table>
</form>

</body>
</html>