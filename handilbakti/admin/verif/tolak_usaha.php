<?php
include "../inc/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usaha = $_POST['id_usaha'];
    $alasan = $_POST['alasan'];

    $query = "UPDATE usaha SET status_usaha = 'Ditolak', alasan = ? WHERE id_usaha = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('si', $alasan, $id_usaha);

    if ($stmt->execute()) {
        header("Location: ../index.php?status=penolakan_sukses");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
