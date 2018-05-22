<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品展示</title>
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet"/>
    <style>
	</style>
    <script>
	function jump(id){
		if(confirm('确定删除吗'))
		{	
			location.href='dela.php?id='+id;
		}
	}
	</script>
</head>
<body>
<?php
//连接数据库
$link=mysqli_connect('localhost','root','12345678')or die('数据库链接失败');
//选择数据库
mysqli_query('use ide') or die('数据库选择失败');
//设置mysql客户端的字符编码
mysqli_query('set names utf8');
//获取tdb_goods表的数据
$rs=mysqli_query('select * from item_goods');
?>
<a href="adda.php" style="position: fixed;color:brown">添加商品</a>
<table style="width:1200px;margin:0 auto;border-collapse: collapse;text-align: center" border="1">
<tr>
	<th>商品标号</th>
    <th>商品名称</th>
    <th>商品类型</th>
    <th>商品图片</th>
    <th>品牌分类</th>
    <th>价格</th>
    <th>是否上架</th>
    <th>商品是否卖空</th>
    <th>修改</th>
    <th>删除</th>
</tr>
<?php
//循环取出,取出一条记录匹配成对象
while($rows=mysql_fetch_assoc($rs)){
		echo '<tr>';
		echo '<td>'.$rows['goods_id'].'</td>';
		echo '<td>'.$rows['goods_name'].'</td>';
		echo '<td>'.$rows['goods_cate'].'</td>';
		echo $rows['goods_img']=""?'<td>图片暂缺</td>':'<td><img src="'.$rows['goods_img'].'"></td>';
		echo '<td>'.$rows['goods_price'].'</td>';
		echo '<td>'.$rows['brand_name'].'</td>';
		echo '<td>'.$rows['is_show'].'</td>';
		echo '<td>'.$rows['is_saleoff'].'</td>';
		echo '<td><input type="button" value="修改" onclick="location.href=\'modifya.php?id='.$rows['goods_id'].'\'"/></td>';
		echo '<td><input type="button" value="删除" onclick="jump('.$rows['goods_id'].')"/></td>';
		echo '</tr>';
	}
//释放资源
mysql_free_result($rs);

//关闭资源
mysql_close($link);
?>
</table>






</body>
</html>