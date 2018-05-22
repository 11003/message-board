<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
</head>

<body>
<?php
echo date('Y.m.d h:i:s').time();
?>
<form id="form1" name="form1" method="post" action="">
  <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea>
  <script type="text/javascript">var ue = UE.getEditor('textarea');</script>
</form>
</body>
</html>
