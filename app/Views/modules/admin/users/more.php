<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4 mx-lg-10 mx-sm-0">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ms-3 ps-2">Users</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center mt-5">
                    <img src="<?php echo base_url() . 'assets/img/nemsu-logo.png' ?>" alt="Nemsu Logo" class="img-thumbnail cimg-lg cimg-sm">
                </div>
                <p class="text-center text-bold fs-5 mt-1 mb-0">North Eastern Mindanao State University</p>
                <p class="text-center text-bold fs-10 py-0">Cantilan Campus</p>

                <p class="h2 text-center mb-2 mt-5">User Personal Information</p>

                <div class="table-responsive">
                    <div class="container-fluid d-flex flex-column justify-content-start border-top p-0 py-2">

                        <div class="row mb-3">

                            <div class="col-6 mx-auto">
                                <div class="d-flex flex-row border border-outline-secondary p-2 justify-content-center">
                                    <img src="<?php echo $profile ?>" class="img-custom" alt="Profile Picture Not Available">
                                </div>
                            </div>


                        </div>

                        <div class="row mb-3 mt-4">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">User Name:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $info->lname . ', ' . $info->fname . ' ' . $info->mname ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Designation:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $info->groupName ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Address:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $info->address ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Email:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $info->email ?></p>
                                </div>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Phone:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $info->phone ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Birthdate:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $info->bday ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">ID:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $info->schoolID ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- If a student -->
                        <?php
                        if ($info->groupID == 1) {
                        ?>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="d-flex flex-row border border-outline-secondary p-2">
                                        <p class="fs-8 text-bold my-0 text-nowrap">Course:</p>
                                        <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $schoolinfo->courseName ?></p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-row border border-outline-secondary p-2">
                                        <p class="fs-8 text-bold my-0 text-nowrap">Year:</p>
                                        <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $schoolinfo->year ?></p>
                                    </div>
                                </div>
                            </div>



                        <?php } else { ?>

                            <div class="row mb-3">
                                <div class="col">
                                    <p class="fs-8 text-bold my-0 text-nowrap"><?php echo $info->groupID == 1 ? 'School ID' : 'COR' ?></p>
                                    <div class="d-flex flex-row border border-outline-secondary p-2 justify-content-center">
                                        <img src="<?php echo $cor ?>" class="img-fluid" alt="COR">
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>