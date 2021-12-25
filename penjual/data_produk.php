<?php


require 'function.php';

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
        alert('anda bukan penjual')
        window.location = '../login/index.php';
    </script>";
}

if(isset($_POST["submit"])){
    if(tambahProduk($_POST) > 0){
        echo"<script type='text/javascript'>
        alert('data produk berhasil ditambahkan')
        window.location ='barang.php'
        </script>
        ";
    }else{
        echo"<script type='text/javascript'>
        alert('data produk gagal ditambahkan')
        window.location ='produk.php'
        </script>
        ";
    }
}




?>




<?php

include '../layout/layoutpenjual.php';?>
        <div class="main1">
            <h3>tambah data produk</h3>

            <div class="container-form1">


                <form action="" method="POST" enctype="multipart/form-data">
                    

                    <label>nama produk</label>
                    <input type="text" name="name1" class="form-produk"><br><br>


                    <label>jenis_barang</label>
                    <input type="text" name="code" class="form-produk"><br><br>

                    <label>Harga Satuan</label>
                    <input type="text" name="price" class="form-produk"><br> <br>

                    <label>Stock barang</label>
                    <input type="text" name="stok" class="form-produk"><br><br>
                    
                    <label>foto_barang</label>
                    <input type="file" name="image" class="form-produk"><br><br>

                    <button type="submit" name="submit" class="btn-produk">Tambah Produk</button>
                    
                </form>
            </div>
        </div>
