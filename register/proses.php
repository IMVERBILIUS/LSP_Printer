<?php

require '../koneksi.php';

function tambahUser($data){

    global $conn;
    
    $username = htmlspecialchars($data["username"]);
    $nama = htmlspecialchars($data["nama"]);
    $password = htmlspecialchars($data["password"]);
    $role = $data["role"];
    

    $query = "INSERT INTO user VALUES(NULL, '$username', '$nama', '$password', '$role')";
    mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}



?>