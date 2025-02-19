<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold mb-0">Surat Pengantar SKCK</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Data Surat Pengantar SKCK</h4>
                    <div class="text-right">
	                    <a href="?page=skck&aksi=tambah&id_jenis_surat=5" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah"><i class="ti ti-plus"></i></a> 
	                </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive"> 
                    <table id="dtTables" class="table table-striped table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3%" rowspan="2" class="text-center" style="vertical-align: middle;">No.</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">No Surat</th> 
                                <th colspan="3" class="text-center">Pemohon / Warga</th> 
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Hari, Tanggal Pengajuan</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Keterangan</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Berkas</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Status</th>
                                <th width="5%" class="text-center" rowspan="2" class="text-center" style="vertical-align: middle;">#</th>
                            </tr>
                            <tr>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">No. Telepon</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1; ?>
                            <?php $ambil=$con->query("SELECT * FROM skck NATURAL JOIN warga ORDER BY id_skck ASC"); ?>
                            <?php while ($pecah = $ambil->fetch_assoc()) { 
                                $hari = getHari($pecah['tgl_pengajuan']); 
                                $tgl = tgl_indo($pecah['tgl_pengajuan']); 

                                $pengantar_rt = "assets/berkas/skck/" . $pecah['pengantar_rt'];
                                $fc_ktp = "assets/berkas/skck/" . $pecah['fc_ktp'];
                                $fc_kk = "assets/berkas/skck/" . $pecah['fc_kk'];
                                $fc_akta = "assets/berkas/skck/" . $pecah['fc_akta'];
                                $pas_foto = "assets/berkas/skck/" . $pecah['pas_foto'];
                            ?>
                            <tr style="vertical-align: top;">      
                                <td class="text-center"><?php echo $nomor; ?></td>  
                                <td class="text-center"><?php echo $pecah['no_skck']; ?></td>     
                                <td class="text-center"><?php echo $pecah['nik_warga']; ?></td>     
                                <td class="text-center"><?php echo $pecah['nama_warga']; ?></td>     
                                <td class="text-center"><?php echo $pecah['nohp_warga']; ?></td>            
                                <td class="text-center"><?php echo $hari; ?>, <?php echo $tgl; ?></td>     
                                <td>
                                    <?php echo nl2br(htmlspecialchars($pecah['keterangan'])); ?>
                                </td>  
                                <td class="text-center"> 
                                    <a href="<?= $pengantar_rt ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_skck']; ?><br>Berkas Pengantar RT">Lihat Berkas</a>
                                    <a href="<?= $fc_ktp ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_skck']; ?><br>Berkas Fotocopy KTP" class="d-none"></a>
                                    <a href="<?= $fc_kk ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_skck']; ?><br>Berkas Fotocopy KK" class="d-none"></a>
                                    <a href="<?= $fc_akta ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_skck']; ?><br>Berkas Fotocopy Akta Kelahiran" class="d-none"></a>
                                    <a href="<?= $pas_foto ?>" data-lightbox="berkas-<?= $nomor ?>" data-title="No Surat : <?php echo $pecah['no_skck']; ?><br>Berkas Pas Foto" class="d-none"></a>
                                </td>    
                                <td class="text-center"><?php echo $pecah['status_skck']; ?></td>    
                                <td class="text-center btn-group">  
                                    <a class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cetak" href="page/skck/cetak.php?id_skck=<?php echo $pecah['id_skck'] ?>" target="_blank"><i class="ti ti-printer"></i></a>
                                    <a class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Lihat" href="?page=skck&aksi=lihat&id_skck=<?php echo $pecah['id_skck'] ?>"><i class="ti ti-eye"></i></a>
                                    <a class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ubah" href="?page=skck&aksi=ubah&id_skck=<?php echo $pecah['id_skck'] ?>"><i class="ti ti-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus" href="#" onclick="confirmDelete(<?= $pecah['id_skck']; ?>)"><i class="ti ti-trash"></i></a>
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
    function confirmDelete(id_skck) {
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
                window.location.href = "?page=skck&aksi=hapus&id_skck=" + id_skck;
            }
        });
    }
</script> 