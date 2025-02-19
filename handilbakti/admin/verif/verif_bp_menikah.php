<?php
include "../inc/koneksi.php"; 

if (isset($_GET['id_bp_menikah'])) {
    $id_bp_menikah = $_GET['id_bp_menikah'];

    $query = "UPDATE bp_menikah SET status_bp_menikah = 'Acc' WHERE id_bp_menikah = '$id_bp_menikah'";
    if ($con->query($query)) { 
        header("Location: ../index.php?status=verifikasi_sukses");  
        exit();
    } else {
        echo "Error: " . $con->error;
    }
}
?>
