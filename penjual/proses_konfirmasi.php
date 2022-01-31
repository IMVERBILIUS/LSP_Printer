
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
$idtr=$_POST['id_transaksi'];
$stok=$_POST['stok'];
$id_barang=$_POST['id_barang'];
$quantity=$_POST['quantity'];


$sql=mysqli_query($conn, "UPDATE transaksi set status='selesai' where id_transaksi='$idtr'");
$sql=mysqli_query($conn, "UPDATE barang set stok=($stok-($quantity))where id='$id_barang' ");
//nanti bikin form aja biar gampang
// var_dump($_SESSION);

if($sql)
{
    header('location:verifikasi_penjualan.php');
}



?>


