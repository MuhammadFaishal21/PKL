<?php
$id_warga = $_GET['id_warga'];
$sql = $con->query("SELECT * FROM warga WHERE id_warga='$id_warga'");
$data = mysqli_fetch_assoc($sql);
?> 

<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Warga</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Ubah Data Warga</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">

                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                    <input type="hidden" name="id_warga" value="<?= $data['id_warga']; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nik_warga" minlength="16" maxlength="16" value="<?= $data['nik_warga']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_warga" value="<?= $data['nama_warga']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jk_warga" class="form-control select2" required>
                                        <option value="Laki-laki" <?= $data['jk_warga'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= $data['jk_warga'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tmp_warga" value="<?= $data['tmp_warga']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tgl_warga" data-provider="flatpickr" value="<?= $data['tgl_warga']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="alamat_warga" value="<?= $data['alamat_warga']; ?>" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="rt_warga" placeholder="RT" value="<?= $data['rt_warga']; ?>" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="rw_warga" placeholder="RW" value="<?= $data['rw_warga']; ?>" required>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email_warga" value="<?= $data['email_warga']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Nomor HP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nohp_warga" value="<?= $data['nohp_warga']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <select name="id_agama" class="form-control select2" data-toggle="select2">
                                        <option disabled>Pilih</option>
                                        <?php
                                        $agama_query = mysqli_query($con, "SELECT * FROM agama");
                                        while ($row = mysqli_fetch_assoc($agama_query)) {
                                            $selected = $data['id_agama'] == $row['id_agama'] ? 'selected' : '';
                                            echo "<option value='{$row['id_agama']}' $selected>{$row['agama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Golongan Darah</label>
                                <div class="col-sm-9">
                                    <select name="id_darah" class="form-control select2" data-toggle="select2">
                                        <option disabled>Pilih</option>
                                        <?php
                                        $darah_query = mysqli_query($con, "SELECT * FROM darah");
                                        while ($row = mysqli_fetch_assoc($darah_query)) {
                                            $selected = $data['id_darah'] == $row['id_darah'] ? 'selected' : '';
                                            echo "<option value='{$row['id_darah']}' $selected>{$row['darah']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <select name="id_pekerjaan" class="form-control select2" data-toggle="select2">
                                        <option disabled>Pilih</option>
                                        <?php
                                        $pekerjaan_query = mysqli_query($con, "SELECT * FROM pekerjaan");
                                        while ($row = mysqli_fetch_assoc($pekerjaan_query)) {
                                            $selected = $data['id_pekerjaan'] == $row['id_pekerjaan'] ? 'selected' : '';
                                            echo "<option value='{$row['id_pekerjaan']}' $selected>{$row['pekerjaan']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select name="id_pendidikan" class="form-control select2" data-toggle="select2">
                                        <option disabled>Pilih</option>
                                        <?php
                                        $pendidikan_query = mysqli_query($con, "SELECT * FROM pendidikan");
                                        while ($row = mysqli_fetch_assoc($pendidikan_query)) {
                                            $selected = $data['id_pendidikan'] == $row['id_pendidikan'] ? 'selected' : '';
                                            echo "<option value='{$row['id_pendidikan']}' $selected>{$row['pendidikan']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Status Pernikahan</label>
                                <div class="col-sm-9">
                                    <select name="status_nikah" class="form-control select2" required> 
                                        <option value="Belum Menikah" <?= $data['status_nikah'] == 'Belum Menikah' ? 'selected' : ''; ?>>Belum Menikah</option>
                                        <option value="Menikah" <?= $data['status_nikah'] == 'Menikah' ? 'selected' : ''; ?>>Menikah</option>
                                        <option value="Cerai Hidup" <?= $data['status_nikah'] == 'Cerai Hidup' ? 'selected' : ''; ?>>Cerai Hidup</option>
                                        <option value="Cerai Mati" <?= $data['status_nikah'] == 'Cerai Mati' ? 'selected' : ''; ?>>Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="uname" value="<?= $data['uname']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="upass" id="password" value="<?= $data['upass']; ?>" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="button" onclick="togglePassword()" data-toggle="tooltip" data-placement="top" title="Lihat password">
                                                <i id="toggleIcon" class="ti ti-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Status Akun</label>
                                <div class="col-sm-9">
                                    <select name="status_akun" class="form-control select2">
                                        <option value="Aktif" <?= $data['status_akun'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?= $data['status_akun'] == 'Tidak Aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">&nbsp;</label>
                                <div class="col-sm-9">
                                    <button type="submit" name="update" class="btn btn-success btn-sm">Simpan Perubahan</button>
                                    <a href="?page=warga" class="btn btn-danger btn-sm">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_POST['update'])) {
                        $nik_warga = $_POST['nik_warga'];
                        $nama_warga = $_POST['nama_warga'];
                        $jk_warga = $_POST['jk_warga'];
                        $tmp_warga = $_POST['tmp_warga'];
                        $tgl_warga = date('Y-m-d', strtotime($_POST['tgl_warga']));
                        $alamat_warga = $_POST['alamat_warga'];
                        $rt_warga = $_POST['rt_warga'];
                        $rw_warga = $_POST['rw_warga'];
                        $email_warga = $_POST['email_warga'];
                        $nohp_warga = $_POST['nohp_warga'];
                        $id_agama = $_POST['id_agama'];
                        $id_darah = $_POST['id_darah'];
                        $id_pekerjaan = $_POST['id_pekerjaan'];
                        $id_pendidikan = $_POST['id_pendidikan'];
                        $status_nikah = $_POST['status_nikah'];
                        $uname = $_POST['uname'];
                        $upass = $_POST['upass'];
                        $status_akun = $_POST['status_akun'];

                        // Query untuk update data
                        $updateQuery = "UPDATE warga SET 
                            nik_warga = '$nik_warga',
                            nama_warga = '$nama_warga',
                            jk_warga = '$jk_warga',
                            tmp_warga = '$tmp_warga',
                            tgl_warga = '$tgl_warga',
                            alamat_warga = '$alamat_warga',
                            rt_warga = '$rt_warga',
                            rw_warga = '$rw_warga',
                            email_warga = '$email_warga',
                            nohp_warga = '$nohp_warga',
                            id_agama = '$id_agama',
                            id_darah = '$id_darah',
                            id_pekerjaan = '$id_pekerjaan',
                            id_pendidikan = '$id_pendidikan',
                            status_nikah = '$status_nikah',
                            uname = '$uname',
                            upass = '$upass',
                            status_akun = '$status_akun'
                            WHERE id_warga = '$id_warga'";

                        if ($con->query($updateQuery) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil diupdate.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=warga';
                                        }
                                    });
                                  </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat mengupdate data.',
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

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("toggleIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("ti ti-eye");
            toggleIcon.classList.add("ti ti-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("ti ti-eye-slash");
            toggleIcon.classList.add("ti ti-eye");
        }
    }
</script>