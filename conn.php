<?php
header('content-type:text/html;charset=utf8');

//链接数据库
mysql_connect("localhost",'root','12345678') or die("连接失败");
//选择编码
mysql_query('set names utf8');
//打开数据库
mysql_select_db("bbs");
