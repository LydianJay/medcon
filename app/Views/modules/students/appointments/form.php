<div class="row">
    <div class="col mb-xl-0 mb-4">
        <div class="card mx-lg-10 px-lg-5">
            <div class="card-header my-0 py-0 border-bottom" >
                <div class="d-flex justify-content-center mt-5">
                    <img src="<?php echo base_url() . 'assets/img/NEMSU.png' ?>" alt="Nemsu Logo" class="img-thumbnail cimg-lg cimg-sm">
                </div>
                <p class="text-center text-bold fs-5 mt-1 mb-0">North Eastern Mindanao State University</p>
                <p class="text-center text-bold fs-10 py-0">Orillaneda Street, Cantilan, Surigao del Sur</p>
                

                <p class="h2 text-center mb-2 mt-5">Appointment Form</p>
                

            </div>
            
            <div class="card-body">
                <div class="table-responsive">


                    <div class="container-fluid d-flex flex-column justify-content-start">
                        
                        <div class="row mb-3 mt-2">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Patient Name:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $username ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Designation:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo session()->get('groupName') ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mt-2">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Address:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo session()->get('address') ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Email:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo session()->get('email') ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mt-2">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Phone:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo session()->get('phone') ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Birthdate:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo session()->get('birthdate') ?></p>
                                </div>
                            </div>
                        </div>

                        <form action="<?php echo site_url('appointments/submit') ?>" method="post">
                            <div class="row justify-content-start">
                                <div class="col-lg-2">
                                    <label class="form-label my-0 text-center">Service Type</label>
                                    <div class="input-group input-group-outline mb-3">
                                        <select class="form-select px-2" name="service">
                                            <option value="<?php echo $serviceList[0]->serviceID; ?>" selected>
                                                <?php echo $serviceList[0]->serviceName; ?>
                                            </option>
                                            <?php
                                            for ($i = 1; $i < count($serviceList); $i++) {
                                            ?>
                                                <option value="<?php echo $serviceList[$i]->serviceID; ?>">
                                                    <?php echo $serviceList[$i]->serviceName; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                        
                            </div>
                            <div class="row">
                                <label class="form-label my-0">Description</label>
                                <div class="input-group input-group-outline mb-3">
                                    <textarea class="form-control" rows="10" name="description" placeholder="request kog tambal kay sakit akong heart :> "></textarea>
                                </div>
                                <div class="text-center mt-2 d-flex flex-row justify-content-center">
                                    <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-lg-25 w-sm-50 mt-1 mb-0">Submit Request</button>
                                </div>
                            </div>
                        </form>

             
                    </div>
                    

                </div>
                
            </div>

        </div>
    </div>
</div>