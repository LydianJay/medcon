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
            width: 35%;
            text-align: center;
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
            border-top-color: var(--bs-success) !important;
            border-width: 2.2px;
            outline: none;
            box-shadow: inset 1px 0 var(--bs-success), inset -1px 0 var(--bs-success), inset 0 -1px var(--bs-success);
        }



        .input-group.input-group-outline.is-focused .form-label {
            color: var(--bs-primary) !important;
            border-color: var(--bs-success) !important;
        }

        .input-group.input-group-outline.is-filled .form-label+.form-control {
            border-color: var(--bs-success) !important;
            border-top-color: transparent !important;
            box-shadow: inset 1px 0 var(--bs-success), inset -1px 0 var(--bs-success), inset 0 -1px var(--bs-success);
        }



        .input-group.input-group-outline.is-focused .form-label:before,
        .input-group.input-group-outline.is-focused .form-label:after,
        .input-group.input-group-outline.is-filled .form-label:before,
        .input-group.input-group-outline.is-filled .form-label:after {
            border-top-color: var(--bs-success);
            box-shadow: inset 0 1px var(--bs-success);
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
                    <button class="btn bg-gradient-primary w-100" type="submit">Log Out</button>
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