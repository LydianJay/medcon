<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Medcon Clinic</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- thirdparty CSS Files -->
  <link href="<?php echo base_url() ?>onepage/assets/thirdparty/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>onepage/assets/thirdparty/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>onepage/assets/thirdparty/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>onepage/assets/thirdparty/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>onepage/assets/thirdparty/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo base_url() ?>onepage/assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo site_url('clinic') ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?php echo base_url() ?>/assets/img/nemsu-logo.png" alt="">
        <h1 class="sitename">Medcon Clinic</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo site_url('appointments') ?>" class="active">Medcon Dashboard<br></a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>


    </div>
  </header>

  <main class="main">






    <section id="services" class="services section light-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
      </div>

      <div class="container">
        <div class="d-flex flex-column justify-content-around flex-nowrap">
          <?php foreach ($table as $d) { ?>
            <div class="card mx-1 mb-5">
              <div class="card-header">
                <p class="fs-5 fw-bold"><?php echo $d->title; ?></p>
              </div>
              <div class="card-body">
                <div class="d-flex flex-row p-2 justify-content-center">
                  <img src="<?php echo base_url('uploads/Clinic/' . hash('md5', $d->title) . '.' . 'png') ?>" class="img-fluid" alt="Img">
                </div>
              </div>
              <div class="card-footer">
                <?php echo $d->description; ?>
              </div>
            </div>
          <?php } ?>
        </div>


      </div>

    </section><!-- /Services Section -->




  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Medcon Clinic</span>
          </a>
          <p>
            Whether you're feeling unwell, need a check-up, or require immediate medical attention,
            our team of trained healthcare professionals is here to assist you.
            We offer a variety of services, including first aid, health assessments, consultations, and basic treatments for common illnesses and injuries.
          </p>

        </div>



      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url() ?>onepage/assets/thirdparty/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>onepage/assets/thirdparty/php-email-form/validate.js"></script>
  <script src="<?php echo base_url() ?>onepage/assets/thirdparty/aos/aos.js"></script>
  <script src="<?php echo base_url() ?>onepage/assets/thirdparty/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url() ?>onepage/assets/thirdparty/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url() ?>onepage/assets/thirdparty/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url() ?>onepage/assets/thirdparty/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo base_url() ?>onepage/assets/thirdparty/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?php echo base_url() ?>onepage/assets/js/main.js"></script>

</body>

</html>