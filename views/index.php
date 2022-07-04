
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="frontend/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url().'assets/frontend/assets/img/apple-touch-icon.png';?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
    <!-- Vendor CSS Files -->
    <link href="<?= base_url().'assets/frontend/assets/vendor/aos/aos.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/frontend/assets/vendor/boxicons/css/boxicons.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/frontend/assets/vendor/glightbox/css/glightbox.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/frontend/assets/vendor/swiper/swiper-bundle.min.css';?>" rel="stylesheet">
  
    <!-- Template Main CSS File -->
  <link href="<?= base_url().'assets/frontend/assets/css/style.css';?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v3.3.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="">www.samm.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+6281330211233</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="<?= base_url(); ?>">S A<span> M M</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a href="<?= base_url('sign-in'); ?>"><span>Login</span></a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>Software Maturity Model</span></h1>
      <h2>Please, sign in to access system!</h2>
      <div class="d-flex">
        <a href="<?= base_url('sign-in'); ?>" class="btn-get-started scrollto">Get Started</a>
        </div>
    </div>
  </section><!-- End Hero -->


  <!-- ======= Footer ======= -->
  <footer id="footer">



    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <?= date('Y') ?><strong><span> S A M M</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Developed by <a href="https://bootstrapmade.com/">Phyranyansen</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url().'assets/frontend/assets/vendor/aos/aos.js';?>"></script>
  <script src="<?= base_url().'assets/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
  <script src="<?= base_url().'assets/frontend/assets/vendor/glightbox/js/glightbox.min.js';?>"></script>
  <script src="<?= base_url().'assets/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js';?>"></script>
  <script src="<?= base_url().'assets/frontend/assets/vendor/php-email-form/validate.js';?>"></script>
  <script src="<?= base_url().'assets/frontend/assets/vendor/purecounter/purecounter.js';?>"></script>
  <script src="<?= base_url().'assets/frontend/assets/vendor/swiper/swiper-bundle.min.js';?>"></script>
  <script src="<?= base_url().'assets/frontend/assets/vendor/waypoints/noframework.waypoints.js';?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url().'assets/frontend/assets/js/main.js';?>"></script>

</body>

</html>