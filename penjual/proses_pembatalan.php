<?php
require '../koneksi.php';
$sql=mysqli_query($conn, "UPDATE transaksi set status='dibatalkan' where id_transaksi='$_GET[id]'");
if($sql)
{
    header('location:verifikasi_penjualan.php');
}



?>