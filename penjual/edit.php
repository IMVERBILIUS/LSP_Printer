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
    if(updateData($_POST) ){
        echo"<script type='text/javascript'>
        alert('data produk berhasil ditambahkan')
        window.location ='barang.php'
        </script>
        ";
    }else{
        echo"<script type='text/javascript'>
        alert('data produk gagal ditambahkan')
        window.location ='barang.php'
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

            <?php
        include "../koneksi.php";
        
        $query = mysqli_query($conn, "SELECT * FROM barang WHERE id='$_GET[id]'");
        while ($data = mysqli_fetch_array($query)) {
            $_SESSION['price'] = $data['price'];
        ?>
                <form action="" method="POST" enctype="multipart/form-data">

                
                    <label>id barang</label>
                    <input type="text" name="id" value="<?php echo $data['id'] ?>" class="form-produk" readonly><br><br>


                    <label>nama produk</label>
                    <input type="text" name="name1" value="<?php echo $data['name1'] ?>" class="form-produk"><br><br>

                    <label>jenis_barang</label>
                    <input type="text" name="code" value="<?php echo $data['code'] ?>"class="form-produk"><br><br>

                    <label>Harga Satuan</label>
                    <input type="text" name="price" value="<?php echo $data['price'] ?>" class="form-produk"><br> <br>

                    <label>Stock barang</label>
                    <input type="text" name="stok" value="<?php echo $data['stok'] ?>" class="form-produk"><br><br>
                    
                    <label>Foto</label>
                    <input type="file" name="image" value="<?php echo $data['image'] ?>" class="form-produk"><br><br>

                    <button type="submit" name="submit" class="btn-produk">edit Produk</button>
                    
                </form>
                <?php } ?>
  
            </div>
        </div>
