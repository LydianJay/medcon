<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $title; ?></title>

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/img/favicon.png">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- thirdparty CSS Files -->
  <link href="<?php echo base_url() ?>/assets/thirdparty/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/thirdparty/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/thirdparty/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/thirdparty/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/thirdparty/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo base_url() ?>/assets/css/main.css" rel="stylesheet">

  <style>
    .img-custom {
      width: 100px;
      height: 100px;
      max-width: 100px;
      max-height: 100px;
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top border border-bottom">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="<?php echo site_url('dental') ?>" class="logo d-flex align-items-center">
        <img src="<?php echo base_url() ?>/assets/img/nemsu-logo.png" alt="nemsu">
        <h1 class="sitename">Medcon Dental</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo site_url('appointments') ?>" class="active">Medcon Dashboard</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2" data-aos="fade-up" data-aos-delay="400">
            <div class="swiper init-swiper">
              <div class="row">
                <div class="col">
                  <p class="h2 text-primary">Announcements</p>
                </div>
              </div>
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",

                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 1,
                      "spaceBetween": 1
                    }
                  }
                }
              </script>
              <div class="swiper-wrapper">
                <?php foreach ($table as $d) { ?>

                  <div class="swiper-slide">
                    <div class="card">
                      <div class="card-header">
                        <p class="h2"><?php echo $d->title ?></p>
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-row p-2 justify-content-center">
                          <img src="<?php echo base_url('uploads/Dental/' . hash('md5', $d->title) . '.' . 'png') ?>" class="img-fluid img-custom " alt="Img">
                        </div>
                      </div>
                      <div class="card-footer">
                        <?php echo $d->content ?>
                      </div>

                    </div>
                  </div>

                <?php } ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4 order-lg-1">
            <span class="section-subtitle" data-aos="fade-up">Welcome</span>
            <h1 class="mb-4" data-aos="fade-up">
              Northeastern Mindanao State University Dental Clinic
            </h1>
            <p data-aos="fade-up">
              We are proud to offer exceptional dental care exclusively for our university community. Our clinic provides a range of services, from routine check-ups to specialized treatments, ensuring that your oral health is always in great hands.
              No appointments needed—walk-ins are welcome! Simply visit us during clinic hours, and our dedicated team will be ready to assist you. Experience top-quality dental care right here at Northeastern Mindanao State University.
            </p>

          </div>
        </div>
      </div>
    </section><!-- /About Section -->


    <!--Announcment -->
    <section id="pricing" class="pricing section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services Offered</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card bg-white">
              <div class="card-header">
                <p class="fs-2 fw-bold">Dental Check-ups</p>
              </div>
              <div class="card-body">

                <p class="fs-5 text-justify py-5">
                  Regular dental check-ups are essential to maintaining good oral health.
                  At the Northeastern Mindanao State University Dental Clinic, we offer thorough examinations to assess the overall health of your teeth and gums.
                  Our dental cleanings help remove plaque and tartar buildup, reducing the risk of cavities and gum disease.
                </p>

              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card bg-white">
              <div class="card-header">
                <p class="fs-2 fw-bold">Tooth Extraction</p>
              </div>
              <div class="card-body py-5">

                <p class="fs-5 text-justify">
                  At the Northeastern Mindanao State University Dental Clinic, we understand that having a tooth removed can feel overwhelming,
                  but our skilled team ensures the process is as comfortable and painless as possible.
                  Tooth extractions are performed when a tooth is severely damaged or decayed,
                  or when it's necessary to relieve pain and protect your oral health.
                </p>

              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card bg-white">
              <div class="card-header">
                <p class="fs-2 fw-bold">Cavity Treatment</p>
              </div>
              <div class="card-body py-5">

                <p class="fs-5 text-justify">
                  Cavities are a common dental issue, but with early detection and prompt treatment at Northeastern Mindanao State University Dental Clinic,
                  we can restore your tooth to full health. Our fillings help repair decayed teeth, preventing further damage and restoring their normal function.
                  If you’re noticing tooth sensitivity, pain, or visible signs of decay, walk into our clinic for immediate care—no appointment needed!
                </p>

              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="row mt-3">
        <div class="d-flex justify-content-center">
          <p class="fs-5 fw-bold text-secondary">and many more...</p>
        </div>
      </div>

    </section>



  </main>

  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
          <div class="widget">
            <h3 class="widget-heading">About Us</h3>
            <p class="mb-4">
              At our clinic, we believe in creating a comfortable and welcoming environment for every patient.
              From regular check-ups and cleanings to extractions and cavity treatments,
              we are here to support your dental health with personalized, compassionate care.
            </p>
          </div>
        </div>
      </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- thirdparty JS Files -->
  <script src="<?php echo base_url() ?>/assets/thirdparty/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/thirdparty/php-email-form/validate.js"></script>
  <script src="<?php echo base_url() ?>/assets/thirdparty/aos/aos.js"></script>
  <script src="<?php echo base_url() ?>/assets/thirdparty/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/thirdparty/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url() ?>/assets/thirdparty/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/thirdparty/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/thirdparty/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?php echo base_url() ?>/assets/js/main.js"></script>

</body>

</html>