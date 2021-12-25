<?php

session_start();

unset($_SESSION["username"]);
session_destroy();
echo "
<script type='text/javascript'>
    alert('anda berhasil logout')
    window.location = 'login/index.php';
</script>";


?>