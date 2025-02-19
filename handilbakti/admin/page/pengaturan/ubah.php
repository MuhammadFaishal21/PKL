<?php 
$id_meta = $_GET['id_meta'];
$ambil  = $con->query("SELECT * FROM meta WHERE id_meta ='$_GET[id_meta]'");
$row  = $ambil->fetch_assoc();    ?>  

<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Pengaturan</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Ubah Pengaturan</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Instansi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="instansi" value="<?= $row['instansi'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamat" value="<?= $row['alamat'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="telp" value="<?= $row['telp'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>" required>
                        </div>
                    </div>   
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Singkatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="singkat" value="<?= $row['singkat'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Pimpinan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pimpinan" value="<?= $row['pimpinan'] ?>" required>
                        </div>
                    </div>  
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Logo</label>
                        <div class="col-sm-9">
                            <?php if (!empty($row['logo'])): ?>
                                <img src="assets/images/<?= $row['logo'] ?>" alt="Logo" style="width: 100px; height: auto;">
                            <?php endif; ?>
                            <input type="file" class="form-control" name="logo">
                            <code class="text-danger">* Kosongkan / Lewati apabila tidak ingin merubah</code>
                        </div>
                    </div>  
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">&nbsp;</label>
                        <div class="col-sm-9">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan Perubahan</button>
                            <a href="?page=pengaturan&id_meta=<?= $row['id_meta'] ?>" class="btn btn-sm btn-danger">Kembali</a>
                        </div>
                    </div>                                  
                </form>

                <?php 
                if (isset($_POST['ubah'])) 
                {
                    
                    $instansi     = $_POST['instansi']; 
                    $telp      = $_POST['telp']; 
                    $email     = $_POST['email']; 
                    $alamat    = $_POST['alamat'];   
                    $pimpinan  = $_POST['pimpinan'];       
                    $singkat  = $_POST['singkat'];   
                    $logo      = $_FILES['logo']['name'];
                    $lokasi         = $_FILES['logo']['tmp_name'];
                    if (!empty($lokasi)) 
                    {
                        move_uploaded_file($lokasi, "assets/images/".$logo);
                        $con->query("UPDATE meta SET instansi='$instansi',
                                                     telp='$telp',
                                                     email='$email',
                                                     alamat='$alamat',  
                                                     pimpinan='$pimpinan',    
                                                     singkat='$singkat', 
                                                     logo='$logo' WHERE id_meta='$_GET[id_meta]'"); 
                    }
                    else
                    {
                        $con->query("UPDATE meta SET instansi='$instansi',
                                                     telp='$telp',
                                                     email='$email',
                                                     alamat='$alamat',  
                                                     pimpinan='$pimpinan',    
                                                     singkat='$singkat' WHERE id_meta='$_GET[id_meta]'"); 
                    } 
                    echo " 
                    <script>
                         Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data berhasil diperbarui.',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location = '?page=pengaturan&id_meta=$id_meta';
                            }
                        }); 
                    </script>";
                }
                ?> 
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row --> 