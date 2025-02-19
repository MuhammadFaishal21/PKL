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
                    <h4 class="card-title mb-0 flex-grow-1">Tambah Data Warga</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="nik_warga" minlength="16" maxlength="16" required>
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
                                <label class="col-sm-3 col-form-label">Status Pernikahan</label>
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
                                <label class="col-sm-3 col-form-label">Status Akun</label>
                                <div class="col-sm-9">
                                    <select name="status_akun" class="form-control select2" data-toggle="select2">
                                        <option selected disabled>Pilih</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option> 
                                    </select>
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
                        $status_akun = $_POST['status_akun'];
 
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
                            $query = "INSERT INTO warga (nik_warga, nama_warga, jk_warga, tmp_warga, tgl_warga, alamat_warga, rt_warga, rw_warga, email_warga, nohp_warga, id_agama, id_darah, id_pekerjaan, id_pendidikan, status_nikah, uname, upass, status_akun) VALUES ('$nik_warga', '$nama_warga', '$jk_warga', '$tmp_warga', '$tgl_warga', '$alamat_warga', '$rt_warga', '$rw_warga', '$email_warga', '$nohp_warga', '$id_agama', '$id_darah', '$id_pekerjaan', '$id_pendidikan', '$status_nikah', '$uname', '$upass', '$status_akun')";

                            if ($con->query($query) === TRUE) {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Data berhasil disimpan.',
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