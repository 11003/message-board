<?php

$id=$_GET['id'];
include 'conn.php';
$sql="delete from message where id=".$id;
if(mysql_query($sql)){
	header('location:list.php');
}else{
	die(mysql_error());
}