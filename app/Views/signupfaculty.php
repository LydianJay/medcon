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
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/img/favicon.png">
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
                                    <h4 class="font-weight-bolder">Faculty Sign Up</h4>
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
                                    <form role="form" action="<?php echo $registerfaculty ?>" method="POST">



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




                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1 bg-white">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="<?php echo site_url(''); ?>" class="text-primary text-gradient font-weight-bold">Sign in</a>
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