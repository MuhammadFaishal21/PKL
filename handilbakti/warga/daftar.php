<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include '../admin/inc/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/osen/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jan 2025 07:33:29 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?= $meta['singkat'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../admin/assets/images/<?= $meta['logo'] ?>">

    <!-- Theme Config Js -->
    <script src="../admin/assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="../admin/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="../admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="../admin/assets/sweetalert2@11.js"> </script>

    <style type="text/css"> 
        .bg-utama
        {
            background-image: url(../admin/assets/images/bglogin.jpg);
            background-size: 100%;
            background-position: center; 
            background-repeat: no-repeat;

        } 
    </style>  
</head>

<body>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center bg-utama">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-8 col-lg-5 col-md-6">
                <div class="card overflow-hidden h-100 p-xxl-4 p-3 mb-0" style="background: rgb(255 255 255 / 69%); "> 

                    <h3 class="fw-semibold mb-2">Pendafatran</h3>
                    <p>Lengkapi formulir dibawah untuk melanjutkan pendaftaran</p> <hr> 

                    
                
                    <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nik_warga" minlength="16" maxlength="16" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_warga" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jk_warga" class="form-control select2" data-toggle="select2">
                                            <option selected disabled>Pilih</option> 
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tmp_warga" required>
                                    </div>
                                </div> 
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tgl_warga" data-provider="flatpickr" data-date-format="d M, Y">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="alamat_warga" required>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" name="rt_warga" placeholder="RT" required>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" name="rw_warga" placeholder="RW" required>
                                            </div>
                                        </div>                            
                                    </div>
                                </div> 
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nohp_warga" required>
                                    </div>
                                </div> 
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email_warga" required>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-6"> 
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select name="id_agama" class="form-control select2" data-toggle="select2">
                                            <option selected disabled>Pilih</option> 
                                            <?php
                                            $sql_kar=mysqli_query($con, "SELECT * FROM agama ORDER BY id_agama ASC");
                                            while ($kar=mysqli_fetch_array($sql_kar))
                                            {
                                                echo "<option value='$kar[id_agama]'>$kar[agama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Golongan Darah</label>
                                    <div class="col-sm-9">
                                        <select name="id_darah" class="form-control select2" data-toggle="select2">
                                            <option selected disabled>Pilih</option> 
                                            <?php
                                            $sql_kar=mysqli_query($con, "SELECT * FROM darah ORDER BY id_darah ASC");
                                            while ($kar=mysqli_fetch_array($sql_kar))
                                            {
                                                echo "<option value='$kar[id_darah]'>$kar[darah]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <select name="id_pekerjaan" class="form-control select2" data-toggle="select2">
                                            <option selected disabled>Pilih</option> 
                                            <?php
                                            $sql_kar=mysqli_query($con, "SELECT * FROM pekerjaan ORDER BY id_pekerjaan ASC");
                                            while ($kar=mysqli_fetch_array($sql_kar))
                                            {
                                                echo "<option value='$kar[id_pekerjaan]'>$kar[pekerjaan]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Pendidikan</label>
                                    <div class="col-sm-9">
                                        <select name="id_pendidikan" class="form-control select2" data-toggle="select2">
                                            <option selected disabled>Pilih</option> 
                                            <?php
                                            $sql_kar=mysqli_query($con, "SELECT * FROM pendidikan ORDER BY id_pendidikan ASC");
                                            while ($kar=mysqli_fetch_array($sql_kar))
                                            {
                                                echo "<option value='$kar[id_pendidikan]'>$kar[pendidikan]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Pernikahan</label>
                                    <div class="col-sm-9">
                                        <select name="status_nikah" class="form-control select2" data-toggle="select2">
                                            <option selected disabled>Pilih</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="uname" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="upass" id="password" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-warning" type="button" onclick="togglePassword()" data-toggle="tooltip" data-placement="top" title="Lihat password">
                                                    <i id="toggleIcon" class="ti ti-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <button type="submit" name="tambah" class="btn btn-primary btn-sm">Simpan</button>
                                        <a href="?page=pegawai" class="btn btn-danger btn-sm">Kembali</a> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>
                    <?php
                        if (isset($_POST['tambah'])) { 
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
     
                            $cek_query = "SELECT COUNT(*) AS jumlah FROM warga WHERE nik_warga = '$nik_warga'";
                            $cek_result = $con->query($cek_query);
                            $cek_data = $cek_result->fetch_assoc();

                            if ($cek_data['jumlah'] > 0) {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Peringatan!',
                                            text: 'NIK sudah terdaftar.',
                                            confirmButtonText: 'OK'
                                        });
                                      </script>";
                            } else { 
                                $query = "INSERT INTO warga (nik_warga, nama_warga, jk_warga, tmp_warga, tgl_warga, alamat_warga, rt_warga, rw_warga, email_warga, nohp_warga, id_agama, id_darah, id_pekerjaan, id_pendidikan, status_nikah, uname, upass, status_akun) VALUES ('$nik_warga', '$nama_warga', '$jk_warga', '$tmp_warga', '$tgl_warga', '$alamat_warga', '$rt_warga', '$rw_warga', '$email_warga', '$nohp_warga', '$id_agama', '$id_darah', '$id_pekerjaan', '$id_pendidikan', '$status_nikah', '$uname', '$upass', 'Tidak Aktif')";

                                if ($con->query($query) === TRUE) {
                                    echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Berhasil!',
                                                text: 'Pendaftaran berhasil, tunggu admin melakukan verifikasi akun anda 1X24 Jam. Terima Kasih.',
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = 'index.php';
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

                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="../admin/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../admin/assets/js/app.js"></script>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('example-password');
            const checkboxLabel = document.getElementById('checkbox-label');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                checkboxLabel.textContent = 'Sembunyikan password';
            } else {
                passwordField.type = 'password';
                checkboxLabel.textContent = 'Lihat password';
            }
        }
    </script>

</body>


<!-- Mirrored from coderthemes.com/osen/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jan 2025 07:33:29 GMT -->
</html>