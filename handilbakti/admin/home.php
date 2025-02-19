

<div class="row">
    <div class="col-12">
        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
            </div>
            <div class="mt-3 mt-sm-0">
                <button class="btn btn-sm btn-primary"><span id="date-time"></span></button>
            </div>
        </div><!-- end card header -->
    </div>
    <!--end col-->
</div> <!-- end row-->

<div class="row">
    <?php $ambil=$con->query("SELECT * FROM warga WHERE status_akun='Tidak Aktif' ORDER BY id_warga ASC"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { 
        $tgl = tgl_indo($pecah['tgl_warga']); ?>
        <div class="alert alert-success p-3" role="alert">
            <h4 class="alert-heading">Pendafatran Akun, dari ;</h4> 
            <table>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nik_warga] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nama_warga] ?></td>
                </tr>
            </table>            
            <hr class="border-success border-opacity-25">
            <p class="mb-0">
                <a href="verif/verif_akun.php?id_warga=<?php echo $pecah['id_warga'] ?>" class="btn btn-sm btn-success">Verifikasi</a>
                <a href="?page=warga&aksi=lihat&id_warga=<?php echo $pecah['id_warga'] ?>" class="btn btn-sm btn-warning">Lihat</a>
            </p>
        </div>
    <?php } ?>

    <!-- Domisili -->
    <?php $ambil=$con->query("SELECT * FROM domisili NATURAL JOIN warga WHERE status_domisili='Pending' ORDER BY id_domisili ASC"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { 
        $hari = getHari($pecah['tgl_pengajuan']); 
        $tgl = tgl_indo($pecah['tgl_pengajuan']);  
    ?>
        <div class="alert alert-success p-3" role="alert">
            <h4 class="alert-heading text-dark">Pengajuan Surat Keterangan Domisili, dari ;</h4> 
            <table  class="text-dark fw-medium fs-14">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nik_warga] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nama_warga] ?></td>
                </tr>
                <tr>
                    <td>Hari, Tanggal Pengajuan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $hari ?>, <?= $tgl ?></td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[keperluan] ?></td>
                </tr>
            </table>            
            <hr class="border-success border-opacity-25">
            <p class="mb-0">
                <a href="?page=domisili&aksi=lihat&id_domisili=<?php echo $pecah['id_domisili'] ?>" class="btn btn-sm btn-secondary">Lihat</a>
                <a href="#" class="btn btn-primary btn-sm" onclick="accPengajuan(<?= $pecah['id_domisili']; ?>)">ACC</a>
                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalTolak" onclick="setIdDomisili(<?= $pecah['id_domisili']; ?>)">Tolak</a>
            </p>
        </div>
    <?php } ?>

    <div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="modalTolakLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTolakLabel">Alasan Penolakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="verif/tolak_domisili.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_domisili" id="id_domisili">
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan Penolakan</label>
                            <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function accPengajuan(id_domisili) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui pengajuan ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ACC!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) { 
                    window.location.href = `verif/verif_domisili.php?id_domisili=${id_domisili}`;
                }
            });
        }

        function setIdDomisili(id_domisili) {
            document.getElementById('id_domisili').value = id_domisili;
        }
    </script>



    <!-- Usaha -->
    <?php $ambil=$con->query("SELECT * FROM usaha NATURAL JOIN warga WHERE status_usaha='Pending' ORDER BY id_usaha ASC"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { 
        $hari = getHari($pecah['tgl_pengajuan']); 
        $tgl = tgl_indo($pecah['tgl_pengajuan']);  
    ?>
        <div class="alert alert-success p-3" role="alert">
            <h4 class="alert-heading text-dark">Pengajuan Surat Keterangan Usaha, dari ;</h4> 
            <table  class="text-dark fw-medium fs-14">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nik_warga] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nama_warga] ?></td>
                </tr>
                <tr>
                    <td>Hari, Tanggal Pengajuan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $hari ?>, <?= $tgl ?></td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[keperluan] ?></td>
                </tr>
            </table>            
            <hr class="border-success border-opacity-25">
            <p class="mb-0">
                <a href="?page=usaha&aksi=lihat&id_usaha=<?php echo $pecah['id_usaha'] ?>" class="btn btn-sm btn-secondary">Lihat</a>
                <a href="#" class="btn btn-primary btn-sm" onclick="accPengajuanUsaha(<?= $pecah['id_usaha']; ?>)">ACC</a>
                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalTolakUsaha" onclick="setIdUsaha(<?= $pecah['id_usaha']; ?>)">Tolak</a>
            </p>
        </div>
    <?php } ?>

    <div class="modal fade" id="modalTolakUsaha" tabindex="-1" aria-labelledby="modalTolakLabelUsaha" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTolakLabelUsaha">Alasan Penolakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="verif/tolak_usaha.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_usaha" id="id_usaha">
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan Penolakan</label>
                            <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function accPengajuanUsaha(id_usaha) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui pengajuan ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ACC!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) { 
                    window.location.href = `verif/verif_usaha.php?id_usaha=${id_usaha}`;
                }
            });
        }

        function setIdUsaha(id_usaha) {
            document.getElementById('id_usaha').value = id_usaha;
        }
    </script>



    <!-- Tidak Mampu -->
    <?php $ambil=$con->query("SELECT * FROM tidak_mampu NATURAL JOIN warga WHERE status_tidak_mampu='Pending' ORDER BY id_tidak_mampu ASC"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { 
        $hari = getHari($pecah['tgl_pengajuan']); 
        $tgl = tgl_indo($pecah['tgl_pengajuan']);  
    ?>
        <div class="alert alert-success p-3" role="alert">
            <h4 class="alert-heading text-dark">Pengajuan Surat Keterangan Tidak Mampu, dari ;</h4> 
            <table  class="text-dark fw-medium fs-14">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nik_warga] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nama_warga] ?></td>
                </tr>
                <tr>
                    <td>Hari, Tanggal Pengajuan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $hari ?>, <?= $tgl ?></td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[keperluan] ?></td>
                </tr>
            </table>            
            <hr class="border-success border-opacity-25">
            <p class="mb-0">
                <a href="?page=tidak_mampu&aksi=lihat&id_tidak_mampu=<?php echo $pecah['id_tidak_mampu'] ?>" class="btn btn-sm btn-secondary">Lihat</a>
                <a href="#" class="btn btn-primary btn-sm" onclick="accPengajuantidak_mampu(<?= $pecah['id_tidak_mampu']; ?>)">ACC</a>
                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalTolaktidak_mampu" onclick="setIdtidak_mampu(<?= $pecah['id_tidak_mampu']; ?>)">Tolak</a>
            </p>
        </div>
    <?php } ?>

    <div class="modal fade" id="modalTolaktidak_mampu" tabindex="-1" aria-labelledby="modalTolakLabeltidak_mampu" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTolakLabeltidak_mampu">Alasan Penolakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="verif/tolak_tidak_mampu.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_tidak_mampu" id="id_tidak_mampu">
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan Penolakan</label>
                            <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function accPengajuantidak_mampu(id_tidak_mampu) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui pengajuan ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ACC!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) { 
                    window.location.href = `verif/verif_tidak_mampu.php?id_tidak_mampu=${id_tidak_mampu}`;
                }
            });
        }

        function setIdtidak_mampu(id_tidak_mampu) {
            document.getElementById('id_tidak_mampu').value = id_tidak_mampu;
        }
    </script>



    <!-- Belum Pernah Menikah -->
    <?php $ambil=$con->query("SELECT * FROM bp_menikah NATURAL JOIN warga WHERE status_bp_menikah='Pending' ORDER BY id_bp_menikah ASC"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { 
        $hari = getHari($pecah['tgl_pengajuan']); 
        $tgl = tgl_indo($pecah['tgl_pengajuan']);  
    ?>
        <div class="alert alert-success p-3" role="alert">
            <h4 class="alert-heading text-dark">Pengajuan Surat Keterangan Belum Pernah Menikah, dari ;</h4> 
            <table  class="text-dark fw-medium fs-14">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nik_warga] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nama_warga] ?></td>
                </tr>
                <tr>
                    <td>Hari, Tanggal Pengajuan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $hari ?>, <?= $tgl ?></td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[keperluan] ?></td>
                </tr>
            </table>            
            <hr class="border-success border-opacity-25">
            <p class="mb-0">
                <a href="?page=bp_menikah&aksi=lihat&id_bp_menikah=<?php echo $pecah['id_bp_menikah'] ?>" class="btn btn-sm btn-secondary">Lihat</a>
                <a href="#" class="btn btn-primary btn-sm" onclick="accPengajuanbp_menikah(<?= $pecah['id_bp_menikah']; ?>)">ACC</a>
                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalTolakbp_menikah" onclick="setIdbp_menikah(<?= $pecah['id_bp_menikah']; ?>)">Tolak</a>
            </p>
        </div>
    <?php } ?>

    <div class="modal fade" id="modalTolakbp_menikah" tabindex="-1" aria-labelledby="modalTolakLabelbp_menikah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTolakLabelbp_menikah">Alasan Penolakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="verif/tolak_bp_menikah.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_bp_menikah" id="id_bp_menikah">
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan Penolakan</label>
                            <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function accPengajuanbp_menikah(id_bp_menikah) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui pengajuan ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ACC!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) { 
                    window.location.href = `verif/verif_bp_menikah.php?id_bp_menikah=${id_bp_menikah}`;
                }
            });
        }

        function setIdbp_menikah(id_bp_menikah) {
            document.getElementById('id_bp_menikah').value = id_bp_menikah;
        }
    </script>




    <!-- Pengantar SKCK -->
    <?php $ambil=$con->query("SELECT * FROM skck NATURAL JOIN warga WHERE status_skck='Pending' ORDER BY id_skck ASC"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { 
        $hari = getHari($pecah['tgl_pengajuan']); 
        $tgl = tgl_indo($pecah['tgl_pengajuan']);  
    ?>
        <div class="alert alert-success p-3" role="alert">
            <h4 class="alert-heading text-dark">Pengajuan Surat Pengantar SKCK, dari ;</h4> 
            <table  class="text-dark fw-medium fs-14">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nik_warga] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $pecah[nama_warga] ?></td>
                </tr>
                <tr>
                    <td>Hari, Tanggal Pengajuan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?= $hari ?>, <?= $tgl ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Keterangan</td>
                    <td>:</td>
                    <td class="text-dark fw-medium fs-14"><?php echo nl2br(htmlspecialchars($pecah['keterangan'])); ?></td>
                </tr>
            </table>            
            <hr class="border-success border-opacity-25">
            <p class="mb-0">
                <a href="?page=skck&aksi=lihat&id_skck=<?php echo $pecah['id_skck'] ?>" class="btn btn-sm btn-secondary">Lihat</a>
                <a href="#" class="btn btn-primary btn-sm" onclick="accPengajuanskck(<?= $pecah['id_skck']; ?>)">ACC</a>
                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalTolakskck" onclick="setIdskck(<?= $pecah['id_skck']; ?>)">Tolak</a>
            </p>
        </div>
    <?php } ?>

    <div class="modal fade" id="modalTolakskck" tabindex="-1" aria-labelledby="modalTolakLabelskck" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTolakLabelskck">Alasan Penolakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="verif/tolak_skck.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_skck" id="id_skck">
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan Penolakan</label>
                            <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function accPengajuanskck(id_skck) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui pengajuan ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ACC!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) { 
                    window.location.href = `verif/verif_skck.php?id_skck=${id_skck}`;
                }
            });
        }

        function setIdskck(id_skck) {
            document.getElementById('id_skck').value = id_skck;
        }
    </script>



    <div class="col-sm-12 col-lg-6">
        <div class="card d-block"> 
            <div class="card-body">
                <div id="grafik_jk" style="width:100%; height:400px;"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div><!-- end col -->   

    <div class="col-sm-12 col-lg-6">
        <div class="card d-block"> 
            <div class="card-body">
                <div id="grafik_umur" style="width:100%; height:400px;"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div><!-- end col -->   

</div> <!-- end row--> 

<!-- Modal Penolakan -->









<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'verifikasi_sukses') {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Pengajuan berhasil di-ACC.',
                confirmButtonText: 'OK'
            });
        </script>";
    } elseif ($_GET['status'] === 'penolakan_sukses') {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Pengajuan berhasil ditolak.',
                confirmButtonText: 'OK'
            });
        </script>";
    }
}
?>
