<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Golongan Darah</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Data Golongan Darah</h4>
                    <div class="text-right">
	                    <a href="?page=darah&aksi=tambah" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah"><i class="ti ti-plus"></i></a> 
	                </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive"> 
                    <table id="dtTables" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3%">No.</th>
                                <th>Golongan Darah</th> 
                                <th width="5%" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1; ?>
                            <?php $ambil=$con->query("SELECT * FROM darah ORDER BY id_darah ASC"); ?>
                            <?php while ($pecah = $ambil->fetch_assoc()) { 
                                // $tgl = tgl_indo($pecah['tgl']); ?>
                            <tr>      
                                <td class="text-center"><?php echo $nomor; ?></td>  
                                <td><?php echo $pecah['darah']; ?></td>     
                                <td class="text-center btn-group">  
                                    <a class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ubah" href="?page=darah&aksi=ubah&id_darah=<?php echo $pecah['id_darah'] ?>"><i class="ti ti-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus" href="#" onclick="confirmDelete(<?= $pecah['id_darah']; ?>)"><i class="ti ti-trash"></i></a> 
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
    function confirmDelete(id_darah) {
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
                window.location.href = "?page=darah&aksi=hapus&id_darah=" + id_darah;
            }
        });
    }
</script> 