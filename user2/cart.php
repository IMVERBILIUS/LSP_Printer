<?php


require'../penjual/function.php';
require'db.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Mohon maaf, anda belum login!')
            window.location = '../login/index.php';
        </script>";

        
}
if($_SESSION['role'] !="user"){
    echo "
    <script type='text/javascript'>
        alert('anda bukan admin')
        window.location = '../login/index.php';
    </script>";
}

if(isset($_POST["cuk"])){
    if(transaksiData($_POST) ){
        echo"<script type='text/javascript'>
        alert('Transaksi berhasil ditunggu')
        window.location ='cart.php'
        </script>
        ";
    }else{
        echo"<script type='text/javascript'>
        alert('transaksi gagal coba lagi')
        window.location ='cart.php'
        </script>
        ";
    }
}

$status="";
if (isset($_POST['cak']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}

}
?>
<html>
<head>
<title>penjualan printer</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<link rel="stylesheet" href="../style/1style.css">
</head>
	<body>
		<div style="width:700px; margin:50 auto;">

			<h2>penjualan printer</h2>   

	<?php
			if(!empty($_SESSION["shopping_cart"])) {
				$cart_count = count(array_keys($_SESSION["shopping_cart"]));
	?>
		<div class="cart_div">
			<a href="cart.php">
				<img src="cart-icon.png" /> Cart
				<span><?php echo $cart_count; ?></span></a>
			</div>
			<div class="cart_div">
			<a href="index.php">
				 Kembali
				</a>
			</div>
	<?php
}
?>

<div class="cart">
	<?php
		if(isset($_SESSION["shopping_cart"])){
    	$total_price = 0;
	?>	
<table class="table">
	<tbody>
		<tr>
			<td>foto</td>
			<td>Nama Barang</td>
			<td>Jumlah</td>
			<td>Harga Perproduk</td>
			<td>Harga</td>
		</tr>	
<?php		
	foreach ($_SESSION["shopping_cart"] as $product){
?>
	<tr>
		<td><img src='../foto/<?php echo $product["image"]; ?>' width="50" height="40" /></td>
		<td><?php echo $product["name1"]; ?><br />
		
			<form method='post' action=''>

				<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />

				<input type='hidden' name='action' value="remove" />
			<button type='submit' name="cak" class='remove'>Remove Item</button>
			</form>
		</td>
		<td>
		<form method='post' action=''>
		<input type="hidden" name="tgl_transaksi" value="<?php echo date('d-m-Y'); ?>"  class="form-produk">
		<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
		<input type='hidden' name='id_barang' value="<?php echo $product["id"]; ?>" />
				<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
				<input type='hidden' name='action'  value="change" />
					<select name='quantity' class='quantity' onchange="this.form.submit()">
						<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
						<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
						<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
						<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
						<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
					</select>
					<input type="hidden" name="total_harga" value="<?php echo $total_price += ($product["price"]*$product["quantity"]); ?>" class="form-produk">
					<button type='submit' name="cuk">chek out</button>
			</form>
		</td>
			<td><?php echo "Rp".$product["price"]; ?></td>
			<td><?php echo "Rp".$product["price"]*$product["quantity"]; ?></td>
		</tr>
		
<?php
	
	}
?>
			<tr>
				<td colspan="5" align="right">
					<strong>TOTAL: <?php echo "Rp".$total_price; ?></strong>
				</td>
			</tr>
			
			
		
	</tbody>
	
</table>	
<?php
        include "../koneksi.php";
        
        $query = mysqli_query($conn, "SELECT * FROM barang ");
        while ($data = mysqli_fetch_array($query)) {
        ?>

				<?php } ?>
	<?php
	}else{
		echo "<h3>Your cart is empty!</h3>";
		}
?>

</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


</div>

<div>
	
</div>
</body>
</html>



