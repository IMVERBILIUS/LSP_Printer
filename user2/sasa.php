<?php

$_SESSION['cart'] = array(
	'PRD001' => array(
		'code' => 'PRD001',
		'price' => 1000,
		'qty' => 2
	)
);

?>
<?php
session_start();
//add
if(isset($_POST['add'])){
	$code = $_POST['code'];
	$price = $_POST['price'];
	$qty = isset($_SESSION['cart'][$code]) ? $_POST['qty'] + $_SESSION['cart'][$code] : $_POST['qty'];
	$_SESSION['cart'][$code]['code'] = $code;
	$_SESSION['cart'][$code]['price'] = $price;
	$_SESSION['cart'][$code]['qty'] = $qty;
}
//update
if(isset($_POST['update'])){
foreach($_POST['code'] as $code){
	if(isset($_POST['delete'][$code]) && $_POST['delete'][$code]){
		unset($_SESSION['cart'][$code]);
	}elseif(isset($_SESSION['cart'][$code])){
		$_SESSION['cart'][$code]['price'] = $_POST['price'][$code];
		$_SESSION['cart'][$code]['qty'] = $_POST['qty'][$code];
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form name="form-add" action="" method="post">
Code: <input type="text" name="code" />
Price: <input type="text" name="price"/>
Qty: <input type="text" name="qty"/>
<input type="submit" name="add" value="Add"/>
</form>
<form name="form-cart" action="" method="post">
<table>
<tr>
	<td>Code</td>
	<td>Price</td>
	<td>Qty</td>
	<td>Sub Total</td>
	<td>Delete</td>
</tr>
<?php 
$grandTotal = 0;
if(isset($_SESSION['cart'])){
foreach($_SESSION['cart'] as $cart){?>
<tr>
	<td>
	<?php echo $cart['code'];?>
	<input type="hidden" name="code[]" value="<?php echo $cart['code'];?>"/>
	</td>
	<td><input type="text" name="price[<?=$cart["code"];?>]" value="<?php echo $cart['price'];?>"/></td>
	<td><input type="text" name="qty[<?=$cart['code'];?>]" value="<?php echo $cart['qty'];?>"/></td>
	<?php
	//proses kalkulasi
	$total = $cart['qty'] * $cart['price'];
	$grandTotal += $total;
	?>
	<td><?php echo $total;?></td>
	<td><input type="checkbox" name="delete[<?=$cart['code'];?>]" value="1"/></td>
</tr>
<?php }
}?>
<tr>
	<td></td>
	<td></td>
	<td>Grand Total:</td>
	<td><?php echo $grandTotal;?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td><input type="submit" name="update" value="Update Cart"/></td>
	<td></td>
</tr>
</table>
</form>
</body>
</html>