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
        alert('anda bukan penjual')
        window.location = '../login/index.php';
    </script>";
}

if(isset($_POST["submit"])){
    if(($_POST) ){
        echo"<script type='text/javascript'>
        alert('data produk berhasil ditambahkan')
        window.location ='detail.php'
        </script>
        ";
    }else{
        echo"<script type='text/javascript'>
        alert('data produk gagal ditambahkan')
        window.location ='detail.php'
        </script>
        ";
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/13home.css">
    <link rel="stylesheet" href="../style/1style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<div class="main1">
<?php
        include "../koneksi.php";
        $grandTotal = 0;
        
        $query = mysqli_query($conn, "SELECT * FROM barang ");
        while ($data = mysqli_fetch_array($query)) {
              $_SESSION['price'] = $data['price'];

        ?>
        <?php } ?>
    
            <h3>tambah data produk</h3>
            
            <br>
            

            <div class="container-form1">
        
            <br>

            <?php
        include "../koneksi.php";
        $grandTotal = 0;
        
        $query = mysqli_query($conn, "SELECT * FROM transaksi   WHERE id_transaksi ='$_GET[id]'");
        while ($data = mysqli_fetch_array($query)) {

        ?>
            <a href="pembatalan.php" class="edit"><i class="fa fa-chevron-left"></i></a>
            <a href="proses_pembatalan.php?id=<?= $data['id_transaksi']; ?>" class="hapus" class="btn btn-danger btn-icon-split" >
            
            <span class="icon text-white-50">
                <i class="fa fa-trash-alt"></i>
            </span>
            <span class="text">batalkan</span>
        </a>
        
                <form action="" method="POST" enctype="multipart/form-data">
                    

                    <label>id_transaksi</label>
                    <input type="text" name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>" class="form-produk" readonly><br><br>
                    <label>tgl_transaksi</label>
                    <input type="text" name="tgl_transaksi" value="<?php echo $data['tgl_transaksi'] ?>" class="form-produk" readonly><br><br>

                    <label>id_user</label>
                    <input type="text" name="id_user" value="<?php echo $data['id_user'] ?>"class="form-produk" readonly><br><br>
                    <label>id_barang</label>
                    <input type="text" name="id_barang" value="<?php echo $data['id_barang'] ?>"class="form-produk" readonly><br><br>
                    <label>quantity</label>
                    <input type="number" name="quantity" id="txt1" value="<?php echo $data['quantity'] ?>" class="form-produk" onkeyup="sum();" readonly ><br><br>
                    <label>harga satuan</label>
                    <input type="text" name="price" id="txt2" value="<?php echo $_SESSION['price'] ?>" class="form-produk" onkeyup="sum();" readonly><br><br>
                    <?php
                        $total = $data['quantity'] * $_SESSION['price'] ;

                        $grandTotal += $total;
                        if (!is_nan($total)) { 

                          }
                        ?>
                        
                    

                    <label>total_harga</label>
                    <input type="text" name="total_harga" id="txt3" value="<?php echo $data['quantity'] *  $_SESSION['price'] ;?>"  class="form-produk" readonly><br><br>
                    <label>status</label>
                    <input type="text" name="price" value="<?php echo $data['status'] ?>" class="form-produk" onkeyup="sum();" readonly><br><br>

                  
                    
                </form>

                <?php } ?>
  
            </div>
        </div>
        <script src="edit.js"></script>
</body>
</html>
