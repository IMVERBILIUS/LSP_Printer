<?php

session_start();
include('db.php');
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
        alert('anda bukan pembeli')
        window.location = '../login/index.php';
    </script>";
}
require '../function.php';
$transaksi = query("SELECT * FROM transaksi")



?>
<html>
<head>
<title>printerstore</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<link rel="stylesheet" href="css/105home.css">
<link rel="stylesheet" href="../style/1style.css">
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

		
		
    </div>
    </div>

    <ul class="links-container">
        <li class="link-item"><a href="index.php" class="link">home</a></li>
        <li class="link-item"><a href="detail.php" class="link">Detail Transaksi</a></li>
        <li class="link-item"><a href="#" class="link">printer2</a></li>
        <li class="link-item"><a href="#" class="link">printer3</a></li>
        <li class="link-item"><a href="#" class="link">printer4</a></li>
    </ul>
</nav>
    
        <div class="main">

            <table class="styled-table">
            <tr>
                    <th>No</th>
                    <th>Id transaksi</th>
                    <th>tanggal pembelian</th>
                    <th>id pelanggan</th>
                    <th>id barang</th>
                    <th>jumlah barang</th>
                    <th>Harga total</th>
                    <th>status</th>
                    
                    
                </tr>



                <?php $i = 1;?>
                <?php foreach($transaksi as $data) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['id_transaksi']; ?></td>
                    <td><?= $data['tgl_transaksi']; ?></td>
                    <td><?= $data['id_user']; ?></td>
                    <td><?= $data['id_barang']; ?></td> 
                    <td><?= $data['quantity']; ?></td> 
                    
                    <td><?= number_format($data['total_harga']); ?></td>
                    <td><?= $data['status']; ?></td>

                    <td>
                        <a href="edit.php?url=edit&id=<?= $data['id_transaksi']; ?>" class="edit" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="hapus.php?id=<?= $data['id_transaksi']; ?>"
                        class="hapus" onclick="return confirm('are you sure to do that?')"><i class="fa fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach;?>
            </table>
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