<?php  
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include ("../admin/inc/koneksi.php");
include ("../admin/inc/tanggal.php");   
if (!isset($_SESSION['warga'])) 
{
    echo "<script>alert('Maaf pastikan anda sudah login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}  
?> 


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/osen/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jan 2025 07:31:51 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?= $meta['singkat'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../admin/assets/images/<?= $meta['logo'] ?>">

    <!-- Theme Config Js -->
    <script src="../admin/assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="../admin/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="../admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="../admin/assets/dataTables.bootstrap5.min.css">

    <!-- Lightbox CSS -->
    <link href="../admin/assets/lightbox.min.css" rel="stylesheet">


    <script src="../admin/assets/sweetalert2@11.js"> </script>
    <script src="../admin/assets/highcharts.js"> </script>

</head>

<body>

    <?php
    session_start();
    date_default_timezone_set('Asia/Makassar'); 
 
    $nama = $_SESSION['warga']['nama_warga'];
 
    $jam = date('H');
    $ucapan = 'Selamat datang';
 
    if ($jam >= 5 && $jam < 12) {
        $ucapan = 'Selamat pagi';
    } elseif ($jam >= 12 && $jam < 15) {
        $ucapan = 'Selamat siang';
    } elseif ($jam >= 15 && $jam < 18) {
        $ucapan = 'Selamat sore';
    } else {
        $ucapan = 'Selamat malam';
    }
    ?>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu">

            <!-- Brand Logo -->
            <a href="index.php" class="logo">
                <span class="logo-light">
                    <span class="logo-lg" style="text-transform: uppercase; color: white;"><img src="../admin/assets/images/<?= $meta['logo'] ?>" alt="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $meta['singkat'] ?></span>
                    <span class="logo-sm"><img src="../admin/assets/images/<?= $meta['logo'] ?>" alt="small logo"></span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg" style="text-transform: uppercase; color: white;"><img src="../admin/assets/images/<?= $meta['logo'] ?>" alt="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $meta['singkat'] ?></span>
                    <span class="logo-sm"><img src="../admin/assets/images/<?= $meta['logo'] ?>" alt="small logo"></span>
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <button class="button-sm-hover">
                <i class="ti ti-circle align-middle"></i>
            </button>

            <!-- Full Sidebar Menu Close Button -->
            <button class="button-close-fullsidebar">
                <i class="ti ti-x align-middle"></i>
            </button>

            <div data-simplebar>

                <!--- Sidenav Menu -->
                <ul class="side-nav">
                    <li class="side-nav-title">Main Menu</li>

                    <li class="side-nav-item">
                        <a href="index.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-home"></i></span>
                            <span class="menu-text"> Beranda </span> 
                        </a>
                    </li>    

                    <li class="side-nav-item">
                        <a href="?page=warga&aksi=lihat&id_warga=<?= $_SESSION['warga']['id_warga'] ?>" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-users"></i></span>
                            <span class="menu-text"> Profile </span>
                        </a>
                    </li>   

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#DTbbm" aria-expanded="false" aria-controls="DTbbm" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-mail"></i></span>
                            <span class="menu-text"> Surat Keterangan</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="DTbbm">
                            <ul class="sub-menu">
                                <li class="side-nav-item"><a href="?page=domisili" class="side-nav-link"><span class="menu-text">Domisili</span></a></li>
                                <li class="side-nav-item"><a href="?page=usaha" class="side-nav-link"><span class="menu-text">Usaha</span></a></li>
                                <li class="side-nav-item"><a href="?page=tidak_mampu" class="side-nav-link"><span class="menu-text">Tidak Mampu</span></a></li> 
                                <li class="side-nav-item"><a href="?page=bp_menikah" class="side-nav-link"><span class="menu-text">Belum Pernah Menikah</span></a></li> 
                            </ul>
                        </div>
                    </li> 

                    <li class="side-nav-item">
                        <a href="?page=skck" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-mail"></i></span>
                            <span class="menu-text"> Surat Pengantar SKCK </span>
                        </a>
                    </li>   

                </ul>

                <!-- Help Box -->
                <!-- <div class="help-box text-center">
                    <img src="../admin/assets/images/coffee-cup.svg" height="90" alt="Helper Icon Image" />
                    <h5 class="mt-3 fw-semibold fs-16">Unlimited Access</h5>
                    <p class="mb-3 text-muted">Upgrade to plan to get access to unlimited reports</p>
                    <a href="javascript: void(0);" class="btn btn-danger btn-sm">Upgrade</a>
                </div> -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Sidenav Menu End -->
        

        <!-- Topbar Start -->
        <header class="app-topbar">
            <div class="page-container topbar-menu">
                <div class="d-flex align-items-center gap-2">

                    <!-- Brand Logo -->
                    <a href="index.php" class="logo">
                        <span class="logo-light">
                            <span class="logo-lg"><img src="../admin/assets/images/<?= $meta['logo'] ?>" alt="logo"></span>
                            <span class="logo-sm"><img src="../admin/assets/images/<?= $meta['logo'] ?>" alt="small logo"></span>
                        </span>

                        <span class="logo-dark">
                            <span class="logo-lg"><img src="../admin/assets/images/<?= $meta['logo'] ?>" alt="dark logo"></span>
                            <span class="logo-sm"><img src="../admin/assets/images/<?= $meta['logo'] ?>" alt="small logo"></span>
                        </span>
                    </a>

                    <div class="text-dark d-none d-xl-flex gap-2 align-items-center" type="button">
                        <span class="me-2"><strong><?= "$ucapan, $nama"; ?></strong></span> 
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button px-2">
                        <i class="ti ti-menu-deep fs-24"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="ti ti-menu-deep fs-22"></i>
                    </button> 

                    <!-- Mega Menu Dropdown -->
                    <div class="topbar-item d-none d-md-flex"></div> <!-- end topbar-item -->
                </div>

                <div class="d-flex align-items-center gap-2">

                    <!-- Search for small devices -->
                    <div class="topbar-item d-flex d-xl-none">
                        <button class="topbar-link" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                            <i class="ti ti-search fs-22"></i>
                        </button>
                    </div> 

                    <!-- Button Trigger Customizer Offcanvas -->
                    <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" type="button">
                            <i class="ti ti-settings fs-22"></i>
                        </button>
                    </div>

                    <!-- Light/Dark Mode Button -->
                    <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" id="light-dark-mode" type="button">
                            <i class="ti ti-moon fs-22"></i>
                        </button>
                    </div>

                    <!-- User Dropdown -->
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,19" type="button" aria-haspopup="false" aria-expanded="false">
                                <img src="../admin/assets/images/users/avatar-1.jpg" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0"><?= $nama ?></h5>
                                    <h6 class="my-0 fw-normal"><?= $_SESSION['warga']['nik_warga'] ?></h6>
                                </span>
                                <i class="ti ti-chevron-down d-none d-lg-block align-middle ms-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>  

                                <!-- item-->
                                <a href="javascript:void(0);" onclick="logoutConfirmation()" class="dropdown-item active fw-semibold text-danger">
                                    <i class="ti ti-logout me-1 fs-17 align-middle"></i>
                                    <span class="align-middle">Sign Out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Topbar End --> 

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">
            <div class="page-container">
                
                <?php 
                $page = $_GET['page'];
                $aksi = $_GET['aksi'];    

                if ($page == "warga") 
                {   
                    if ($aksi == "ubah") { include "page/warga/ubah.php"; }   
                    if ($aksi == "lihat") { include "page/warga/lihat.php"; }  
                }           

                if ($page == "domisili") 
                {
                    if ($aksi == "") { include "page/domisili/domisili.php"; }
                    if ($aksi == "tambah") { include "page/domisili/tambah.php"; }  
                    if ($aksi == "ubah") { include "page/domisili/ubah.php"; }   
                    if ($aksi == "hapus") { include "page/domisili/hapus.php"; }  
                    if ($aksi == "lihat") { include "page/domisili/lihat.php"; }  
                }            

                if ($page == "usaha") 
                {
                    if ($aksi == "") { include "page/usaha/usaha.php"; }
                    if ($aksi == "tambah") { include "page/usaha/tambah.php"; }  
                    if ($aksi == "ubah") { include "page/usaha/ubah.php"; }   
                    if ($aksi == "hapus") { include "page/usaha/hapus.php"; }  
                    if ($aksi == "lihat") { include "page/usaha/lihat.php"; }  
                }             

                if ($page == "tidak_mampu") 
                {
                    if ($aksi == "") { include "page/tidak_mampu/tidak_mampu.php"; }
                    if ($aksi == "tambah") { include "page/tidak_mampu/tambah.php"; }  
                    if ($aksi == "ubah") { include "page/tidak_mampu/ubah.php"; }   
                    if ($aksi == "hapus") { include "page/tidak_mampu/hapus.php"; }  
                    if ($aksi == "lihat") { include "page/tidak_mampu/lihat.php"; }  
                }              

                if ($page == "bp_menikah") 
                {
                    if ($aksi == "") { include "page/bp_menikah/bp_menikah.php"; }
                    if ($aksi == "tambah") { include "page/bp_menikah/tambah.php"; }  
                    if ($aksi == "ubah") { include "page/bp_menikah/ubah.php"; }   
                    if ($aksi == "hapus") { include "page/bp_menikah/hapus.php"; }  
                    if ($aksi == "lihat") { include "page/bp_menikah/lihat.php"; }  
                }              

                if ($page == "skck") 
                {
                    if ($aksi == "") { include "page/skck/skck.php"; }
                    if ($aksi == "tambah") { include "page/skck/tambah.php"; }  
                    if ($aksi == "ubah") { include "page/skck/ubah.php"; }   
                    if ($aksi == "hapus") { include "page/skck/hapus.php"; }  
                    if ($aksi == "lihat") { include "page/skck/lihat.php"; }  
                }

                if ($page == "") {
                    include "home.php";
                }
                ?>  

            </div> <!-- container -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start">
                            <script>document.write(new Date().getFullYear())</script> © Kelurahan Handil Bakti - By <span class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Muhammad Faishal</span>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <?php include "theme.php"; ?>

    <!-- Vendor js -->
    <script src="../admin/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../admin/assets/js/app.js"></script>

    <!-- Lightbox JS -->
    <script src="../admin/assets/lightbox.min.js"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="../admin/assets/js/pages/dashboard-sales.js"></script>  
    <!-- DataTables JS -->
    <script src="../admin/assets/jquery.dataTables.min.js"></script>
    <script src="../admin/assets/dataTables.bootstrap5.min.js"></script>

    <script>
        function logoutConfirmation() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';  
                }
            });
        }
    </script>

    <script>
        function updateDateTime() {
            const dateTimeElement = document.getElementById('date-time');
            
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];
            
            const now = new Date();
            const dayName = days[now.getDay()];
            const date = now.getDate();
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            dateTimeElement.textContent = `|| ${dayName}, ${date} ${monthName} ${year} || ${hours}:${minutes}:${seconds} ||`;
        }
         
        setInterval(updateDateTime, 1000);
        updateDateTime();  
    </script>

    <script>
        $(document).ready(function () {
            $('#dtTables').DataTable({ 
                responsive: true,
                scrollX: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"  
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () { 
            document.querySelectorAll('.lightgallery').forEach(function (gallery) {
                lightGallery(gallery, {
                    selector: 'a',
                    download: true, 
                    subHtmlSelectorRelative: true  
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () { 
            fetch('grafik.php')
            .then(response => response.json())
            .then(data => { 
                Highcharts.chart('grafik_pengajuan', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Total Pengajuan Surat'
                    },
                    xAxis: {
                        type: 'category',
                        title: {
                            text: 'Jenis Surat'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Total Pengajuan'
                        }
                    },
                    series: [{
                        name: 'Pengajuan',
                        colorByPoint: true,
                        data: data
                    }]
                });
            });
        });
    </script>


</body>


<!-- Mirrored from coderthemes.com/osen/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jan 2025 07:32:41 GMT -->
</html> 