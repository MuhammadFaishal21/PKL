<div id="pegawai_jabatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="pegawai_jabatanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan Pegawai <br> <span class="text-danger"><small>Berdasarkan Jabatan</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/pegawai_jabatan.php" target="_blank"> 
                <div class="modal-body">
                    <div class="mb-1">
                        <label class="form-label">Jabatan</label>
                        <select name="jabatan" class="form-control" required>
                            <option selected disabled>Pilih</option> 
                            <?php
                            $sql_kar=mysqli_query($con, "SELECT * FROM jabatan ORDER BY id_jabatan ASC");
                            while ($kar=mysqli_fetch_array($sql_kar))
                            {
                                echo "<option value='$kar[jabatan]'>$kar[jabatan]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="warga_jk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warga_jkLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan Warga <br> <span class="text-danger"><small>Berdasarkan Jenis Kelamin</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/warga_jk.php" target="_blank"> 
                <div class="modal-body">
                    <div class="mb-1">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jk_warga" class="form-control" required>
                            <option selected disabled>Pilih</option> 
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option> 
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="domisili_periode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="domisili_periodeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan SK Domisili <br> <span class="text-danger"><small>Berdasarkan Periode Tanggal Pengajuan Permohonan</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/domisili_periode.php" target="_blank"> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Dari Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_awal" required="" type="date"> 
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Sampai Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_akhir" required="" type="date"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="usaha_periode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="usaha_periodeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan SK Usaha <br> <span class="text-danger"><small>Berdasarkan Periode Tanggal Pengajuan Permohonan</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/usaha_periode.php" target="_blank"> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Dari Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_awal" required="" type="date"> 
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Sampai Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_akhir" required="" type="date"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="sktm_periode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sktm_periodeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan SK Tidak Mampu <br> <span class="text-danger"><small>Berdasarkan Periode Tanggal Pengajuan Permohonan</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/sktm_periode.php" target="_blank"> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Dari Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_awal" required="" type="date"> 
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Sampai Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_akhir" required="" type="date"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="bp_menikah_periode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bp_menikah_periodeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan SK Belum Pernah Menikah <br> <span class="text-danger"><small>Berdasarkan Periode Tanggal Pengajuan Permohonan</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/bp_menikah_periode.php" target="_blank"> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Dari Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_awal" required="" type="date"> 
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Sampai Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_akhir" required="" type="date"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="skck_periode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="skck_periodeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan Surat Pengantar SKCK <br> <span class="text-danger"><small>Berdasarkan Periode Tanggal Pengajuan Permohonan</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/skck_periode.php" target="_blank"> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Dari Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_awal" required="" type="date"> 
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="mb-1">
                                <label class="form-label">Sampai Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_akhir" required="" type="date"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->