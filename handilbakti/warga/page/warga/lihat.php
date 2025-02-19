<?php
$id_warga = $_GET['id_warga'];
$sql = $con->query("SELECT * FROM warga NATURAL JOIN agama NATURAL JOIN darah NATURAL JOIN pekerjaan NATURAL JOIN pendidikan WHERE id_warga='$id_warga'");
$data = mysqli_fetch_assoc($sql);
$tgl = tgl_indo($data['tgl_warga']);
?> 

<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Lihat Warga</h4>
    </div>
    <div class="text-end">
        <button class="btn btn-sm btn-primary"><span id="date-time"></span></button>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-lg-12"></div>
    <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="dr-profile-bg rounded-top position-relative mx-n3 mt-n3 position-relative">
                    <img src="../admin/assets/images/manuser.png" alt="" class="border border-light border-3 rounded-circle position-absolute top-100 start-50 translate-middle" height="100" width="100">
                </div>
                <div class="mt-4 mb-2 pt-3  text-center">
                    <p class="mb-1 fs-18 fw-semibold text-dark"><?= $data[nama_warga] ?></p>
                    <p class="mb-0 fw-medium text-muted">NIK : <?= $data[nik_warga] ?></p>
                </div> 
                <div class="table-responsive mt-3 border border-dashed rounded px-2 py-1">
                    <table class="table table-borderless m-0">
                        <tbody>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[nik_warga] ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[nama_warga] ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[jk_warga] ?></td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[tmp_warga] ?>, <?= $tgl ?></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14">
                                    <?php 
                                        $tgl_lahir = $data['tgl_warga'];  
     
                                        $tanggal_lahir = new DateTime($tgl_lahir);
                                        $hari_ini = new DateTime();
                                        $umur = $hari_ini->diff($tanggal_lahir)->y;

                                        echo "" . $umur . " tahun";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[alamat_warga] ?>, RT <?= $data[rt_warga] ?> RW <?= $data[rw_warga] ?></td>
                            </tr> 
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[email_warga] ?></td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[nohp_warga] ?></td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[darah] ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[agama] ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[pendidikan] ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[pekerjaan] ?></td>
                            </tr>
                            <tr>
                                <td>Status Pernikahan</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[status_nikah] ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data['uname'] ?></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14">
                                    <span id="passwordDisplay">******</span>
                                    <span id="password" style="display:none;"><?= $data['upass'] ?></span>
                                    <a href="javascript:void(0);" id="togglePassword" onclick="togglePassword()">Lihat Password</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Akun</td>
                                <td>:</td>
                                <td class="text-dark fw-medium fs-14"><?= $data[status_akun] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="?page=warga&aksi=ubah&id_warga=<?php echo $data['id_warga'] ?>" class="btn btn-success btn-sm">Ubah Profil</a>
                <a href="?page.php" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card"></div>
    </div> <!-- end col--> 
    <div class="col-xl-3 col-lg-12"></div>
</div>
<!-- end row --> 

<script>
    function togglePassword() {
        var passwordField = document.getElementById('password');
        var passwordDisplay = document.getElementById('passwordDisplay');
        var togglePasswordLink = document.getElementById('togglePassword');
        
        if (passwordField.style.display === 'none') {
            passwordField.style.display = 'inline';
            passwordDisplay.style.display = 'none';
            togglePasswordLink.innerHTML = 'Sembunyikan Password';
        } else {
            passwordField.style.display = 'none';
            passwordDisplay.style.display = 'inline';
            togglePasswordLink.innerHTML = 'Lihat Password';
        }
    }
</script>