<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
@$id=$_GET['id'];
mysql_connect('localhost','root','12345678');
mysql_query('set names utf8');
mysql_select_db('ide');
if(isset($_POST['button'])){
	$goods_name=$_POST['goods_name'];
	$goods_cate=$_POST['goods_cate'];
	$goods_img=$_POST['goods_img'];
	$goods_price=$_POST['goods_price'];
	$brand_name=$_POST['brand_name'];
	$is_show=$_POST['is_show'];
	$is_saleoff=$_POST['is_saleoff'];
	$sql="update item_goods set goods_name='$goods_name',goods_cate='$goods_cate',goods_img='$goods_img',goods_price='$goods_price',brand_name='$brand_name',is_show='$is_show',is_saleoff='$is_saleoff' where goods_id=$id";
	
	if(mysql_query($sql)){
		header("location:admina.php");
	}else{
		echo '修改失败';
		exit();
	}

}
	$sql="select * from item_goods where goods_id=$id";
	$rs=mysql_query($sql);
	@$rows=mysql_fetch_assoc($rs);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="370" border="1">
    <tbody>
      <tr>
        <td colspan="2" align="center"><h1>修改商品</h1></td>
      </tr>
      <tr>
        <td>商品名称</td>
        <td><input type="text" name="goods_name" id="goods_name" value="<?php echo $rows['goods_name']?>"></td>
      </tr>
      <tr>
        <td>商品类型</td>
        <td><input type="text" name="goods_cate" id="goods_cate" value="<?php echo $rows['goods_cate']?>"></td>
      </tr>
      <tr>
        <td>商品图片地址</td>
        <td><input type="text" name="goods_img" id="goods_img" value="<?php echo $rows['goods_img']?>"></td>
      </tr>
      <tr>
        <td>商品价格</td>
        <td><input type="text" name="goods_price" id="goods_price" value="<?php echo $rows['goods_price']?>"></td>
      </tr>
      <tr>
        <td>商品品牌</td>
        <td><input type="text" name="brand_name" id="brand_name" value="<?php echo $rows['brand_name']?>"></td>
      </tr>
      <tr>
        <td>是否上架</td>
        <td><input type="text" name="is_show" id="is_show" value="<?php echo $rows['is_show']?>"></td>
      </tr>
      <tr>
        <td>商品是否卖空</td>
        <td><input type="text" name="is_saleoff" id="is_saleoff" value="<?php echo $rows['is_saleoff']?>"></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
        <input type="submit" name="button" id="submit" value="修改">
        <input type="button" name="button2" id="button2" value="返回" onclick="location.href='admina.php'">
        <input type="reset" name="button3" id="submit" value="重置">
        </td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>