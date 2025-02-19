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
                    <h4 class="card-title mb-0 flex-grow-1">Data Warga</h4>
                    <div class="text-right">
	                    <a href="?page=warga&aksi=tambah" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah"><i class="ti ti-plus"></i></a> 
	                </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive"> 
                    <table id="dtTables" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3%">No.</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th> 
                                <th>Tempat, Tanggal Lahir</th> 
                                <th>Umur</th> 
                                <th>No Telepon</th>  
                                <th>Alamat</th>  
                                <th width="5%" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1; ?>
                            <?php $ambil=$con->query("SELECT * FROM warga ORDER BY id_warga ASC"); ?>
                            <?php while ($pecah = $ambil->fetch_assoc()) { 
                                $tgl = tgl_indo($pecah['tgl_warga']); ?>
                            <tr>      
                                <td class="text-center"><?php echo $nomor; ?></td>  
                                <td><?php echo $pecah['nik_warga']; ?></td>    
                                <td><?php echo $pecah['nama_warga']; ?></td>      
                                <td><?php echo $pecah['jk_warga']; ?></td>      
                                <td><?php echo $pecah['tmp_warga']; ?>, <?php echo $tgl; ?></td>      
                                <td>
                                    <?php 
                                    $tgl_lahir = $pecah['tgl_warga'];  
 
                                    $tanggal_lahir = new DateTime($tgl_lahir);
                                    $hari_ini = new DateTime();
                                    $umur = $hari_ini->diff($tanggal_lahir)->y;

                                    echo "" . $umur . " tahun";
                                    ?>
                                </td>      
                                <td><?php echo $pecah['nohp_warga']; ?></td>      
                                <td><?php echo $pecah['alamat_warga']; ?></td>     
                                <td class="text-center btn-group">  
                                    <a class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Lihat" href="?page=warga&aksi=lihat&id_warga=<?php echo $pecah['id_warga'] ?>"><i class="ti ti-eye"></i></a>
                                    <a class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ubah" href="?page=warga&aksi=ubah&id_warga=<?php echo $pecah['id_warga'] ?>"><i class="ti ti-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus" href="#" onclick="confirmDelete(<?= $pecah['id_warga']; ?>)"><i class="ti ti-trash"></i></a> 
                                </td> 
                            </tr> 
                            <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row --> 

<script>
    function confirmDelete(id_warga) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak bisa mengembalikan data yang telah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "?page=warga&aksi=hapus&id_warga=" + id_warga;
            }
        });
    }
</script> 