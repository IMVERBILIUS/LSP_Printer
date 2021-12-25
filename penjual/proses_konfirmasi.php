
<?php
        include "../koneksi.php";
        
        $query = mysqli_query($conn, "SELECT * FROM transaksi ");
        while ($data = mysqli_fetch_array($query)) {
              $_SESSION['quantity'] = $data['quantity'];
              $_SESSION['id_barang'] = $data['id_barang'];
              $_SESSION['id_transaksi'] = $data['id_transaksi'];

        ?>
        <?php } ?>

        <?php
        include "../koneksi.php";
        
        $query = mysqli_query($conn, "SELECT * FROM barang ");
        while ($data = mysqli_fetch_array($query)) {
              $_SESSION['id'] = $data['id'];

        ?>
        <?php } ?>

<?php
require '../koneksi.php';
global $conn;


$sql=mysqli_query($conn, "UPDATE transaksi set status='selesai' where id_transaksi='$_GET[id]'");
$sql=mysqli_query($conn, "UPDATE barang set stok=(stok-($_SESSION[quantity])) ");
//ganti id nya
var_dump($_SESSION);

// if($sql)
// {
//     header('location:verifikasi_penjualan.php');
// }



?>