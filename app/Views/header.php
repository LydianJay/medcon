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

    <!-- html2pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom -->
    <style>
        @media (max-width: 600px) {
            .fi-sm {
                font-size: 5em;
            }

            .cfs-sm {
                font-size: var(--bs-btn-font-size);
            }

            .cimg-sm {
                max-width: 50px;
                max-height: 50px;
            }

            .img-custom {
                width: 100px;
                height: 100px;
                max-width: 100px;
                max-height: 100px;
            }
        }

        @media (min-width: 992px) {
            .fi-lg {
                font-size: 8em;
            }

            .cfs-lg {
                font-size: calc(1.425rem + 1.1vw);
            }

            .cimg-lg {
                max-width: 100px;
                max-height: 100px;
            }

            .td-w-lg {
                width: 1.5rem;
            }

            .img-custom {
                width: 350px;
                height: 300px;
            }
        }

        tr.clickable {
            cursor: pointer;
        }


        tr.clickable:hover {
            background-color: var(--bs-gray-300);
            transition: background-color 0.525s ease;
        }


        tr.clickable:hover td {
            color: var(--bs-gray-800);
            font-weight: bold;
        }

        td.clickable {
            cursor: pointer;
        }


        td.clickable:hover {
            background-color: var(--bs-gray-300);
            transition: background-color 0.525s ease;
        }


        td.clickable:hover td {
            color: var(--bs-gray-800);
            font-weight: bold;
        }

        .hero-background {
            background-image: url("<?php echo base_url() . 'assets/img/background.jpg' ?>");
        }

        .img-footer {
            width: 80px;
            height: 80px;
            mix-blend-mode: normal;
        }

        .underline-input {
            border: none;
            border-bottom: 1.5px solid #000;
            padding: 0.5px 0;
            outline: none;
            width: 28%;
            text-align: center;
        }
    </style>

</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="<?php echo base_url() ?>/assets/img/big-logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">MEDCON</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <?php
                $module = &$usermodules;


                switch (session()->get('groupID')) {
                    case 1:
                        $module = &$usermodules;
                        break;
                    case 2:
                        $module = &$usermodules;
                        break;
                    case 3:
                        $module = &$doctormodules;
                        break;
                    case 4:
                        $module = &$adminmodules;
                        break;
                    case 5:
                        $module = &$dentistmodules;
                        break;
                }

                $cname = $current_module['name'];

                foreach ($module as $m) {

                    $isActive = (strcmp($cname, $m['name']) == 0);
                ?>

                    <li class="nav-item">
                        <a class="nav-link text-white <?php echo $isActive ? 'active bg-gradient-primary' : '' ?> " href="<?php echo site_url($m['site']) ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi <?php echo $m['icon'] ?>"></i>
                            </div>
                            <span class="nav-link-text ms-1 disabled"><?php echo $m['name']; ?></span>
                        </a>
                    </li>

                <?php
                } ?>



            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <form action="<?php echo site_url('signout'); ?>" method="POST">
                    <button class="btn bg-gradient-primary w-100" type="submit">Sign Out</button>
                </form>
            </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid mt-1 border-bottom border-2">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item ps-3 d-lg-none d-flex align-items-center justify-content-end">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="bi bi-list fs-5 text-bold"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>


        <div class="container-fluid py-4">