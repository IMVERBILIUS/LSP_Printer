<?php

session_start();
include('db.php');

if(isset($_POST["submit"])){
    
        echo"<script type='text/javascript'>
        alert('data produk berhasil ditambahkan')
        window.location ='../login/login.php'
        </script>
        ";
    
}
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `barang` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name1 = $row['name1'];
$id=$row['id'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name1'=>$name1,
	'id'=>$id,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<title>printerstore</title>
<link rel='stylesheet' href='css/34style1.css' type='text/css' media='all' />
<link rel="stylesheet" href="css/105home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<nav class="navbar">
<div class="nav">
    <img src="../foto/logo2.png" class="brand-logo" alt="">
    <div class="nav-items">
        <div class="search">
            <input type="text" class="search-box" placeholder="search brand, product">
            <button class="search-btn">search</button>
        </div>
        <a href="../login/index.php"><i class="fa fa-user"></i></a>
        

		
    </div>
</div>

<ul class="links-container">
    <li class="link-item"><a href="#" class="link">home</a></li>
    <li class="link-item"><a href="detail.php" class="link">Detail Transaksi</a></li>
    <li class="link-item"><a href="#" class="link">printer2</a></li>
    <li class="link-item"><a href="#" class="link">printer3</a></li>
    <li class="link-item"><a href="#" class="link">printer4</a></li>
</ul>
</nav>
<header class="hero-section">
    <div class="content">
        <img src="../foto/logo_gemoy.png" class="logo" alt="">
        <p class="sub-heading">Gak usah banyak cincong langsung beli</p>
    </div>
	</header>
    
    <div style="width:1150px; margin:50 auto; ">

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="../login/index.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
$result = mysqli_query($con,"SELECT * FROM `barang`");
while($row = mysqli_fetch_assoc($result)){
		echo "
        <div class='product_wrapper'>
        <div class='product-card'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class=''><img class='foto1' src='../foto/".$row['image']."' /></div>
			  <div class='product-brand'>".$row['name1']."</div>
		   	  <div class='price'>Rp".$row['price']."</div>
                <div class='product-short-des'>stok tersedia :".$row['stok']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
              
			  </form>
              </div>
              
		   	  </div>";
        }
		
mysqli_close($con);
?>



<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</div>
<footer>
<div class="footer-content">
    <img src="../foto/logo_gemoy.png" class="logo" alt="">
    <div class="footer-ul-container">
        <ul class="category">
            <li class="category-title">Murah</li>
            <li><a href="#" class="footer-link">Asus</a></li>
			<li><a href="#" class="footer-link">Asus</a></li>
			<li><a href="#" class="footer-link">Asus</a></li>
			<li><a href="#" class="footer-link">Asus</a></li>
			<li><a href="#" class="footer-link">Asus</a></li>

        </ul>
        <ul class="category">
            <li class="category-title">Mahal</li>
            <li><a href="#" class="footer-link">t-canon</a></li>
			<li><a href="#" class="footer-link">t-canon</a></li>
			<li><a href="#" class="footer-link">t-canon</a></li>
			<li><a href="#" class="footer-link">t-canon</a></li>
			<li><a href="#" class="footer-link">t-canon</a></li>

        </ul>
    </div>
    
</div>
    <p class="footer-title">tentang kami</p>
    <p class="info">kami adalah perusahaan dengan menggunakan 100% guna guna jika anda berminat membeli disini berarti sudah dipastikan anda terkena guna guna dan produk kami 100% barang curian jadi tidak ada garansi karena kami sudah bersusah payah untuk mengambil printer ini dengan jerih payah keringat kami sendiri kami mengambil printer tersebut di foto kopi atau warnet terdekat</p>
    <p class="info">support emails - printer@100%halal.com, halal@printer.com</p>
    <p class="info">telephone - 085779449778</p>
<div class="footer-social-container">
    <div>
        <a href="#" class="social-link">terms & services</a>
        <a href="#" class="social-link">privacy page</a>
    </div>
    <div>
        <a href="#" class="social-link">instagram</a>
        <a href="#" class="social-link">facebook</a>
        <a href="#" class="social-link">twitter</a>
    </div>
</div>
    <p class="footer-credit">anda senang kami pun senang</p>

        
</footer>
</body>
</html>