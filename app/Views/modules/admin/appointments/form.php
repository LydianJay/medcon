<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4 mx-lg-10 mx-sm-0">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ms-3 ps-2">Appointment Modify</h6>
                </div>
            </div>
            <div id="pdfContent" class="px-2">
                <!-- Start PDF content -->
                <div class="card-body">
                    <div class="d-flex justify-content-center mt-5">
                        <img src="<?php echo base_url() . 'assets/img/nemsu-logo.png' ?>" alt="Nemsu Logo" class="cimg-lg cimg-sm border-none">
                    </div>
                    <p class="text-center text-bold fs-5 mt-1 mb-0">North Eastern Mindanao State University</p>
                    <p class="text-center text-bold fs-10 py-0">Cantilan Campus</p>


                    <p class="h2 text-center mb-2 mt-5"><?php echo $current->status == 2 ? 'Accomplishment Report' : 'Appointment Form' ?></p>
                    <?php
                    $msg = session()->getFlashdata('generic_error');
                    if ($msg != null) {
                    ?>
                        <p class="fs-5 text-danger text-center mb-2 mt-5"> <?php echo $msg; ?> </p>
                    <?php } ?>
                    <div class="">
                        <div class="container-fluid d-flex flex-column justify-content-start border-top p-0 py-2">
                            <?php
                            $str2 = array(
                                'text-secondary',
                                'text-info',
                                'text-success'
                            );
                            ?>
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


                            </div>




                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-row border border-outline-secondary p-2">
                                        <p class="fs-8 text-bold my-0 text-nowrap">Status:</p>
                                        <p class="fs-10 fw-bold my-0 ms-1 text-nowrap <?php echo $str2[$current->status] ?>">
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


                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-bottom">
                    <?php if ($current->status == 1) { ?>
                        <div class="container-fluid table-responsive">
                            <p class="fs-3 text-dark text-start fw-bold mb-0">Medicine List</p>
                            <form action="<?php echo site_url('admin/modify') . '/' . $param ?>" method="get">
                                <div class="d-flex flex-start flex-row align-items-center">
                                    <div class="input-group flex-nowrap input-group-outline mb-3 border-1">
                                        <label class="form-label">Search</label>
                                        <input type="text" class="form-control" name="search">
                                        <button type="submit" class="btn btn-outline-primary my-0 ms-2 rounded opacity-8">
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
                                            <th class="py-0 ps-1">
                                                Quantity
                                            </th>
                                            <th class="py-0 ps-1">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($meds as $app) { ?>


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
                                                    <?php echo $app->inventoryID; ?>
                                                </td>
                                                <td class="ps-1 opacity-7 td-w-lg">
                                                    <div class="input-group flex-nowrap input-group-outline">
                                                        <input type="number" class="form-control" name="qty" id="<?php echo $app->inventoryID; ?>" value="1">
                                                    </div>
                                                </td>
                                                <!-- This is some abomination of PHP and JavaScript -->
                                                <td class="ps-1 opacity-7">
                                                    <button type="button" class="btn btn-sm btn-outline-primary my-0 rounded opacity-8"
                                                        onclick=" 
                                                    let id  = '<?php echo $app->inventoryID; ?>'; 
                                                    let qty = document.getElementById(id).value;
                                                    window.location.href=`<?php echo site_url('admin/modify') . '/' . $param . '/?search=&id=' . $app->inventoryID . '&qty='; ?>${qty}`; 
                                                ">
                                                        Prescribe
                                                    </button>
                                                </td>

                                            </tr>


                                        <?php } ?>
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

                                            <th class="py-0 ps-1">
                                                Quantity
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cart as $d) { ?>
                                            <tr>
                                                <td class="ps-1 opacity-7">
                                                    <?php echo $d->genericName; ?>
                                                </td>
                                                <td class="ps-1 opacity-7">
                                                    <?php echo $d->brandName; ?>
                                                </td>
                                                <td class="ps-1 opacity-7">
                                                    <?php echo $d->expDate; ?>
                                                </td>
                                                <td class="ps-1 opacity-7">
                                                    <?php echo $d->inventoryID; ?>
                                                </td>
                                                <td class="ps-1 opacity-7">
                                                    <?php echo $d->qty; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-sm btn-primary my-0 rounded opacity-8"
                                    onclick="window.location.href='<?php echo site_url('admin/modify') . '/' . $param . '/?search=&clear=1'; ?>'; ">
                                    Clear
                                </button>


                            </form>
                        </div>
                    <?php } ?>



                    <div class="container-fluid d-flex <?php echo $current->status == 2 ? 'flex-column' : 'flex-row' ?> justify-content-start <?php echo $current->status == 1 ? 'mt-5 border-top' : 'mt-0'; ?>  pt-5 mx-0 px-0">
                        <?php if ($current->status <= 1) { ?>
                            <form action="<?php echo site_url('admin/schedule') . '/' . $id ?>" method="post">
                                <?php if ($current->status == 0) { ?>
                                    <label class="form-label my-0">Schedule Date</label>
                                    <div class="input-group flex-nowrap input-group-outline mb-3">
                                        <input type="date" class="form-control" name="schedule" required>
                                    </div>
                                    <label class="form-label mt-0">Schedule Time</label>
                                    <div class="input-group flex-nowrap input-group-outline mb-5">
                                        <input type="time" class="form-control" name="time" required>
                                    </div>

                                <?php } ?>
                                <button class="btn btn-success" type="submit"> <?php echo $current->status == 1 ? 'Fulfill' : 'Schedule';  ?></button>
                            </form>
                        <?php } else if ($current->status == 2) { ?>



                            <p class="fs-3 text-dark text-start fw-bold mb-0">Prescription Issued</p>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center">
                                    <thead>
                                        <tr class="text-secondary text-start opacity-7">
                                            <?php
                                            foreach ($table_field2 as $field) {
                                            ?>
                                                <th class="p-0">
                                                    <?php echo $field ?>
                                                </th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($prescriptions as $prec) { ?>
                                            <tr>
                                                <td class="p-0 mx-1">
                                                    <?php echo $prec->genericName; ?>
                                                </td>
                                                <td class="p-0 mx-1">
                                                    <?php echo $prec->quantity; ?>
                                                </td>
                                                <td class="p-0 mx-1">
                                                    <?php echo $prec->issueDate; ?>
                                                </td>
                                                <td class="p-0 mx-1">
                                                    <?php echo $current->reqDate; ?>
                                                </td>

                                                <td class="p-0 mx-1">
                                                    <?php echo $prec->fname . ' ' . $prec->lname ?>
                                                </td>
                                            </tr>



                                        <?php } ?>


                                    </tbody>

                                </table>


                                <div class="d-flex flex-column align-items-center justify-content-center mt-8">
                                    <input type="text" class="underline-input">
                                    <p class="fs-10 fw-bold text-dark text-start m-0 opacity-5">Signature over Printed Name</p>
                                </div>

                            </div>

                        <?php } ?>

                    </div>

                    <div class="container-fluid d-lg-block d-none px-5 mt-5">
                        <div class="d-flex flex-row justify-content-between opacity-10">
                            <div class="flex-column d-flex">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="bi bi-geo-alt-fill me-1 opacity-8 text-dark"></i>
                                    <p class="fs-10 fw-bold text-dark my-0 opacity-8">Cantilan, Surigao del Sur 8317</p>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <i class="bi bi-telephone-fill opacity-8 me-1 text-dark"></i>
                                    <p class="fs-10 fw-bold text-dark my-0 opacity-8">086-212-2723</p>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <i class="bi bi-globe-americas opacity-8 me-1 text-dark"></i>
                                    <p class="fs-10 fw-bold text-dark my-0 opacity-8">www.nemsu.edu.ph</p>
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
                </div>

                <!-- END PDF Content -->
            </div>

        </div>
        <?php if ($current->status == 2) { ?>
            <div class="container d-flex flex-row justify-content-center mt-1">
                <button type="button" class="btn btn-primary btn-sm " id="download">DOWNLOAD PDF</button>
            </div>
        <?php } ?>