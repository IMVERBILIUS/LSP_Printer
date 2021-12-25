<?php


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
function updateUser($data){

    global $conn;
    $tgl_transaksi =$data['tgl_transaksi'];
    $id_user =htmlspecialchars( $data["id_user"]);
    $id_barang =htmlspecialchars($data["id_barang"]);
    $quantity =htmlspecialchars( $data["quantity"]);
    $total_harga =htmlspecialchars($data["total_harga"]);
    $id=$_POST['id_transaksi'];
    $status =htmlspecialchars($data["status"]);
    


$query = mysqli_query($conn,"UPDATE transaksi SET tgl_transaksi='$tgl_transaksi',id_user='$id_user', 
                            id_barang='$id_barang', quantity='$quantity', total_harga='$total_harga' , status='$status'  WHERE id_transaksi='$id'");
                            

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


    
}

function hapustransaksi($id_transaksi){
    
    global $conn;

    mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = $id_transaksi");
    return mysqli_affected_rows($conn);

}


?>


