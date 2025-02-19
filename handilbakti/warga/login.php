<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include '../admin/inc/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/osen/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jan 2025 07:33:29 GMT -->
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

    <script src="../admin/assets/sweetalert2@11.js"> </script>

    <style type="text/css"> 
        .bg-utama
        {
            background-image: url(../admin/assets/images/bglogin.jpg);
            background-size: 100%;
            background-position: center; 
            background-repeat: no-repeat;

        } 
    </style>  
</head>

<body>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center bg-utama">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0" style="background: rgb(255 255 255 / 69%); ">
                    <a href="index-2.html" class="auth-brand mb-3">
                        <img src="../admin/assets/images/<?= $meta['logo'] ?>" height="24" class="logo-dark">
                        <img src="../admin/assets/images/<?= $meta['logo'] ?>" height="24" class="logo-light">
                    </a>

                    <h3 class="fw-semibold mb-2">Login your account</h3> 

                    <form method="post" onsubmit="return validateForm();" class="text-start mb-3"> 
                        <?php  
                        if (isset($_POST['login'])) 
                        {
                            $uname = $_POST['uname'];
                            $upass = $_POST['upass']; 
                            $ambil = $con->query("SELECT * FROM warga WHERE uname='$uname' AND upass='$upass' AND status_akun='Aktif' "); 
                            $akunyangcocok = $ambil->num_rows; 
                            if ($akunyangcocok==1) 
                            {
                                $akun = $ambil->fetch_assoc();
                                $_SESSION["warga"] = $akun;
                                echo "<div class='alert alert-success'>Login Sukses</div>";
                                echo "<meta http-equiv='refresh' content='1;url=index.php'>"; 
                            }
                            else
                            {
                                echo "<div class='alert alert-danger'>Login Gagal, Periksa akun anda.</div>";
                                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                            }
                        }
                        ?>
                        <div class="mb-3">
                            <label class="form-label" for="example-email">Username</label>
                            <input type="text"  name="uname" class="form-control" placeholder="Enter your username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="example-password">Password</label>
                            <input type="password" name="upass" class="form-control" placeholder="Enter your password">
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-toggle-password" onclick="togglePassword()">
                                <label class="form-check-label" id="checkbox-label" for="checkbox-toggle-password">Lihat password</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" name="login" type="submit">Login</button>
                        </div>

                        <br>

                        <strong>Belum punya akun ? <a href="daftar.php">Klik disini</a> untuk daftar</strong>
                    </form> 

                     
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="../admin/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../admin/assets/js/app.js"></script>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('example-password');
            const checkboxLabel = document.getElementById('checkbox-label');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                checkboxLabel.textContent = 'Sembunyikan password';
            } else {
                passwordField.type = 'password';
                checkboxLabel.textContent = 'Lihat password';
            }
        }
    </script>

</body>


<!-- Mirrored from coderthemes.com/osen/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jan 2025 07:33:29 GMT -->
</html>