<?php 
$id_skck = $_GET['id_skck'];
 
$query = "SELECT * FROM skck WHERE id_skck = $id_skck";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
 
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Ubah Data Surat Pengantar SKCK</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom border-dashed">
                <h4 class="card-title mb-0">Ubah Data Surat Pengantar SKCK</h4>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_skck" value="<?= $id_skck ?>" />
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_skck" value="<?= $data['no_skck'] ?>" readonly />
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" class="form-control" rows="6"><?php echo (htmlspecialchars($data['keterangan'])); ?></textarea>
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
                        <label class="col-sm-2 col-form-label">Fotocopy Akta Kelahiran</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="fc_akta" />
                            <small>File saat ini: <?= $data['fc_akta'] ?></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Pas Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="pas_foto" />
                            <small>File saat ini: <?= $data['pas_foto'] ?></small>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan Perubahan</button>
                            <a href="?page=skck" class="btn btn-danger btn-sm">Kembali</a>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_POST['ubah'])) {
                        $id_skck = $_POST['id_skck']; 
                        $keterangan = $_POST['keterangan']; 

                        $uploadDir = "../admin/assets/berkas/skck/";
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

                        if (!empty($_FILES['fc_akta']['name'])) {
                            $fcPBB = $_FILES['fc_akta']['name'];
                            $fcpbbTmp = $_FILES['fc_akta']['tmp_name'];
                            $fcpbbPath = $uploadDir . basename($fcPBB);

                            move_uploaded_file($fcpbbTmp, $fcpbbPath);
                            $updateFields .= ", fc_akta = '$fcPBB'";
                        }

                        if (!empty($_FILES['pas_foto']['name'])) {
                            $ftusaha = $_FILES['pas_foto']['name'];
                            $FTUSAHATmp = $_FILES['pas_foto']['tmp_name'];
                            $FTUSAHAPath = $uploadDir . basename($ftusaha);

                            move_uploaded_file($FTUSAHATmp, $fcpbbPath);
                            $updateFields .= ", pas_foto = '$ftusaha'";
                        }

                        $query = "UPDATE skck SET keterangan = '$keterangan', status_skck = 'Pending' $updateFields WHERE id_skck = $id_skck";

                        if (mysqli_query($con, $query)) {
                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data berhasil diperbarui.',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '?page=skck';
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
