<?php
$id_pegawai = $_GET['id_pegawai'];
$sql = $con->query("SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
$row = mysqli_fetch_assoc($sql);
?> 

<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Pegawai</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Ubah Data Pegawai</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">NIP/NRP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nip" value="<?php echo $row['nip']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select name="id_jabatan" class="form-control select2" data-toggle="select2">
                                <option disabled>Pilih</option>
                                <?php
                                $sql_kar = mysqli_query($con, "SELECT * FROM jabatan ORDER BY id_jabatan ASC");
                                while ($kar = mysqli_fetch_array($sql_kar)) {
                                    $selected = $kar['id_jabatan'] == $row['id_jabatan'] ? 'selected' : '';
                                    echo "<option value='$kar[id_jabatan]' $selected>$kar[jabatan]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tmp" value="<?php echo $row['tmp']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tgl" data-provider="flatpickr" data-date-format="d M, Y" value="<?php echo date('d M, Y', strtotime($row['tgl'])); ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nohp" value="<?php echo $row['nohp']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan Perubahan</button>
                            <a href="?page=pegawai" class="btn btn-danger btn-sm">Kembali</a>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_POST['ubah'])) {
                        $nip = $_POST['nip'];
                        $nama = $_POST['nama'];
                        $id_jabatan = $_POST['id_jabatan'];
                        $tmp = $_POST['tmp'];
                        $tgl = date('Y-m-d', strtotime($_POST['tgl']));
                        $alamat = $_POST['alamat'];
                        $nohp = $_POST['nohp'];
                        $email = $_POST['email'];
                        $upass = $_POST['upass'];
 
                        $query = "UPDATE pegawai SET 
                                    nip = '$nip', 
                                    nama = '$nama', 
                                    id_jabatan = '$id_jabatan', 
                                    tmp = '$tmp', 
                                    tgl = '$tgl', 
                                    alamat = '$alamat', 
                                    nohp = '$nohp', 
                                    email = '$email'
                                  WHERE id_pegawai = '$id_pegawai'";

                        if ($con->query($query) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil diubah.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=pegawai';
                                        }
                                    });
                                  </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat mengubah data.',
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