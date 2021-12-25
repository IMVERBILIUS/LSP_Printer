<?php

    require 'function.php';

    $id = $_GET['id'];


    if(hapusProduk($id) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('data prodak berhasil dihapus!')
            window.location = 'barang.php';
        </script>";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Mohon maaf, data anda gagal dihapus')
            window.location = 'barang.php';
        </script>";
    }

?>