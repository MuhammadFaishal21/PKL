

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
    <div class="col-sm-12 col-lg-12">
        <div class="card d-block">
            <div class="card-body">
                <h5 class="card-title">Grafik Total Pengajuan Anda (ACC)</h5>
                <h6 class="card-subtitle text-muted"><?= $_SESSION['warga']['nama_warga'] ?></h6>
            </div> 
            <div class="card-body">
                <div id="grafik_pengajuan" style="width:100%; height:400px;"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div><!-- end col -->   


    
</div> <!-- end row-->  