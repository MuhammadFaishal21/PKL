<?php 
$id_usaha = $_GET['id_usaha'];
 
$query = "SELECT * FROM usaha WHERE id_usaha = $id_usaha";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
 
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Ubah Data Surat Keterangan Usaha</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom border-dashed">
                <h4 class="card-title mb-0">Ubah Data Surat Keterangan Usaha</h4>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_usaha" value="<?= $id_usaha ?>" />
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_usaha" value="<?= $data['no_usaha'] ?>" readonly />
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Jenis Usaha</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jenis_usaha" value="<?= $data['jenis_usaha'] ?>"  />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nama Usaha</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_usaha" value="<?= $data['nama_usaha'] ?>"  />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Alamat Usaha</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat_usaha" value="<?= $data['alamat_usaha'] ?>"  />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <textarea name="keperluan" class="form-control" rows="6"><?= $data['keperluan'] ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Pengantar RT/RW</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="pengantar_rt" />
                            <small>File saat ini: <?= $data['pengantar_rt'] ?></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Fotocopy KTP Pemohon</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="fc_ktp" />
                            <small>File saat ini: <?= $data['fc_ktp'] ?></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Fotocopy KK Pemohon</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="fc_kk" />
                            <small>File saat ini: <?= $data['fc_kk'] ?></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Fotocopy Bukti Lunas PBB</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="fc_pbb" />
                            <small>File saat ini: <?= $data['fc_pbb'] ?></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Foto usaha</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="foto_usaha" />
                            <small>File saat ini: <?= $data['foto_usaha'] ?></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status_usaha" class="form-control">
                                <option value="Pending" <?= $data['status_usaha'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="Acc" <?= $data['status_usaha'] == 'Acc' ? 'selected' : '' ?>>Acc</option> 
                                <option value="Upload Ulang Berkas" <?= $data['status_usaha'] == 'Upload Ulang Berkas' ? 'selected' : '' ?>>Upload Ulang Berkas</option>
                                <option value="Ditolak" <?= $data['status_usaha'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan Perubahan</button>
                            <a href="?page=usaha" class="btn btn-danger btn-sm">Kembali</a>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_POST['ubah'])) {
                        $id_usaha = $_POST['id_usaha'];
                        $jenis_usaha = $_POST['jenis_usaha'];
                        $nama_usaha = $_POST['nama_usaha'];
                        $alamat_usaha = $_POST['alamat_usaha'];
                        $keperluan = $_POST['keperluan'];
                        $status_usaha = $_POST['status_usaha'];

                        $uploadDir = "assets/berkas/usaha/";
                        $updateFields = "";

                        if (!empty($_FILES['pengantar_rt']['name'])) {
                            $pengantarRt = $_FILES['pengantar_rt']['name'];
                            $pengantarRtTmp = $_FILES['pengantar_rt']['tmp_name'];
                            $pengantarRtPath = $uploadDir . basename($pengantarRt);

                            move_uploaded_file($pengantarRtTmp, $pengantarRtPath);
                            $updateFields .= ", pengantar_rt = '$pengantarRt'";
                        }

                        if (!empty($_FILES['fc_ktp']['name'])) {
                            $fcKtp = $_FILES['fc_ktp']['name'];
                            $fcKtpTmp = $_FILES['fc_ktp']['tmp_name'];
                            $fcKtpPath = $uploadDir . basename($fcKtp);

                            move_uploaded_file($fcKtpTmp, $fcKtpPath);
                            $updateFields .= ", fc_ktp = '$fcKtp'";
                        }

                        if (!empty($_FILES['fc_kk']['name'])) {
                            $fcKk = $_FILES['fc_kk']['name'];
                            $fcKkTmp = $_FILES['fc_kk']['tmp_name'];
                            $fcKkPath = $uploadDir . basename($fcKk);

                            move_uploaded_file($fcKkTmp, $fcKkPath);
                            $updateFields .= ", fc_kk = '$fcKk'";
                        }

                        if (!empty($_FILES['fc_pbb']['name'])) {
                            $fcPBB = $_FILES['fc_pbb']['name'];
                            $fcpbbTmp = $_FILES['fc_pbb']['tmp_name'];
                            $fcpbbPath = $uploadDir . basename($fcPBB);

                            move_uploaded_file($fcpbbTmp, $fcpbbPath);
                            $updateFields .= ", fc_pbb = '$fcPBB'";
                        }

                        if (!empty($_FILES['foto_usaha']['name'])) {
                            $ftusaha = $_FILES['foto_usaha']['name'];
                            $FTUSAHATmp = $_FILES['foto_usaha']['tmp_name'];
                            $FTUSAHAPath = $uploadDir . basename($ftusaha);

                            move_uploaded_file($FTUSAHATmp, $fcpbbPath);
                            $updateFields .= ", foto_usaha = '$ftusaha'";
                        }

                        $query = "UPDATE usaha SET jenis_usaha = '$jenis_usaha', nama_usaha = '$nama_usaha', alamat_usaha = '$alamat_usaha', keperluan = '$keperluan', status_usaha = '$status_usaha' $updateFields WHERE id_usaha = $id_usaha";

                        if (mysqli_query($con, $query)) {
                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data berhasil diperbarui.',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '?page=usaha';
                                    }
                                });
                              </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Terjadi kesalahan: " . mysqli_error($con) . "',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
