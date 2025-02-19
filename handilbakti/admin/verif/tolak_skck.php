<?php
include "../inc/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_skck = $_POST['id_skck'];
    $alasan = $_POST['alasan'];

    $query = "UPDATE skck SET status_skck = 'Ditolak', alasan = ? WHERE id_skck = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('si', $alasan, $id_skck);

    if ($stmt->execute()) {
        header("Location: ../index.php?status=penolakan_sukses");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
