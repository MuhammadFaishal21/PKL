<?php
include "inc/koneksi.php"; 
 
$query_jk = "SELECT jk_warga, COUNT(*) AS total FROM warga GROUP BY jk_warga";
$result_jk = $con->query($query_jk);

$data_jk = [
    'Laki-laki' => 0,
    'Perempuan' => 0
];

while ($row = $result_jk->fetch_assoc()) {
    if ($row['jk_warga'] == 'Laki-laki') {
        $data_jk['Laki-laki'] = (int)$row['total'];
    } else {
        $data_jk['Perempuan'] = (int)$row['total'];
    }
}
 
$query_umur = "SELECT tgl_warga FROM warga";
$result_umur = $con->query($query_umur);

$umur_categories = [
    'Anak-Anak (0-5 Tahun)' => 0,
    'Remaja (5-13 Tahun)' => 0,
    'Dewasa (14-40 Tahun)' => 0,
    'Lansia (>40 Tahun)' => 0
];

while ($row = $result_umur->fetch_assoc()) {
    $tgl_lahir = $row['tgl_warga'];
    $umur = date_diff(date_create($tgl_lahir), date_create('now'))->y;

    if ($umur <= 5) {
        $umur_categories['Anak-Anak (0-5 Tahun)']++;
    } elseif ($umur <= 13) {
        $umur_categories['Remaja (5-13 Tahun)']++;
    } elseif ($umur <= 40) {
        $umur_categories['Dewasa (14-40 Tahun)']++;
    } else {
        $umur_categories['Lansia (>40 Tahun)']++;
    }
}
 
$data_umur = [];
foreach ($umur_categories as $kategori => $total) {
    $data_umur[] = ['name' => $kategori, 'y' => $total];
}
 
$data_jk_graph = [];
foreach ($data_jk as $kategori => $total) {
    $data_jk_graph[] = ['name' => $kategori, 'y' => $total];
}
 
$response = [
    'jenis_kelamin' => $data_jk_graph,
    'umur' => $data_umur
];

header('Content-Type: application/json');
echo json_encode($response);
?>
