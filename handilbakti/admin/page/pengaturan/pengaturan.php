<?php 
$id_meta = $_GET['id_meta'];
$ambil  = $con->query("SELECT * FROM meta WHERE id_meta ='$_GET[id_meta]'");
$pecah  = $ambil->fetch_assoc();    ?>  

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
                    <h4 class="card-title mb-0 flex-grow-1">Pengaturan</h4>
                    <div class="text-right">
	                    <a href="?page=pengaturan&aksi=ubah&id_meta=<?php echo $pecah['id_meta'] ?>" class="btn btn-success btn-sm shadow">Ubah</a> 
	                </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
            	
                <table class="table table-sm table-hover table-borderless ">  
                    <tr>                        
                        <td  width="35%">Instansi</td>
                        <td style="text-transform: uppercase;">
                            : <?php echo $pecah['instansi'] ?>
                        </td> 
                    </tr> 
                    <tr>                        
                        <td  width="35%">Nomor Telepon</td>
                        <td style="text-transform: uppercase;">
                            : <?php echo $pecah['telp'] ?>
                        </td> 
                    </tr>   
                    <tr>                        
                        <td  width="35%">Email</td>
                        <td style="text-transform: uppercase;">
                            : <?php echo $pecah['email'] ?>
                        </td> 
                    </tr> 
                    <tr>                        
                        <td  width="35%">Alamat</td>
                        <td style="text-transform: uppercase;">
                            : <?php echo $pecah['alamat'] ?>
                        </td> 
                    </tr> 
                    <tr>                        
                        <td  width="35%">Pimpinan</td>
                        <td style="text-transform: uppercase;">
                            : <?php echo $pecah['pimpinan'] ?>
                        </td> 
                    </tr>   
                    <tr>                        
                        <td  width="35%">Singkatan</td>
                        <td style="text-transform: uppercase;">
                            : <?php echo $pecah['singkat'] ?>
                        </td> 
                    </tr>
                    <tr>                        
                        <td  width="35%">Logo</td>
                        <td style="text-transform: uppercase;">
                            : <a href="assets/images/<?php echo $pecah['logo'] ?>" target="_blank">Lihat Logo</a>
                        </td> 
                    </tr> 
                </table>
                
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row --> 