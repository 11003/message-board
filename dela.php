<?php

$id=$_GET['id'];
mysql_connect('localhost','root','12345678');
mysql_query('set names utf8');
mysql_select_db('ide');
$sql="delete from item_goods where goods_id=".$id;
if(mysql_query($sql)){
	header('location:admina.php');
}else{
	die(mysql_error());
}