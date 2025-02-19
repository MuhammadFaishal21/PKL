<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Pekerjaan</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Tambah Data Pekerjaan</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pekerjaan" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" name="tambah" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="?page=pekerjaan" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php                           
                    if (isset($_POST['tambah'])) {
                        $pekerjaan = $_POST['pekerjaan']; 

                        $cek_query = "SELECT COUNT(*) AS jumlah FROM pekerjaan WHERE pekerjaan = '$pekerjaan'";
                        $cek_result = $con->query($cek_query);
                        $cek_data = $cek_result->fetch_assoc();

                        if ($cek_data['jumlah'] > 0) { 
                            echo "<script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan!',
                                        text: 'Data sudah terdaftar.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        } else { 

                     
                        $query = "INSERT INTO pekerjaan (pekerjaan) VALUES ('$pekerjaan')";
                        if ($con->query($query) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil disimpan.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=pekerjaan';
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