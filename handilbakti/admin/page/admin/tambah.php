<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Admin</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Tambah Data Admin</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" required>
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="button" onclick="togglePassword()" data-toggle="tooltip" data-placement="top" title="Lihat password">
                                        <i id="toggleIcon" class="ti ti-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select name="level" class="form-control">
                                <option selected disabled>Pilih</option>
                                <option value="Admin">Admin</option>
                                <option value="Lurah">Lurah</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option selected disabled>Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non-Aktif">Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" name="tambah" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="?page=admin" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php                           
                    if (isset($_POST['tambah'])) {
                        $nama = $_POST['nama'];
                        $username = $_POST['username'];
                        $password = $_POST['password']; 
                        $level = $_POST['level'];
                        $status = $_POST['status'];
                        $foto = $_FILES['foto']['name'];

                        $cek_query = "SELECT COUNT(*) AS jumlah FROM admin WHERE username = '$username'";
                        $cek_result = $con->query($cek_query);
                        $cek_data = $cek_result->fetch_assoc();

                        if ($cek_data['jumlah'] > 0) { 
                            echo "<script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan!',
                                        text: 'Username sudah terdaftar.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        } else { 
                     
                        if ($foto != '') {
                            $foto_tmp = $_FILES['foto']['tmp_name'];
                            $foto_dir = "assets/images/admin/" . $foto;
                            move_uploaded_file($foto_tmp, $foto_dir);
                        }
                     
                        $query = "INSERT INTO admin (nama, username, password, level, status, foto) 
                                  VALUES ('$nama', '$username', '$password', '$level', '$status', '$foto')";
                        if ($con->query($query) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil disimpan.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=admin';
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
                        }}
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