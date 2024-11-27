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
            color: var(--bs-info);
            display: flex;
            line-height: 1.25 !important;
        }


        .input-group.input-group-outline .form-control {
            background: none;
            border: 1px solid #1a2dd8;
            border-radius: 0.375rem;
            border-top-left-radius: 0.375rem !important;
            border-bottom-left-radius: 0.375rem !important;
            padding: 0.625rem 0.75rem !important;
            line-height: 1.3 !important;
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
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-8 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-auto">
                            <div class="card card-plain border">
                                <div class="card-header bg-white">
                                    <h4 class="font-weight-bolder">Faculty/Staff Register</h4>
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
                                    <form role="form" action="<?php echo $registerfaculty ?>" enctype="multipart/form-data" method="POST">



                                        <div class="d-flex flex-column justify-content-evenly">

                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label my-0">First Name </label>
                                                <input type="text" class="form-control" name="fname" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : ''  ?>" required>
                                            </div>


                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label my-0">Middle Name</label>
                                                <input type="text" class="form-control" name="mname" value="<?php echo isset($_SESSION['mname']) ? $_SESSION['mname'] : ''  ?>" required>
                                            </div>


                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label my-0">Last Name</label>
                                                <input type="text" class="form-control" name="lname" value="<?php echo isset($_SESSION['lname']) ? $_SESSION['lname'] : ''  ?>" required>
                                            </div>

                                            <label class="form-label my-0">Job Designation</label>
                                            <div class="input-group input-group-outline mb-3">
                                                <select class="form-select px-2" name="group">
                                                    <option value="<?php echo $designation[0]->groupID; ?>" selected>
                                                        <?php echo $designation[0]->groupName; ?>
                                                    </option>
                                                    <?php
                                                    for ($i = 1; $i < count($designation); $i++) {
                                                    ?>
                                                        <option value="<?php echo $designation[$i]->groupID; ?>">
                                                            <?php echo $designation[$i]->groupName; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label my-0">Birthdate</label>
                                                <div class="input-group flex-nowrap input-group-outline mb-3">
                                                    <input type="date" class="form-control" value="birthdate" name="birthdate" value="<?php echo isset($_SESSION['birthdate']) ? $_SESSION['birthdate'] : ''  ?>" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="form-label my-0">Phone Number</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <input type="text" class="form-control" id="i" placeholder="09123456789" name="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''  ?>" required>
                                                </div>
                                            </div>
                                        </div>


                                        <label class="form-label my-0">Attach ID <span class="text-secondary opacity-5"> max size: 18mb </span> </label>

                                        <div class="input-group input-group-outline mb-3">
                                            <input type="file" class="form-control" name="file" accept="image/*" required>
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''  ?>" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''  ?>" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''  ?>" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm" value="<?php echo isset($_SESSION['confirm']) ? $_SESSION['confirm'] : ''  ?>" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1 bg-white">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="<?php echo site_url(''); ?>" class="text-primary text-gradient font-weight-bold">Login</a>
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