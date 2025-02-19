<?php
include "../inc/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bp_menikah = $_POST['id_bp_menikah'];
    $alasan = $_POST['alasan'];

    $query = "UPDATE bp_menikah SET status_bp_menikah = 'Ditolak', alasan = ? WHERE id_bp_menikah = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('si', $alasan, $id_bp_menikah);

    if ($stmt->execute()) {
        header("Location: ../index.php?status=penolakan_sukses");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
