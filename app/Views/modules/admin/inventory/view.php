<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Medicine Storage Record</h6>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive px-1 mt-3">
                    <div class="row">
                        <div class="col-lg-8 col-sm-6">
                            <form action="<?php echo site_url('admin/inventory') ?>" method="get" id="form">
                                <div class="d-flex flex-start flex-row align-items-center">
                                    <div class="input-group flex-nowrap input-group-outline mb-3 border-1">
                                        <label class="form-label text-nowrap">Search</label>
                                        <input type="text" class="form-control" name="search">
                                        <button type="submit" class="btn btn-outline-primary my-0 ms-2 rounded opacity-8">
                                            <i class="bi fs-7 bi-search fw-bolder">
                                                Search
                                            </i>
                                        </button>

                                    </div>
                                    <div class="input-group flex-nowrap input-group-outline mb-3 ms-3 border-1">

                                        <div class="row">

                                            <select class="form-select px-4" name="expiration" onchange="go()">
                                                <option value="1" <?php if ($selection == 1) echo 'selected'; ?>>
                                                    Good
                                                </option>
                                                <option value="0" <?php if ($selection == 0) echo 'selected'; ?>>
                                                    Expired
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>


                        <div class="col d-flex flex-row justify-content-end align-items-start">
                            <button type="button" class="btn mb-0 btn-sm btn-outline-info opacity-8 me-2" onclick="window.location.href='<?php echo site_url('admin/inventory/add'); ?>';">
                                <p class="fs-7 fw-bolder my-0">Add</p>
                            </button>
                        </div>
                    </div>
                    <table class="table align-items-center">
                        <thead>
                            <tr class="text-secondary text-start opacity-7">
                                <?php

                                $type = ['Tablet', 'Capsule', 'Liquid', 'Other'];

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


                            $currentDate = explode('-', date('Y-m-d'));
                            $currentDateIntVal = 0;
                            $currentIdx = count($currentDate) - 1;

                            for ($i = 0; $i < count($currentDate); $i++) {
                                $currentDateIntVal += (($i + 1) ** 10) * intval($currentDate[$currentIdx - $i]);
                            }


                            foreach ($query as $app) {
                                $expDate = explode('-', $app->expDate);
                                $expDateIntVal = 0;
                                $expIdx = count($expDate) - 1;
                                for ($i = 0; $i < count($expDate); $i++) {
                                    $expDateIntVal += (($i + 1) ** 10) * intval($expDate[$expIdx - $i]);
                                }

                                if($selection == 1 || $selection == '1') {
                                    if ($currentDateIntVal >= $expDateIntVal) continue;
                                }
                                else {
                                    if ($currentDateIntVal < $expDateIntVal) continue;
                                }
                            ?>
                                <tr>
                                    <td class="ps-0 opacity-7">
                                        <?php
                                        // echo $currentDateIntVal . ' ' . $expDateIntVal;
                                        echo $app->genericName;
                                        ?>
                                    </td>
                                    <td class="ps-0  opacity-7">
                                        <?php echo $app->brandName; ?>
                                    </td>
                                    <td class="ps-0  opacity-7">
                                        <?php echo $type[$app->medType - 1]; ?>
                                    </td>
                                    <td class="ps-0  opacity-7">
                                        <?php echo $app->qty; ?>
                                    </td>

                                    <td class="ps-0  opacity-7">
                                        <?php echo $app->recDate; ?>
                                    </td>

                                    <td class="ps-0  opacity-7">
                                        <?php echo $app->expDate; ?>
                                    </td>

                                    <td class="ps-0  opacity-7">
                                        <p class="fs-7 opacity-7" name="id"> <?php echo $app->inventoryID; ?> </p>
                                    </td>

                                    <td class="ps-1">
                                        <button type="submit" class="btn btn-sm btn-secondary my-0 rounded"
                                            onclick=" 
                                                    window.location.href=`<?php echo site_url('admin/inventory/modify') . '/' . '/?id=' . $app->inventoryID; ?>`; 
                                                ">
                                            Edit
                                        </button>

                                    </td>

                                    <td class="ps-1">
                                        <form method="post" action="<?php echo site_url('admin/inventory/delete'); ?>">
                                            <!-- Hidden Input used for sending data to POST -->
                                            <input type="number" name="id" hidden value="<?php echo $app->inventoryID; ?>">
                                            <button type="submit" class="btn btn-sm btn-danger my-0 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>


                            <?php $id++;
                            } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>