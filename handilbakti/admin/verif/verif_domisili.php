<?php
include "../inc/koneksi.php"; 

if (isset($_GET['id_domisili'])) {
    $id_domisili = $_GET['id_domisili'];

    $query = "UPDATE domisili SET status_domisili = 'Acc' WHERE id_domisili = '$id_domisili'";
    if ($con->query($query)) { 
        header("Location: ../index.php?status=verifikasi_sukses");  
        exit();
    } else {
        echo "Error: " . $con->error;
    }
}
?>
