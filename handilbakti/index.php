<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start(); 
include 'admin/inc/koneksi.php';
include 'admin/inc/tanggal.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $meta['instansi'] ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="admin/assets/images/<?= $meta['logo'] ?>" rel="icon">
  <link href="admin/assets/images/<?= $meta['logo'] ?>" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <script src="admin/assets/sweetalert2@11.js"> </script>

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="admin/assets/images/<?= $meta['logo'] ?>" alt="">
        <h1 class="sitename"><?= $meta['instansi'] ?></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php#hero" class="active">Home</a></li>
          <li><a href="index.php#about">Sejarah</a></li>
          <li><a href="index.php#features">Visi dan Misi</a></li> 
          <li><a href="index.php#pricing">Pelayanan Terpadu</a></li> 
          <li><a href="index.php#contact">Kontak Kami</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="warga/login.php">Login</a>

    </div>
  </header>

  <main class="main">

   <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up"><span>Kantor Kelurahan Handil Bakti</span></h1>
           
          <img src="assets/img/kantor.jpg" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background"></section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Sejarah </h3>
            <p align="justify">
              Kelurahan Handil Bakti terletak di Kecamatan Alalak, Kabupaten Barito Kuala, Provinsi Kalimantan Selatan. Informasi spesifik mengenai sejarah kelurahan ini tidak banyak tersedia dalam sumber yang ada. Namun, wilayah Alalak sendiri merupakan salah satu permukiman tertua di Banjarmasin, dengan nama "Alalak" sudah disebutkan dalam Hikayat Banjar yang ditulis terakhir pada tahun 1663. <br><br>
              Kecamatan Alalak berdiri sebelum terbentuknya Kabupaten Barito Kuala dan sebelumnya menjadi bagian dari Kewedanaan Kabupaten Banjar, dengan ibu kota di Kelurahan Berangas.
            </p> 
          </div>

           <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="assets/img/1.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="assets/img/2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="assets/img/3.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section"></section><!-- /Clients Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Visi dan Misi</h2> 
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-between">

          <div class="col-lg-5 d-flex align-items-center">

            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1"> 
                  <div>
                    <h4 class="d-none d-lg-block">Visi</h4>
                    <p align="justify">Mewujudkan kelurahan yang maju, mandiri, dan sejahtera melalui partisipasi aktif masyarakat dan pelayanan publik yang berkualitas.</p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2"> 
                  <div>
                    <h4 class="d-none d-lg-block">Misi</h4>
                    <p align="justify">
                      <ul>
                        <li>Meningkatkan kualitas pelayanan publik yang responsif dan transparan.</li>
                        <li>Mengoptimalkan partisipasi masyarakat dalam perencanaan dan pelaksanaan program pembangunan.</li>
                        <li>Mendorong pertumbuhan ekonomi lokal melalui pemberdayaan usaha mikro, kecil, dan menengah (UMKM).</li>
                        <li>Memelihara dan meningkatkan kualitas lingkungan hidup yang sehat dan bersih.</li>
                        <li>Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan keterampilan.</li>
                      </ul>
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item"></li>
            </ul><!-- End Tab Nav -->

          </div>

            <div class="col-lg-6">

              <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="features-tab-1">
                  <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid">
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="features-tab-2">
                  <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="features-tab-3">
                  <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
                </div><!-- End Tab Content Item -->
              </div>

            </div>

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Features Details Section -->
    <section id="features-details" class="features-details section"></section><!-- /Features Details Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background"></section><!-- /Services Section -->

    <!-- More Features Section -->
    <section id="more-features" class="more-features section"></section><!-- /More Features Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pelayanan Terpadu</h2> 
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="card">
              <div class="card-body">
                <h3>Surat Keterangan Domisili</h3>  
                <p class="small"><u>Persyaratan ;</u></p>
                <ul>
                  <li><i class="bi bi-check"></i> <span>Surat Pengantar RT/RW</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Tanda Penduduk</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Keluarga</span></li> 
                  <li>&nbsp;</li> 
                </ul>                
              </div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="card">
              <div class="card-body">
                <h3>Surat Keterangan Tidak Mampu</h3>  
                <p class="small"><u>Persyaratan ;</u></p>
                <ul>
                  <li><i class="bi bi-check"></i> <span>Surat Pengantar RT/RW</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Tanda Penduduk</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Keluarga</span></li> 
                  <li>&nbsp;</li> 
                </ul>                
              </div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="card">
              <div class="card-body">
                <h3>Surat Keterangan Belum Pernah Menikah</h3>  
                <p class="small"><u>Persyaratan ;</u></p>
                <ul>
                  <li><i class="bi bi-check"></i> <span>Surat Pengantar RT/RW</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Tanda Penduduk</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Keluarga</span></li> 
                  <li><i class="bi bi-check"></i> <span>Surat Penyataan Belum Pernah Menikah</span></li>  
                </ul>                
              </div>
            </div>
          </div><!-- End Pricing Item --> 

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="card">
              <div class="card-body">
                <h3>Surat Keterangan Usaha</h3>  
                <p class="small"><u>Persyaratan ;</u></p>
                <ul>
                  <li><i class="bi bi-check"></i> <span>Surat Pengantar RT/RW</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Tanda Penduduk</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Keluarga</span></li> 
                  <li><i class="bi bi-check"></i> <span>Bukti Lunas PBB</span></li> 
                  <li><i class="bi bi-check"></i> <span>Foto Usaha Minimal 1 Lampiran</span></li> 
                </ul>                
              </div>
            </div>
          </div><!-- End Pricing Item --> 

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="card">
              <div class="card-body">
                <h3>Surat Pengantar SKCK</h3>  
                <p class="small"><u>Persyaratan ;</u></p>
                <ul>
                  <li><i class="bi bi-check"></i> <span>Surat Pengantar RT/RW</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Tanda Penduduk</span></li>
                  <li><i class="bi bi-check"></i> <span>Fotocopy Kartu Keluarga</span></li> 
                  <li><i class="bi bi-check"></i> <span>Fotocopy Akta Kelahiran / Surat Lahir</span></li> 
                  <li><i class="bi bi-check"></i> <span>Pas Foto 4X6</span></li>  
                </ul>                
              </div>
            </div>
          </div><!-- End Pricing Item --> 

        </div>

      </div>

    </section><!-- /Pricing Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section"></section><!-- /Faq Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background"></section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak Kami</h2> 
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p><?= $meta['alamat'] ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Telepon</h3>
              <p><?= $meta['telp'] ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><?= $meta['email'] ?></p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.3705077274963!2d114.6077144!3d-3.2578101999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de42352a5900199%3A0x7eec6f4859a16c8f!2sKantor%20Kelurahan%20Handil%20Bakti!5e0!3m2!1sid!2sid!4v1736885177333!5m2!1sid!2sid" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
          </div><!-- End Google Maps -->
 

        </div>

      </div>


      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>2025</span> <strong class="px-1 sitename">Kantor Kelurahan Handil Bakti</strong><span></span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("toggleIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("ti ti-eye");
            toggleIcon.classList.add("ti ti-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("ti ti-eye-slash");
            toggleIcon.classList.add("ti ti-eye");
        }
    }
</script>

</body>

</html>