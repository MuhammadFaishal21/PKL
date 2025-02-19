<?php 
$id_domisili = $_GET['id_domisili'];
 
$query = "SELECT * FROM domisili WHERE id_domisili = $id_domisili";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
 
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Ubah Data Surat Keterangan Domisili</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom border-dashed">
                <h4 class="card-title mb-0">Ubah Data Surat Keterangan Domisili</h4>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_domisili" value="<?= $id_domisili ?>" />
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_domisili" value="<?= $data['no_domisili'] ?>" readonly />
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
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan Perubahan</button>
                            <a href="?page=domisili" class="btn btn-danger btn-sm">Kembali</a>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_POST['ubah'])) {
                        $id_domisili = $_POST['id_domisili'];
                        $keperluan = $_POST['keperluan']; 

                        $uploadDir = "../admin/assets/berkas/domisili/";
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

                        $query = "UPDATE domisili SET keperluan = '$keperluan', status_domisili = 'Pending' $updateFields WHERE id_domisili = $id_domisili";

                        if (mysqli_query($con, $query)) {
                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data berhasil diperbarui.',
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
