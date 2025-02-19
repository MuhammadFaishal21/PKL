<?php
include "../inc/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_domisili = $_POST['id_domisili'];
    $alasan = $_POST['alasan'];

    $query = "UPDATE domisili SET status_domisili = 'Ditolak', alasan = ? WHERE id_domisili = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('si', $alasan, $id_domisili);

    if ($stmt->execute()) {
        header("Location: ../index.php?status=penolakan_sukses");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
