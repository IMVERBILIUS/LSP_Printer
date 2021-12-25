
<?php
session_start();

require '../koneksi.php';

function query($query){

    global $conn;
    $result =mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
return $rows;   
}



function tambahProduk($data){

    global $conn;
        $id =$data['id'];
        $name1 =htmlspecialchars( $data["name1"]);
        $code =htmlspecialchars($data["code"]);
        $price =htmlspecialchars( $data["price"]);
        $stok =htmlspecialchars($data["stok"]);
        $image =$_FILES["image"]["name"];
        $files =$_FILES["image"]["tmp_name"];
        
        

    $query ="INSERT INTO barang VALUES('$id', '$name1' ,'$code', '$price' , '$stok' , '$image'  )";
    move_uploaded_file($files, "../foto/" .$image);
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    

    
}

function transaksiData($data){
    global $conn;
    $tgl_transaksi =$data['tgl_transaksi'];
    $id_user =htmlspecialchars( $data["id_user"]);
    $id_barang =htmlspecialchars($data["id_barang"]);
    $quantity =htmlspecialchars( $data["quantity"]);
    $total_harga =htmlspecialchars($data["total_harga"]);
    $status ='proses';


$query ="INSERT INTO transaksi VALUES(NULL,'$tgl_transaksi', '$id_user' ,'$id_barang', '$quantity' , '$total_harga','$status' )";


mysqli_query($conn, $query);
return mysqli_affected_rows($conn);



}


function updateData($data){

    global $conn;
        $name1=$_POST['name1'];
        $code=$_POST['code'];
        $price=$_POST['price'];
        $stok=$_POST['stok'];
        $id=$_POST['id'];
        $image =$_FILES["image"]["name"];
        $files =$_FILES["image"]["tmp_name"];

$query = mysqli_query($conn,"UPDATE barang SET name1='$name1',code='$code', 
                            price='$price', stok='$stok', image='$image' WHERE id='$id'");
move_uploaded_file($files, "../foto/" .$image);

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


    
}



function hapusProduk($id){
    
    global $conn;

    mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
    return mysqli_affected_rows($conn);

}


?>