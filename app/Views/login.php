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
        <?php
        echo $title;
        ?>
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

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo base_url() ?>/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

    <style>
        :root {
            --bs-blue: #63B3ED;
            --bs-indigo: #596CFF;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #F56565;
            --bs-orange: #fd7e14;
            --bs-yellow: #FBD38D;
            --bs-green: #81E6D9;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #f0f2f5;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            /* --bs-primary: #e91e63; */
            --bs-primary: #1a2dd8;
            --bs-secondary: #7b809a;
            --bs-success: #4CAF50;
            --bs-info: #1A73E8;
            --bs-warning: #fb8c00;
            --bs-danger: #F44335;
            --bs-light: #f0f2f5;
            --bs-dark: #344767;
            --bs-white: #fff;
            --bs-dark-blue: #1A237E;
            --bs-primary-rgb: 125, 25, 25;
            --bs-secondary-rgb: , 128, 154;
            --bs-success-rgb: 76, 175, 80;
            --bs-info-rgb: 26, 115, 232;
            --bs-warning-rgb: 251, 140, 0;
            --bs-danger-rgb: 244, 67, 53;
            --bs-light-rgb: 240, 242, 245;
            --bs-dark-rgb: 52, 71, 103;
            --bs-white-rgb: 255, 255, 255;
            --bs-dark-blue-rgb: 26, 35, 126;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: , 128, 154;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: "Roboto", Helvetica, Arial, sans-serif;
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #7b809a;
            --bs-body-bg: #fff;
            --bs-border-width: 1px;
            --bs-border-style: solid;
            --bs-border-color: #dee2e6;
            --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
            --bs-border-radius: 0.375rem;
            --bs-border-radius-sm: 0.125rem;
            --bs-border-radius-lg: 0.5rem;
            --bs-border-radius-xl: 0.75rem;
            --bs-border-radius-2xl: 1rem;
            --bs-border-radius-pill: 50rem;
            --bs-link-color: #272d86;
            --bs-link-hover-color: #3e6094;
            --bs-code-color: #d63384;
            --bs-highlight-bg: #fcf8e3;
        }

        .text-gradient.text-primary {
            background-image: linear-gradient(195deg, #bea7af, #1b57d8);
        }

        .bg-gradient-primary {
            background-image: linear-gradient(195deg, #405aec 0%, #1b3ed8 100%);
        }

        .hero-background {
            background-image: url("<?php echo base_url() . 'assets/img/background.jpg' ?>");
        }

        .img-footer {
            width: 80px;
            height: 80px;
            mix-blend-mode: normal;
        }

        .input-group.input-group-outline .form-control {
            background: none;
            border: 1px solid var(--bs-primary);
            border-radius: 0.375rem;
            border-top-left-radius: 0.375rem !important;
            border-bottom-left-radius: 0.375rem !important;
            padding: 0.625rem 0.75rem !important;
            line-height: 1.3 !important;
        }



        .input-group.input-group-outline.is-focused .form-label+.form-control {
            border-color: var(--bs-success) !important;
            border-top-color: transparent !important;
            outline: none;
            box-shadow: inset 1px 0 var(--bs-success), inset -1px 0 var(--bs-success), inset 0 -1px var(--bs-success);
        }



        .input-group.input-group-outline.is-focused .form-label {
            color: var(--bs-primary) !important;
            border-top-color: transparent !important;
        }

        .input-group.input-group-outline.is-focused .form-label+.form-control {
            color: var(--bs-primary) !important;
            border-top-color: transparent !important;
        }



        .input-group.input-group-outline.is-filled .form-label+.form-control {
            border-color: var(--bs-success) !important;
            border-top-color: transparent !important;
            color: var(--bs-success) !important;

            box-shadow: inset 1px 0 var(--bs-success), inset -1px 0 var(--bs-success), inset 0 -1px var(--bs-success);
        }



        .input-group.input-group-outline.is-focused .form-label:before,
        .input-group.input-group-outline.is-focused .form-label:after,
        .input-group.input-group-outline.is-filled .form-label:before,
        .input-group.input-group-outline.is-filled .form-label:after {
            border-top-color: var(--bs-success);
            box-shadow: inset 0 1px var(--bs-success);
        }


        .input-group.input-group-outline.is-focused .form-label,
        .input-group.input-group-outline.is-filled .form-label {
            width: 100%;
            height: 100%;
            font-size: 0.6875rem !important;
            color: var(--bs-info);
            display: flex;
            line-height: 1.25 !important;
        }
    </style>


</head>

<body class="bg-gray-200 mb-1">
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-100 hero-background">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4 justify-content-center">
                                            <img src="<?php echo base_url() . 'assets/img/big-logo.png' ?>" alt="Nemsu Logo" class="img-thumbnail mx-auto">
                                        </div>
                                        <div class="col-4"></div>
                                    </div>

                                    <h2 class="text-white text-center font-weight-bolder">MEDCON</h2>
                                    <h3 class="text-white font-weight-bolder text-center mt-1">Log In</h3>
                                    <?php
                                    $error_auth    = session()->getFlashdata('error_auth');
                                    if ($error_auth != null) {
                                    ?>
                                        <div class="d-flex flex-row justify-content-center">
                                            <p5 class="text-warning text-center mt-2 mb-0 ">
                                                <?php echo $error_auth; ?>
                                            </p5>
                                        </div>

                                    <?php } ?>


                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" class="text-start" action="<?php echo $signin ?>">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Log in</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="<?php echo $option ?>" class="text-primary text-gradient font-weight-bold">Register</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-0 w-100 " style="background-color: rgba(255, 255, 255, 0.25);">
                <div class="container-fluid d-lg-block d-none px-5 ">
                    <div class="d-flex flex-row justify-content-between opacity-10">
                        <div class="flex-column d-flex">
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-geo-alt-fill me-1 opacity-8 text-white"></i>
                                <p class="fs-10 fw-bold text-white my-0 opacity-8">Cantilan, Surigao del Sur 8317</p>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-telephone-fill opacity-8 me-1 text-white"></i>
                                <p class="fs-10 fw-bold text-white my-0 opacity-8">086-212-2723</p>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-globe-americas opacity-8 me-1 text-white"></i>
                                <p class="fs-10 fw-bold text-white my-0 opacity-8">www.nemsu.edu.ph</p>
                            </div>
                        </div>

                        <div class="flex-row d-flex">
                            <div class="justify-content-center">
                                <img src="<?php echo base_url() . 'assets/img/alpas.png' ?>" alt="alpas" class="mx-auto img-footer">
                            </div>
                            <div class="justify-content-center">
                                <img src="<?php echo base_url() . 'assets/img/alpas2.png' ?>" alt="alpas" class="mx-auto img-footer">
                            </div>
                            <div class="justify-content-center">
                                <img src="<?php echo base_url() . 'assets/img/alpas3.png' ?>" alt="alpas" class="mx-auto img-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>/assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        <?php if (isset($msg)) { ?>
            alert('<?php echo $msg; ?>');
        <?php } ?>
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url() ?>/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>