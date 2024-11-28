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



                        <div class="row mb-3 mt-4">

                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">User Name:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo strtoupper($info->lname) . ', ' . $info->fname . ' ' . $info->mname ?></p>
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





                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">School ID:</p>
                                    <input type="text" class="form-control py-0 ms-1 fs-10" id="id" value="<?php echo $info->schoolID ?>" required>
                                </div>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-success my-0 rounded"
                                    onclick=" 
                                                let setID = document.getElementById('id').value;
                                                window.location.href=`<?php echo site_url('admin/registrar') . '/' . '/?approve=' . $info->userID; ?>&id=${setID}`; 
                                            ">
                                    Set
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3 mt-3">

                            <div class="col">
                                <p class="fs-8 text-bold my-0 text-nowrap">COR/School ID:</p>
                                <div class="d-flex flex-row border border-outline-secondary p-2 justify-content-center">
                                    <img src="<?php echo $info->groupID == 1 ? $cor : $img ?>" class="img-fluid" alt="COR/IMG">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
