<?php
include "../inc/koneksi.php"; 

if (isset($_GET['id_tidak_mampu'])) {
    $id_tidak_mampu = $_GET['id_tidak_mampu'];

    $query = "UPDATE tidak_mampu SET status_tidak_mampu = 'Acc' WHERE id_tidak_mampu = '$id_tidak_mampu'";
    if ($con->query($query)) { 
        header("Location: ../index.php?status=verifikasi_sukses");  
        exit();
    } else {
        echo "Error: " . $con->error;
    }
}
?>
