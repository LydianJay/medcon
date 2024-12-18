<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Appointments</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <table class="table align-items-center">
                        <thead>
                            <tr class="text-secondary text-start opacity-7">
                                <?php
                                foreach ($table_field as $field) {
                                ?>
                                    <th class="p-0">
                                        <?php echo $field ?>
                                    </th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $id = 0;
                            foreach ($appointments as $app) {
                            ?>
                                <tr>
                                    <td class="p-0 mx-1">
                                        <?php echo $app->lname . ', ' . $app->fname; ?>
                                    </td>
                                    <td class="p-0">
                                        <?php echo $serviceAssoc[$app->serviceID]; ?>
                                    </td>
                                    <td class="p-0">
                                        <?php echo $app->reqDate; ?>
                                    </td>
                                    <td class="p-0">
                                        <?php echo $app->schedDate == null ? 'N/A' : $app->schedDate; ?>
                                    </td>

                                    <?php
                                    $str = array(
                                        'Pending',
                                        'Scheduled',
                                        'Fulfilled'
                                    );

                                    $textSettings = [
                                        'btn-secondary',
                                        'btn-info',
                                        'btn-success',
                                    ];
                                    ?>

                                    <td class="p-0 py-2 d-grid gap-2">

                                        <button type="button" class="btn btn-sm mb-0 <?php echo $textSettings[$app->status]; ?> text-white" onclick="window.location.href='<?php echo site_url('admin/modify') . '/' . $id; ?>'; ">
                                            <?php echo $str[$app->status]; ?>
                                        </button>

                                    </td>

                                </tr>

                            <?php 
                            $id++; } ?>


                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-footer d-sm-none">
                <p class="text-center fs-5 text-bold text-danger opacity-8 my-0 py-0">Rotate your phone to see better</p>
            </div>

        </div>


    </div>
</div>
