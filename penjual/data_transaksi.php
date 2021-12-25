
<?php
session_start();


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

require '../function.php';
$transaksi = query("SELECT * FROM transaksi")


?>


<?php

include '../layout/layoutpenjual.php';?>

<div class="main">
    <h3>Data transaksi</h3>

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


    </tr>
    <?php $i++; ?>
    <?php endforeach;?>
</table>
</div>