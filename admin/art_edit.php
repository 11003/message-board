<?php ini_set('date.timezone','Asia/Shanghai'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<script>var ue = UE.getEditor('matter');</script>
</head>

<body>
<?php
$dz="";
$title="";
$zz="";
$fbsj="";
$img="";
$matter="";
$sel_ide="0";
if(empty($_GET['id'])==false)
{
	$dz="xg";
	
	}
else
{
	$dz="tj";
	$fbsj=date('Y-M-D');
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

<form action="art_ok.php" method="post" name="form1" id="form1">
<input type="hidden" name="dz" value="<?=$dz?>" />
<input type="hidden" name="id" value="<?=$id?>" />
  <table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr>
      <td width="8%">标题：</td>
      <td width="92%"><input name="title" type="text" id="title" value="<?=$title?>"  /></td>
    </tr>
    <tr>
      <td>所属栏目：</td>
      <td><select name="clim_ide" id="clim_ide">
    <option value="0" >顶级栏目</option>
     <?=cloumn_list("0","",$sel_ide)?>
      </select></td>
    </tr>
    <tr>
      <td>作者：</td>
      <td><input type="text" name="zuoz" id="zuoz"  value="<?=$zz?>" /></td>
    </tr>
    <tr>
      <td>发布时间：</td>
      <td><input type="text" name="fbsj" id="fbsj"  value="<?=$fbsj?>" /></td>
    </tr>
    <tr>
      <td>标题图片</td>
      <td><input type="text" name="img" id="img"  value="<?=$img?>" />
      <input type="button" name="button2" id="button2" value="上传" /></td>
    </tr>
    <tr id="tr_nr">
      <td>栏目内容：</td>
      <td><textarea name="matter" id="matter" style="width:800px; height:400px;" cols="45" rows="5"><?=$matter?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="提交" /></td>
    </tr>
  </table>
</form>
</body>
</html>