<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4 mx-lg-10 mx-sm-0">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ms-3 ps-2">Appointment Modify</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center mt-5">
                    <img src="<?php echo base_url() . 'assets/img/NEMSU.png' ?>" alt="Nemsu Logo" class="img-thumbnail cimg-lg cimg-sm">
                </div>
                <p class="text-center text-bold fs-5 mt-1 mb-0">North Eastern Mindanao State University</p>
                <p class="text-center text-bold fs-10 py-0">Orillaneda Street, Cantilan, Surigao del Sur</p>
                

                <p class="h2 text-center mb-2 mt-5">Appointment Form</p>
                <div class="table-responsive">
                    <div class="container-fluid d-flex flex-column justify-content-start border-top p-0 py-2">

                        <div class="row mb-3 mt-4">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Patient Name:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $current->lname . ' ' . $current->fname ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Designation:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $groupInfo->groupName ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Address:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $current->address ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Email:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $current->email ?></p>
                                </div>
                            </div>
                        </div>


                        
                       


                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Phone:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $current->phone ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Birthdate:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $current->bday ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $str2 = array(
                                'text-secondary',
                                'text-info',
                                'text-success'
                            );
                        ?>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Service Type:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap"><?php echo $serviceAssoc[$current->serviceID] ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row border border-outline-secondary p-2">
                                    <p class="fs-8 text-bold my-0 text-nowrap">Status:</p>
                                    <p class="fs-10 my-0 ms-1 text-nowrap <?php echo $str2[$current->status] ?>">
                                        <?php 
                                            $str = array(
                                                'Pending',
                                                'Scheduled',
                                                'Fulfilled'
                                            );
                                            echo $str[$current->status]; 
                                        ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="text-start fs-5 mb-2">Description</div>
                            <div class="text-justify fs-6">
                                <?php echo $current->description ?>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
            <div class="card-footer border-top border-bottom">

                <div class="container-fluid table-responsive">
                    <p class="fs-3 text-dark text-start fw-bold mb-0">Medicine List</p>
                    <form action="<?php echo site_url('admin/modify') . '/' . $param?>" method="get">
                        <div class="d-flex flex-start flex-row align-items-center">
                            <div class="input-group flex-nowrap input-group-outline mb-3 border-1">
                                <label class="form-label">Search</label>
                                <input type="text" class="form-control" name="search">
                                <button type="submit" class="btn btn-outline-primary my-0 ms-2 rounded opacity-8" >
                                    <i class="bi fs-7 bi-search fw-bolder"> 
                                        Search
                                    </i>
                                </button>
                                
                            </div>
                        </div>
                        
                        <table class="table align-items-center border-bottom border-2">
                            <thead>
                                <tr class="text-secondary text-start opacity-7">
                                    <?php
                                    foreach ($table_field as $field) {
                                    ?>
                                        <th class="py-0 ps-1">
                                            <?php echo $field ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($meds as $app) {?>

                                
                                <tr>
                                    <td class="ps-1 opacity-7">
                                        <?php echo $app->genericName; ?>
                                    </td>
                                    <td class="ps-1  opacity-7">
                                        <?php echo $app->brandName; ?>
                                    </td>
                                    <td class="ps-1  opacity-7">
                                        <?php echo $app->expDate; ?>
                                    </td>
                                    <td class="ps-1  opacity-7">
                                        <?php echo $app->inventoryID;?>
                                    </td>
                                    <td class="ps-1 opacity-7">
                                        <button type="button" class="btn btn-sm btn-outline-primary my-0 rounded opacity-8" 
                                        onclick="window.location.href='<?php echo site_url('admin/modify') .'/'. $param . '/?search=&id=' . $app->inventoryID ; ?>'; "
                                        >
                                            Prescribe
                                        </button>
                                    </td>

                                </tr>


                                <?php }?>
                            </tbody>
                        </table>
                        <p class="fs-3 text-dark text-start fw-bold mt-5 mb-0">Prescription</p>
                        <table class="table align-items-center  border-top">
                            <thead>
                                <tr class="text-secondary text-start opacity-7">
                                    <?php
                                    foreach ($table_field as $field) {
                                    ?>
                                        <th class="py-0 ps-1">
                                            <?php echo $field ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                        </table>

                    </form>
                </div>




                <div class="container-fluid d-flex flex-row justify-content-start mt-5 border-top pt-5 mx-0 px-0">
                    <?php if($current->status <= 1) { ?>
                    <form action="<?php echo site_url('admin/schedule') . '/' . $id?>" method="post">
                        <?php if($current->status == 0) { ?>
                        
                
                        <label class="form-label my-0">Schedule Date</label>
                        <div class="input-group flex-nowrap input-group-outline mb-3">
                            <input type="date" class="form-control"  name="schedule" required>
                        </div>
                        <label class="form-label mt-0">Schedule Time</label>
                        <div class="input-group flex-nowrap input-group-outline mb-5">
                            <input type="time" class="form-control"  name="time" required>
                        </div>
                        
                        <?php } ?>
                        <button class="btn btn-success"  type="submit">  <?php echo $current->status == 1 ? 'Fulfill' : 'Schedule';  ?></button>
                    </form>
                    <?php } ?>
                </div>
                
            </div>
      
        </div>
    </div>
</div>