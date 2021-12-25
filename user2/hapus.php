<?php

    require 'function.php';

    $id_transaksi = $_GET['id'];


    if(hapustransaksi($id_transaksi) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('data prodak berhasil dihapus!')
            window.location = 'detail.php';
        </script>";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Mohon maaf, data anda gagal dihapus')
            window.location = 'detail.php';
        </script>";
    }

?>