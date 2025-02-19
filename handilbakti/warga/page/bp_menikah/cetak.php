<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../../admin/inc/koneksi.php";
include "../../../admin/inc/tanggal.php";  
?> 

<?php 
$id_bp_menikah = $_GET['id_bp_menikah'];
$ambil  = $con->query("SELECT * FROM bp_menikah NATURAL JOIN warga WHERE id_bp_menikah ='$_GET[id_bp_menikah]'");
$pecah  = $ambil->fetch_assoc();    
$tgl3 = tgl_indo($pecah['tgl_warga']);
$tgl4 = tgl_indo($pecah['tgl_pengajuan']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>SURAT KETERANGAN BELUM PERNAH MENIKAH</title>
    <link rel="shortcut icon" href="../../../admin/assets/images/<?php echo $meta['logo'] ?>">
</head>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #ffff;
        font: 12pt "Tahoma";
    }
    * 
    {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 1px;
        background: white; 
    }
    .subpage {
        padding: 1cm; 
        height: 257mm;
        outline: 2cm #FFF solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>

<style>
    .horizontal_center
    {
        border-top: 3px solid black;
        height: 2px; 
    }
</style>

<style>
    .horizontal_center_tipis
    {
        border-top: 1px solid black;
        height: 2px; 
    }
</style>

<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <table width="100%">  
                    <tr>
                        <td style="vertical-align: middle; text-align: center;">
                            <a href="#">
                                <img src="../../../admin/assets/images/<?php echo $meta['logo'] ?>" height="90px">
                            </a>
                        </td>
                        <td style="text-align: center;">
                            <strong style="font-size: 18px;">PEMERINTAH KABUPATEN BARITO KUALA</strong> <br> 
                            <strong style="font-size: 18px;">KECAMATAN ALALAK</strong> <br> 
                            <strong style="font-size: 20px; text-transform: uppercase;"><?php echo $meta['instansi'] ?></strong> <br> 
                            <small  style="font-size: 11.5px;"><?php echo $meta['alamat'] ?></small> <br>
                            <small  style="font-size: 11.5px;">Telepon : <?php echo $meta['telp'] ?> / Email : <?php echo $meta['email'] ?></small>
                        </td>
                    </tr>  
                </table>

                <div class="horizontal_center"></div> 

                <table align="center">
                    <tr><th style="font-size: 15px; text-align: center;">&nbsp;</th></tr>
                    <tr>
                        <th style="font-size: 15px; text-align: center;">SURAT KETERANGAN BELUM PERNAH MENIKAH<div class="horizontal_center_tipis"></div> </th>
                    </tr>
                    <tr>
                        <th style="font-size: 13px; text-align: center;">NOMOR : <?php echo $pecah['no_bp_menikah'] ?></th>
                    </tr>
                </table>

                <br>

                <table>
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">
                            Yang bertanda tangan dibawah ini, Lurah Handil Bakti, Kecamatan Alalak, Kabupaten Barito Kuala dengan ini menerangkan dengan sebenarnya bahwa :
                        </td>
                    </tr>
                </table>

                <br>

                <table>  
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK</td>
                        <td style="font-size: 12px; text-align: justify;">:</td>
                        <td style="font-size: 12px; text-align: justify;"><?php echo $pecah['nik_warga'] ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
                        <td style="font-size: 12px; text-align: justify;">:</td>
                        <td style="font-size: 12px; text-align: justify;"><?php echo $pecah['nama_warga'] ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin</td>
                        <td style="font-size: 12px; text-align: justify;">:</td>
                        <td style="font-size: 12px; text-align: justify;"><?php echo $pecah['jk_warga'] ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat / Tanggal Lahir</td>
                        <td style="font-size: 12px; text-align: justify;">:</td>
                        <td style="font-size: 12px; text-align: justify;"><?php echo $pecah['tmp_warga'] ?> / <?php echo $tgl3 ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Umur</td>
                        <td style="font-size: 12px; text-align: justify;">:</td>
                        <td style="font-size: 12px; text-align: justify;">
                            <?php 
                            $tgl_lahir = $pecah['tgl_warga'];  

                            $tanggal_lahir = new DateTime($tgl_lahir);
                            $hari_ini = new DateTime();
                            $umur = $hari_ini->diff($tanggal_lahir)->y;

                            echo "" . $umur . " tahun";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan</td>
                        <td style="font-size: 12px; text-align: justify;">:</td>
                        <td style="font-size: 12px; text-align: justify;">
                            <?php  
                            $sql_barang = mysqli_query($con, "SELECT * FROM warga NATURAL JOIN pekerjaan WHERE id_warga = '$pecah[id_warga]'");
                            while ($data_barang = mysqli_fetch_array($sql_barang)){
                            echo $data_barang['pekerjaan']."";
                            } 
                            ?>
                        </td>
                    </tr> 
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status Pernikahan</td>
                        <td style="font-size: 12px; text-align: justify;">:</td>
                        <td style="font-size: 12px; text-align: justify;"><?php echo $pecah['status_nikah'] ?></td>
                    </tr> 
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
                        <td style="font-size: 12px; text-align: justify;">:</td>
                        <td style="font-size: 12px; text-align: justify;"><?php echo $pecah['alamat_warga'] ?> RT <?php echo $pecah['rt_warga'] ?> RW <?php echo $pecah['rw_warga'] ?></td>
                    </tr> 
                </table>

                <br>

                <table>
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">
                            Benar nama tersebut di atas adalah penduduk Kelurahan Handil Bakti, Kecamatan Alalak, Kabupaten
                            Barito Kuala, dan sepanjang pengetahuan kami, serta catatan yang ada pada kami bahwa yang
                            bersangkutan belum pernah menikah. Demekian surat ini dibuat dengan keperluan <?php echo $pecah['keperluan'] ?>.
                        </td>
                    </tr>
                </table>  

                <br>

                <table>
                    <tr>
                        <td style="font-size: 12px; text-align: justify;">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</td>
                    </tr>
                </table>

                <br><br>

                <table align="right">
                    <tr>
                        <td style="font-size: 14px; text-align: center;">
                            Handil Bakti, <?php echo tgl_indo(date('Y-m-d')); ?> <br> Mengetahui <br> Lurah 
                        </td>
                    </tr>  
                    <tr>
                        <td align="center">
                            <img src="../../../admin/assets/images/QRCode.png" width="85" height="85" alt="">
                        </td>
                    </tr>   
                    <tr>
                        <th style="font-size: 14px; text-align: center;">
                            <u><?php echo $meta['pimpinan'] ?></u> <br> 
                            NIP/NRPD : 19700928 200701 1 022
                        </th>
                    </tr>
                </table>
            </div>    
        </div>
     
        <!-- <div class="page">
            <div class="subpage">Page 2/2</div>    
        </div>  -->

    </div>
</body>

</html>
<script type="text/javascript">window.print();</script>