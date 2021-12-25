<?php

require 'proses.php';

if(isset($_POST["register"])){
    
    if(tambahUser($_POST) >0){
        echo "
        <script type='text/javascript'>
        alert('Register berhasil, Selamat berbelanja')
        window.location = '../login/index.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
        alert('Mohon maaf, Pendaftaran gagal')
        window.location = 'index.php';
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
    <link rel="stylesheet" href="3style.css">
</head>
<body>
<div class="container-box">
       

<form action="" method="POST">
<h3>Register</h3>
        <label>Username</label>
        <input type="text" name="username" class="form-control"><br /> <br/>

        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control"><br /> <br/>

        <label>Password</label>
        <input type="password" name="password" class="form-control"><br /> <br/>

        <label>Roles</label>
        <select name="role" class="form-control" style="background-color: black;">
            <option value="#">===========</option>
            <option value="user">user</option>
            <option value="penjual">penjual</option>
        </select><br /> <br/>

        <button type="submit" name="register">Register</button>

    </form>

    </div>
</body>
</html>