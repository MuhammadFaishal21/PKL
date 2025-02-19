<?php 
$tahun = date("Y");
 
$id_jenis_surat = $_GET['id_jenis_surat'];
$sqlKodeSurat = "SELECT kode_surat FROM jenis_surat WHERE id_jenis_surat = $id_jenis_surat";
$resultKodeSurat = mysqli_query($con, $sqlKodeSurat);
$rowKodeSurat = mysqli_fetch_assoc($resultKodeSurat);

$kodeSurat = isset($rowKodeSurat['kode_surat']) ? $rowKodeSurat['kode_surat'] : '';
 
$sql = "SELECT MAX(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(no_bp_menikah, '/', 2), '/', -1) AS UNSIGNED)) AS last_number 
        FROM bp_menikah 
        WHERE no_bp_menikah LIKE '$kodeSurat / % / KESRA-HB / $tahun'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
 
$nextNumber = isset($row['last_number']) ? str_pad($row['last_number'] + 1, 2, '0', STR_PAD_LEFT) : '01';
 
$jenisSurat = 'KESRA-HB';   
$noSurat = "$kodeSurat / $nextNumber / $jenisSurat / $tahun";

?>




<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Surat Keterangan Belum Pernah Menikah</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Tambah Data Surat Keterangan Belum Pernah Menikah</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                    <input type="text" class="form-control" hidden name="id_jenis_surat" value="<?= $id_jenis_surat ?>" readonly required>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_bp_menikah" value="<?= $noSurat ?>" readonly required>
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
                        <label class="col-sm-2 col-form-label">Pernyataan Belum Pernah Menikah</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="pernyataan" required>
                        </div>
                    </div>   
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" name="tambah" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="?page=bp_menikah" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php
                    if (isset($_POST['tambah'])) { 
                        $id_jenis_surat = $_POST['id_jenis_surat'];
                        $no_bp_menikah = $_POST['no_bp_menikah'];
                        $id_warga = $_POST['id_warga'];
                        $tgl_pengajuan = $_POST['tgl_pengajuan'];
                        $keperluan = $_POST['keperluan']; 
 
                        $uploadDir = "../admin/assets/berkas/bp_menikah/";
                        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                        $maxFileSize = 2 * 1024 * 1024;  

                        $fileFields = [
                            'pengantar_rt' => '',
                            'fc_ktp' => '',
                            'fc_kk' => '',
                            'pernyataan' => ''
                        ];
 
                        foreach ($fileFields as $field => &$fileName) {
                            if (!empty($_FILES[$field]['name'])) {
                                $fileName = $_FILES[$field]['name'];
                                $fileTmp = $_FILES[$field]['tmp_name'];
                                $fileSize = $_FILES[$field]['size'];
                                $fileType = $_FILES[$field]['type'];

                                if ($fileSize > $maxFileSize) {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: 'Ukuran file $field terlalu besar. Maksimal 2 MB.',
                                            confirmButtonText: 'OK'
                                        });
                                    </script>";
                                    exit;
                                }

                                if (!in_array($fileType, $allowedTypes)) {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: 'Format file $field tidak valid. Hanya JPG, JPEG, dan PNG yang diperbolehkan.',
                                            confirmButtonText: 'OK'
                                        });
                                    </script>";
                                    exit;
                                }

                                $filePath = $uploadDir . basename($fileName);
                                if (!move_uploaded_file($fileTmp, $filePath)) {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: 'Terjadi kesalahan saat mengunggah file $field.',
                                            confirmButtonText: 'OK'
                                        });
                                    </script>";
                                    exit;
                                }
                            }
                        }
 
                        $query = "INSERT INTO bp_menikah 
                                  (id_jenis_surat, no_bp_menikah, id_warga, tgl_pengajuan, keperluan, pengantar_rt, fc_ktp, fc_kk, pernyataan, status_bp_menikah) 
                                  VALUES 
                                  ('$id_jenis_surat', '$no_bp_menikah', '$id_warga', '$tgl_pengajuan', '$keperluan', '{$fileFields['pengantar_rt']}', '{$fileFields['fc_ktp']}', '{$fileFields['fc_kk']}', '{$fileFields['pernyataan']}', 'Pending')";

                        if (mysqli_query($con, $query)) {
                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data berhasil disimpan.',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '?page=bp_menikah';
                                    }
                                });
                            </script>";
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan: " . mysqli_error($con) . "',
                                    confirmButtonText: 'OK'
                                });
                            </script>";
                        }
                    }
                ?>    
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->   