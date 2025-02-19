<?php
session_start();
include "../admin/inc/koneksi.php";
 
$id_warga = $_SESSION['warga']['id_warga'];  
 
$data = [];
 
$queries = [
    'Domisili' => "SELECT COUNT(*) AS total FROM domisili WHERE status_domisili='Acc' AND id_warga = ?",
    'Belum Pernah Menikah' => "SELECT COUNT(*) AS total FROM bp_menikah WHERE status_bp_menikah='Acc' AND id_warga = ?",
    'Tidak Mampu' => "SELECT COUNT(*) AS total FROM tidak_mampu WHERE status_tidak_mampu='Acc' AND id_warga = ?",
    'Usaha' => "SELECT COUNT(*) AS total FROM usaha WHERE status_usaha='Acc' AND id_warga = ?",
    'SKCK' => "SELECT COUNT(*) AS total FROM skck WHERE status_skck='Acc' AND id_warga = ?"
];
 
foreach ($queries as $jenis => $query) {
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id_warga);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $data[] = ['name' => $jenis, 'y' => (int)$result['total']];
}
 
header('Content-Type: application/json');
echo json_encode($data);
?>
