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

    <!-- Custom -->
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
            color: var(--bs-dark) !important;
            border-top-color: transparent !important;
        }

        .input-group.input-group-outline.is-focused .form-label+.form-control {
            color: var(--bs-dark) !important;
            border-top-color: transparent !important;
        }



        .input-group.input-group-outline.is-filled .form-label+.form-control {
            border-color: var(--bs-success) !important;
            border-top-color: transparent !important;
            color: var(--bs-dark) !important;

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
            color: var(--bs-dark);
            display: flex;
            line-height: 1.25 !important;
        }

        .form-check:not(.form-switch) .form-check-input[type="checkbox"]:checked,
        .form-check:not(.form-switch) .form-check-input[type="radio"]:checked {
            border-color: var(--bs-info);
        }

        .form-check:not(.form-switch) .form-check-input[type="checkbox"]:checked {
            background: var(--bs-info);
        }

        .form-check-input {
            appearance: checkbox;
        }

        .form-check:not(.form-switch) .form-check-input[type="checkbox"],
        .form-check:not(.form-switch) .form-check-input[type="radio"] {
            border: 1px solid #d1d7e1;
            margin-top: 0.25rem;
            position: static;
        }

        .text-gradient.text-primary {
            background-image: linear-gradient(195deg, #405aec 0%, #1b3ed8 100%);
        }

        .bg-gradient-primary {
            background-image: linear-gradient(195deg, #405aec 0%, #1b3ed8 100%);
        }
    </style>

</head>

<body class="bg-gray-300">

    <main class="main-content my-5">
        <section>
            <div class="page-header min-vh-100">
                <div class="container-lg">
                    <div class="row">

                        <div class="col-lg-8 col-sm-12 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-auto">
                            <div class="card card-plain border">
                                <div class="card-header bg-white">
                                    <h4 class="font-weight-bolder">Student Register</h4>
                                    <?php
                                    $phone_error    = session()->getFlashdata('phone_error');
                                    $pass_error     = session()->getFlashdata('pass_error');
                                    ?>
                                    <p class="mb-0 <?php if ($phone_error != null) echo 'text-danger' ?>">

                                        <?php

                                        if ($phone_error != null) {
                                            echo $phone_error;
                                        } else {
                                            echo "Please fill the fields";
                                        }
                                        ?>
                                    </p>


                                    <?php if ($pass_error != null) { ?>
                                        <p class="mb-0 text-danger"> <?php echo $pass_error; ?> </p>
                                    <?php } ?>

                                </div>
                                <div class="card-body bg-white">
                                    <form role="form" action="<?php echo $register ?>" enctype="multipart/form-data" method="POST">

                                        <div class="d-flex flex-column justify-content-evenly">

                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label my-0">First Name </label>
                                                <input type="text" class="form-control" name="fname" required>
                                            </div>


                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label my-0">Middle Name</label>
                                                <input type="text" class="form-control" name="mname" required>
                                            </div>


                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label my-0">Last Name</label>
                                                <input type="text" class="form-control" name="lname" required>
                                            </div>


                                        </div>



                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label my-0">Course</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <select class="form-select px-2" name="course" id="course">
                                                        <option value="<?php echo $courseList[0]->courseID; ?>" selected>
                                                            <?php echo $courseList[0]->courseABR; ?>
                                                        </option>

                                                        <?php for ($i = 1; $i < count($courseList); $i++) { ?>
                                                            <option <?php echo "value=" . $courseList[$i]->courseID; ?>>
                                                                <?php echo $courseList[$i]->courseABR; ?>
                                                            </option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="form-label my-0">Year Level</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <select class="form-select px-2" name="year" id="level">
                                                        <?php
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            echo  "<option value='$i'>$i</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>






                                        </div>



                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label my-0">Birthdate</label>
                                                <div class="input-group flex-nowrap input-group-outline mb-3">
                                                    <input type="date" class="form-control" value="birthdate" name="birthdate" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="form-label my-0">Phone Number</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <input type="text" class="form-control" id="i" placeholder="09123456789" name="phone" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row border-top border-1 mt-2">
                                            <p class="fs-5 text-dark opacity-7 mb-1 ">Guardian Contact Information</p>
                                        </div>

                                        <div class="row border-bottom border-1 mb-3">
                                            <div class="col">
                                                <label class="form-label my-0">Guardian Name</label>
                                                <div class="input-group flex-nowrap input-group-outline mb-3">
                                                    <input type="text" class="form-control" name="ename" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="form-label my-0">Phone Number</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <input type="text" class="form-control" placeholder="09123456789" name="ephone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="form-label my-0">COR/ID image <span class="text-secondary opacity-5"> max size: 18mb </span> </label>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="file" class="form-control" name="file" accept="image/*" required>
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" required>
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password2" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm" id="password" required>
                                        </div>
                                        <div class="form-check ps-0 mb-3">
                                            <input class="form-check-input" type="checkbox" name="check" onclick="show_password();">
                                            <label class="form-check-label">
                                                Show password
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Register</button>
                                        </div>
                                    </form>
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

    <script>
        function show_password() {
            var x = document.getElementById("password");
            var y = document.getElementById("password2");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url() ?>/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>