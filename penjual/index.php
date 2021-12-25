<?php
session_start();

require '../koneksi.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Mohon maaf, anda belum login!')
            window.location = '../login/index.php';
        </script>";

        
}
if($_SESSION['role'] !="penjual"){
    echo "
    <script type='text/javascript'>
        alert('anda bukan admin')
        window.location = '../login/index.php';
    </script>";
}

?>




<?php

include '../layout/layoutpenjual.php';?>
        <div class="main">
            <h3>Selamat datang di halaman <?php echo $_SESSION ['role'];?></h3>
        </div>