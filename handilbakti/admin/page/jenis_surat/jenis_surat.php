<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Jenis Surat</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Data Jenis Surat</h4> 
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive"> 
                    <table id="dtTables" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3%">No.</th>
                                <th width="10%" class="text-center">Kode</th> 
                                <th>Surat</th> 
                                <th width="5%" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1; ?>
                            <?php $ambil=$con->query("SELECT * FROM jenis_surat ORDER BY id_jenis_surat ASC"); ?>
                            <?php while ($pecah = $ambil->fetch_assoc()) { 
                                // $tgl = tgl_indo($pecah['tgl']); ?>
                            <tr>      
                                <td class="text-center"><?php echo $nomor; ?></td>  
                                <td class="text-center"><?php echo $pecah['kode_surat']; ?></td>     
                                <td><?php echo $pecah['nama_surat']; ?></td>     
                                <td class="text-center btn-group">  
                                    <a class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ubah" href="?page=jenis_surat&aksi=ubah&id_jenis_surat=<?php echo $pecah['id_jenis_surat'] ?>"><i class="ti ti-pencil"></i></a> 
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