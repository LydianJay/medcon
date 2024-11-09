<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/assets/img/small-logo.png">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/img/small-logo.png">
    <title>
        <?php echo $title; ?>
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?php echo base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo base_url() ?>/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Custom -->
    <style>
        @media (max-width: 600px) {
            .fi-sm {
                font-size: 5em;
            }

            .cfs-sm {
                font-size: var(--bs-btn-font-size);
            }
        }

        @media (min-width: 992px) {
            .fi-lg {
                font-size: 8em;
            }

            .cfs-lg {
                font-size: calc(1.425rem + 1.1vw);
            }
        }
    </style>

</head>

<body class="bg-gray-300">

    <main class="main-content">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-auto">
                            <div class="card card-plain border bg-white">
                                <div class="card-header bg-white pb-0">
                                </div>
                                <div class="card-body bg-white lg-mx-5 sm-mx-0 py-5">
                                    <div class="container-fluid lg-min-vh-25 border rounded bg-gray-100">
                                        <div class="row">
                                            <div class="col d-flex flex-row justify-content-center border-end">
                                                <a href="<?php echo $signup; ?>" class="btn stretched-link">
                                                    <i class="bi fi-lg fi-sm bi-mortarboard-fill"></i>
                                                </a>
                                            </div>
                                            <div class="col d-flex flex-row justify-content-center">
                                                <a href="<?php echo $signupfaculty; ?>" class="btn stretched-link">
                                                    <i class="bi fi-lg fi-sm bi-people-fill"></i>
                                                </a>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col d-flex flex-row justify-content-center border-end">
                                                <a href="<?php echo $signup; ?>" class="btn stretched-link cfs-sm cfs-lg text-gray py-0">Student</a>
                                            </div>
                                            <div class="col d-flex flex-row justify-content-center">
                                                <a href="<?php echo $signupfaculty; ?>" class="btn stretched-link cfs-sm cfs-lg text-gray py-0">Faculty/Staff</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1 bg-white">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="<?php echo site_url(''); ?>" class="text-primary text-gradient font-weight-bold">Log in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>/assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url() ?>/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
