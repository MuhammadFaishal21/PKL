<?php
$nama_dokumen = 'Laporan Pegawai';
define('_MPDF_PATH', 'mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
ob_start();
include "../../inc/koneksi.php";
include "../../inc/tanggal.php";
$jabatan = $_POST['jabatan'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title><?php echo $meta['instansi'] ?></title>
    <link rel="icon" type="image/png" href="../../assets/images/<?= $meta['logo'] ?>">
    <link rel="icon" href="../../assets/images/<?= $meta['logo'] ?>"> 
    <style>
        .horizontal_center
        {
            border-top: 2px solid black;
            height: 5px; 
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                <img src="../../assets/images/<?= $meta['logo'] ?>" width="12%" height="12%">
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">
                <p style="font-size: 20px; text-transform: uppercase; line-height: 100px;"><b>PEMERINTAH KABUPATEN BARITO KUALA</b></p>
                <p style="font-size: 18px; text-transform: uppercase; line-height: 100px;"><b>KECAMATAN ALALAK</b></p>
                <p style="font-size: 18px; text-transform: uppercase; line-height: 100px;"><b>KELURAHAN HANDIL BAKTI</b></p>
                <p style="font-size: 11px;">
                    Alamat : <?php echo $meta['alamat'] ?> <br>
                    Email : <?php echo $meta['email'] ?> | Telp : <?php echo $meta['telp'] ?>
                </p>
            </td>
        </tr>
    </table>

    <p class="horizontal_center"></p> 

    <p align="center"><b>Laporan Pegawai <br> <small>Berdasarkan Jabatan "<?= $jabatan ?>"</small></b></p>

    <table style="width: 100%; border-collapse: collapse; white-space: nowrap;">
        <tr>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold;" align="center">No.</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold;">NIP</td> 
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold;">Nama</td> 
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold;">Jabatan</td>  
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold;">Tempat, Tanggal Lahir</td> 
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold;" align="center">No Telepon</td> 
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold;">Email</td> 
        </tr>
        <?php 
            $nomor = 1; 
            $ambil = $con->query("SELECT * FROM pegawai NATURAL JOIN jabatan WHERE jabatan='$jabatan' ORDER BY id_pegawai ASC"); 
            while ($row = $ambil->fetch_assoc()) { $tgl = tgl_indo($row['tgl']); ?>
                <tr>
                    <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;" align="center"><?= $nomor; ?></td>
                    <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['nip']; ?></td> 
                    <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['nama']; ?></td> 
                    <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['jabatan']; ?></td>  
                    <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['tmp']; ?>, <?= $tgl; ?></td> 
                    <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;" align="center"><?= $row['nohp']; ?></td> 
                    <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['email']; ?></td>  
                </tr>
            <?php 
            $nomor++; 
        } ?> 
    </table> 

    <table align="right" style="margin-top: 20px;">
        <tr>
            <th style="font-size: 12px">Handil Bakti, <?php echo tgl_indo(date('Y-m-d')); ?></th>
        </tr>
        <tr>
            <th style="font-size: 12px">Mengetahui <br>Kepala Dinas</th>
        </tr>
        <tr>
            <th><img src="../../assets/images/QRCode.png" width="85" height="85" alt=""></th>
        </tr> 
        <tr>
            <th style="font-size: 14px; text-align: center;">
                            <u><?php echo $meta['pimpinan'] ?></u> <br> 
                            NIP/NRPD : 19700928 200701 1 022
                        </th>
        </tr>
    </table>
    <br />
</body>

<?php
$html = ob_get_contents();  
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>
