<?php
include "../inc/koneksi.php"; 

if (isset($_GET['id_skck'])) {
    $id_skck = $_GET['id_skck'];

    $query = "UPDATE skck SET status_skck = 'Acc' WHERE id_skck = '$id_skck'";
    if ($con->query($query)) { 
        header("Location: ../index.php?status=verifikasi_sukses");  
        exit();
    } else {
        echo "Error: " . $con->error;
    }
}
?>
