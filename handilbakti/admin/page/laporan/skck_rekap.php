<?php
$nama_dokumen = 'Laporan Rekap Surat Pengantar SKCK';
define('_MPDF_PATH', 'mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('utf-8', 'A4-L');
ob_start();
include "../../inc/koneksi.php";
include "../../inc/tanggal.php";
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
            <td align="center">
                <img src="../../assets/images/<?= $meta['logo'] ?>" width="11%" height="11%">
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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

    <p align="center"><b>Laporan Rekap Surat Pengantar SKCK</b></p>

    <table style="width: 100%; border-collapse: collapse; white-space: nowrap;">
        <tr>
            <td width="3%" rowspan="2" style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;" align="center">No.</td>
            <td rowspan="2" style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">No Surat</td> 
            <td colspan="3"  style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; text-align: center;">Pemohon / Warga</td> 
            <td rowspan="2" style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">Hari, Tanggal Pengajuan</td>
            <td rowspan="2" style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">Keperluaan</td> 
            <td rowspan="2" style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;" align="center">Status</td> 
        </tr>
        <tr>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; text-align: center;">NIK</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; text-align: center;">Nama</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; text-align: center;">Nomor Telepon</td>
        </tr> 
        <?php $nomor=1; ?>
        <?php $ambil=$con->query("SELECT * FROM skck NATURAL JOIN warga ORDER BY id_skck ASC"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { 
            $hari = getHari($pecah['tgl_pengajuan']); 
            $tgl = tgl_indo($pecah['tgl_pengajuan']); 
        ?>
        <tr>      
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;" align="center"><?php echo $nomor; ?></td>  
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?php echo $pecah['no_skck']; ?></td>     
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;" align="center"><?php echo $pecah['nik_warga']; ?></td>     
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;" align="center"><?php echo $pecah['nama_warga']; ?></td>     
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;" align="center"><?php echo $pecah['nohp_warga']; ?></td>     
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?php echo $hari; ?>, <?php echo $tgl; ?></td>     
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?php echo $pecah['keperluan']; ?></td>       
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;" align="center"><?php echo $pecah['status_skck']; ?></td>   
        </tr> 
        <?php $nomor++; ?>
        <?php } ?> 
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
