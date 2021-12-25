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
$barang = query("SELECT * FROM barang")

?>


<?php

include '../layout/layoutpenjual.php';?>
        <div class="main1">
            <h3>Data Produk</h3>
            <a href="data_produk.php" class="tambah"><i class="fa fa-plus"></i></a>
            <table class="styled-table">
                <tr>
                    <th>id barang</th>
                    <th>Nama Produk</th>
                    <th>Jenis Barang</th>
                    <th>Harga</th>
                    <th>stok</th>
                    <th>foto_barang</th>
                    
                </tr>


                <?php $i = 1;?>
                <?php foreach($barang as $data) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['name1']; ?></td>
                    <td><?= $data['code']; ?></td>
                    
                    <td><?= number_format($data['price']); ?></td>
                    <td><?= $data['stok']; ?></td>
                    <td><img src="../foto/<?= $data['image']; ?>" width="88px"></td>
                    <td>
                        <a href="edit.php?url=edit&id=<?= $data['id']; ?>" class="edit" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="hapus.php?id=<?= $data['id']; ?>"
                        class="hapus" onclick="return confirm('are you sure to do that?')"><i class="fa fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach;?>
            </table>
        </div>