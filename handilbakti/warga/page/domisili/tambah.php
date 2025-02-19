<?php 
$tahun = date("Y");
 
$id_jenis_surat = $_GET['id_jenis_surat'];
$sqlKodeSurat = "SELECT kode_surat FROM jenis_surat WHERE id_jenis_surat = $id_jenis_surat";
$resultKodeSurat = mysqli_query($con, $sqlKodeSurat);
$rowKodeSurat = mysqli_fetch_assoc($resultKodeSurat);

$kodeSurat = isset($rowKodeSurat['kode_surat']) ? $rowKodeSurat['kode_surat'] : '';
 
$sql = "SELECT MAX(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(no_domisili, '/', 2), '/', -1) AS UNSIGNED)) AS last_number 
        FROM domisili 
        WHERE no_domisili LIKE '$kodeSurat / % / KESRA-HB / $tahun'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
 
$nextNumber = isset($row['last_number']) ? str_pad($row['last_number'] + 1, 2, '0', STR_PAD_LEFT) : '01';
 
$jenisSurat = 'KESRA-HB';   
$noSurat = "$kodeSurat / $nextNumber / $jenisSurat / $tahun";

?>




<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Surat Keterangan Domisili</h4>
    </div>
    <div class="text-end">
    	<button class="btn btn-sm btn-primary"><span id="date-time"></span></button>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
        	<div class="card-header border-bottom border-dashed">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Tambah Data Surat Keterangan Domisili</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                    <input type="text" class="form-control" hidden name="id_jenis_surat" value="<?= $id_jenis_surat ?>" readonly required>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_domisili" value="<?= $noSurat ?>" readonly required>
                        </div>
                    </div>  
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Warga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" hidden name="id_warga" value="<?= $_SESSION['warga']['id_warga']  ?>" required>
                            <input type="text" class="form-control" value="<?= $_SESSION['warga']['nama_warga']  ?>" readonly required> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" hidden name="tgl_pengajuan" value="<?= date('Y-m-d') ?>" required>
                            <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" data-provider="flatpickr" data-date-format="d M, Y" disabled required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <textarea name="keperluan" class="form-control" rows="6" id=""></textarea> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Pengantar RT/RW</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="pengantar_rt" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Fotocopy KTP Pemohon</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="fc_ktp" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Fotocopy KK Pemohon</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="fc_kk" required>
                        </div>
                    </div>   
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" name="tambah" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="?page=domisili" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php
                    if (isset($_POST['tambah'])) { 
                        $id_jenis_surat = $_POST['id_jenis_surat'];
                        $no_domisili = $_POST['no_domisili'];
                        $id_warga = $_POST['id_warga'];
                        $tgl_pengajuan = $_POST['tgl_pengajuan'];
                        $keperluan = $_POST['keperluan'];
                        $status_domisili = $_POST['status_domisili'];
 
                        $uploadDir = "../admin/assets/berkas/domisili/";
 
                        $pengantarRt = $_FILES['pengantar_rt']['name'];
                        $pengantarRtTmp = $_FILES['pengantar_rt']['tmp_name'];
                        $pengantarRtPath = $uploadDir . basename($pengantarRt);
 
                        $fcKtp = $_FILES['fc_ktp']['name'];
                        $fcKtpTmp = $_FILES['fc_ktp']['tmp_name'];
                        $fcKtpPath = $uploadDir . basename($fcKtp);
 
                        $fcKk = $_FILES['fc_kk']['name'];
                        $fcKkTmp = $_FILES['fc_kk']['tmp_name'];
                        $fcKkPath = $uploadDir . basename($fcKk);
 
                        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                        $maxFileSize = 2 * 1024 * 1024;  

                        if ($_FILES['pengantar_rt']['size'] > $maxFileSize || 
                            $_FILES['fc_ktp']['size'] > $maxFileSize || 
                            $_FILES['fc_kk']['size'] > $maxFileSize) {
                            echo "File terlalu besar. Maksimal 2 MB.";
                            exit;
                        }

                        if (!in_array($_FILES['pengantar_rt']['type'], $allowedTypes) || 
                            !in_array($_FILES['fc_ktp']['type'], $allowedTypes) || 
                            !in_array($_FILES['fc_kk']['type'], $allowedTypes)) {
                            echo "Format file tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.";
                            exit;
                        }
 
                        if (move_uploaded_file($pengantarRtTmp, $pengantarRtPath) &&
                            move_uploaded_file($fcKtpTmp, $fcKtpPath) &&
                            move_uploaded_file($fcKkTmp, $fcKkPath)) {
 
                            $query = "INSERT INTO domisili (id_jenis_surat, no_domisili, id_warga, tgl_pengajuan, keperluan, pengantar_rt, fc_ktp, fc_kk, status_domisili) 
                                      VALUES ('$id_jenis_surat', '$no_domisili', '$id_warga', '$tgl_pengajuan', '$keperluan', '$pengantarRt', '$fcKtp', '$fcKk', 'Pending')";
 
                        if ($con->query($query) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil disimpan.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=domisili';
                                        }
                                    });
                                  </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat menyimpan data.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                            }
                        }
                    }
                ?>        
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->   