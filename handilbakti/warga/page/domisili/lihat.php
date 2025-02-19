<?php 
$id_domisili = $_GET['id_domisili'];
 
$query = "SELECT * FROM domisili NATURAL JOIN warga WHERE id_domisili = $id_domisili";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
$hari = getHari($data['tgl_pengajuan']); 
$tgl = tgl_indo($data['tgl_pengajuan']);

$pengantar_rt = "../admin/assets/berkas/domisili/" . $data['pengantar_rt'];
$fc_ktp = "../admin/assets/berkas/domisili/" . $data['fc_ktp'];
$fc_kk = "../admin/assets/berkas/domisili/" . $data['fc_kk']; 
 
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Lihat Surat Keterangan Domisili</h4>
    </div>
</div>

<div class="row">
    <div class="col-xl-2"></div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Lihat Surat Keterangan Domisili</h4> 
            </div>

            <div class="card-body"> 
                <div class="row">
                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <i class="ti ti-mail fs-18 me-1"></i> Surat & Berkas
                            </a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <i class="ti ti-user-circle fs-18 me-1"></i> Pemohon / Warga
                            </a> 
                        </div>
                    </div> <!-- end col-->

                    <div class="col-sm-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <table>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $data['no_domisili'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Surat</th>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td>Surat Keterangan Domisili</td>
                                    </tr>
                                    <tr>
                                        <th>Pengajuan</th>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $hari ?>, <?= $tgl ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keperluan</th>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $data['keperluan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Berkas</th>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td> 
                                            <a href="<?= $pengantar_rt ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $data['no_domisili']; ?><br>Berkas Pengantar RT">Lihat Berkas</a>
                                            <a href="<?= $fc_ktp ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $data['no_domisili']; ?><br>Berkas Fotocopy KTP" class="d-none"></a>
                                            <a href="<?= $fc_kk ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $data['no_domisili']; ?><br>Berkas Fotocopy KK" class="d-none"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $data['status_domisili'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <table>
                                    <td>NIK</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $data[nik_warga] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $data[nama_warga] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $data[jk_warga] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $data[tmp_warga] ?>, <?= $tgl ?></td>
                                    </tr>
                                    <tr>
                                        <td>Umur</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td>
                                            <?php 
                                                $tgl_lahir = $data['tgl_warga'];  
             
                                                $tanggal_lahir = new DateTime($tgl_lahir);
                                                $hari_ini = new DateTime();
                                                $umur = $hari_ini->diff($tanggal_lahir)->y;

                                                echo "" . $umur . " tahun";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><?= $data[alamat_warga] ?>, RT <?= $data[rt_warga] ?> RW <?= $data[rw_warga] ?></td>
                                    </tr>
                                </table>
                            </div> 
                        </div> <!-- end tab-content-->
                        <a href="?page=domisili" class="btn btn-danger btn-sm">Kembali</a> 
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
    <div class="col-xl-2"></div>
</div>
