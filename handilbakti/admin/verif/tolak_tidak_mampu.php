<?php
include "../inc/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tidak_mampu = $_POST['id_tidak_mampu'];
    $alasan = $_POST['alasan'];

    $query = "UPDATE tidak_mampu SET status_tidak_mampu = 'Ditolak', alasan = ? WHERE id_tidak_mampu = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('si', $alasan, $id_tidak_mampu);

    if ($stmt->execute()) {
        header("Location: ../index.php?status=penolakan_sukses");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
