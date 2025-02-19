<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Surat Keterangan Belum Pernah Menikah</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Data Surat Keterangan Belum Pernah Menikah</h4>
                    <div class="text-right">
	                    <a href="?page=bp_menikah&aksi=tambah&id_jenis_surat=4" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah"><i class="ti ti-plus"></i></a> 
	                </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive"> 
                    <table id="dtTables" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3%" rowspan="2" class="text-center" style="vertical-align: middle;">No.</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">No Surat</th> 
                                <th colspan="3" class="text-center">Pemohon / Warga</th> 
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Hari, Tanggal Pengajuan</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Keperluaan</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Berkas</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Status</th>
                                <th width="5%" class="text-center" rowspan="2" class="text-center" style="vertical-align: middle;">#</th>
                            </tr>
                            <tr>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nomor Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor=1;
                            $id_warga = $_SESSION['warga']['id_warga']; ?>
                            <?php $ambil=$con->query("SELECT * FROM bp_menikah NATURAL JOIN warga WHERE id_warga='$id_warga' ORDER BY id_bp_menikah ASC"); ?>
                            <?php while ($pecah = $ambil->fetch_assoc()) { 
                                $hari = getHari($pecah['tgl_pengajuan']); 
                                $tgl = tgl_indo($pecah['tgl_pengajuan']); 

                                $pengantar_rt = "../admin/assets/berkas/bp_menikah/" . $pecah['pengantar_rt'];
                                $fc_ktp = "../admin/assets/berkas/bp_menikah/" . $pecah['fc_ktp'];
                                $fc_kk = "../admin/assets/berkas/bp_menikah/" . $pecah['fc_kk'];
                                $pernyataan = "../admin/assets/berkas/bp_menikah/" . $pecah['pernyataan'];
                            ?>
                            <tr>      
                                <td class="text-center"><?php echo $nomor; ?></td>  
                                <td class="text-center"><?php echo $pecah['no_bp_menikah']; ?></td>     
                                <td class="text-center"><?php echo $pecah['nik_warga']; ?></td>     
                                <td class="text-center"><?php echo $pecah['nama_warga']; ?></td>     
                                <td class="text-center"><?php echo $pecah['nohp_warga']; ?></td>     
                                <td class="text-center"><?php echo $hari; ?>, <?php echo $tgl; ?></td>     
                                <td class="text-center"><?php echo $pecah['keperluan']; ?></td>     
                                <td class="text-center"> 
                                    <a href="<?= $pengantar_rt ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_bp_menikah']; ?><br>Berkas Pengantar RT">Lihat Berkas</a>
                                    <a href="<?= $fc_ktp ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_bp_menikah']; ?><br>Berkas Fotocopy KTP" class="d-none"></a>
                                    <a href="<?= $fc_kk ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_bp_menikah']; ?><br>Berkas Fotocopy KK" class="d-none"></a>
                                    <a href="<?= $pernyataan ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_bp_menikah']; ?><br>Berkas Pernyataan Belum Pernah Menikah" class="d-none"></a>
                                </td>    
                                <td class="text-center"><?php echo $pecah['status_bp_menikah']; ?></td>    
                                <td class="text-center btn-group">  
                                    <?php if($pecah['status_bp_menikah'] == 'Acc'){ ?>
                                        <a class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cetak" href="page/bp_menikah/cetak.php?id_bp_menikah=<?php echo $pecah['id_bp_menikah'] ?>" target="_blank"><i class="ti ti-printer"></i></a>
                                    <?php } ?>

                                    <a class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Lihat" href="?page=bp_menikah&aksi=lihat&id_bp_menikah=<?php echo $pecah['id_bp_menikah'] ?>"><i class="ti ti-eye"></i></a>

                                    <?php if($pecah['status_bp_menikah'] == 'Pending' | $pecah['status_bp_menikah'] == 'Upload Ulang Berkas'){ ?>
                                        <a class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ubah" href="?page=bp_menikah&aksi=ubah&id_bp_menikah=<?php echo $pecah['id_bp_menikah'] ?>"><i class="ti ti-pencil"></i></a>
                                    <?php } ?>

                                    <?php if($pecah['status_bp_menikah'] == 'Pending' | $pecah['status_bp_menikah'] == 'Ditolak'){ ?>
                                        <a class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus" href="#" onclick="confirmDelete(<?= $pecah['id_bp_menikah']; ?>)"><i class="ti ti-trash"></i></a>
                                    <?php } ?>
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
    function confirmDelete(id_bp_menikah) {
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
                window.location.href = "?page=bp_menikah&aksi=hapus&id_bp_menikah=" + id_bp_menikah;
            }
        });
    }
</script> 