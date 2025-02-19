<?php
include "../inc/koneksi.php"; 

if (isset($_GET['id_usaha'])) {
    $id_usaha = $_GET['id_usaha'];

    $query = "UPDATE usaha SET status_usaha = 'Acc' WHERE id_usaha = '$id_usaha'";
    if ($con->query($query)) { 
        header("Location: ../index.php?status=verifikasi_sukses");  
        exit();
    } else {
        echo "Error: " . $con->error;
    }
}
?>
