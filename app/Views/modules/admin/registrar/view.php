<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Registration Request</h6>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive px-1 mt-3">
                    <div class="row">
                        <div class="col-lg-5 col-sm-6">
                            <form action="<?php echo site_url('admin/registrar') ?>" method="get">
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
                                </div>
                            </form>
                        </div>


                    </div>
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
                            foreach ($query as $app) {
                            ?>
                                <tr>
                                    <td class=" ps-0 opacity-7 clickable" onclick="window.location.href=`<?php echo site_url('admin/registrar/more') . '/' . $app->userID; ?>`;">
                                        <?php echo $app->lname; ?>
                                    </td>
                                    <td class=" ps-0 opacity-7 clickable" onclick="window.location.href=`<?php echo site_url('admin/registrar/more') . '/' . $app->userID; ?>`;">
                                        <?php echo $app->fname; ?>
                                    </td>
                                    <td class="ps-0  opacity-7 clickable" onclick="window.location.href=`<?php echo site_url('admin/registrar/more') . '/' . $app->userID; ?>`;">
                                        <?php echo $app->mname; ?>
                                    </td>
                                    <td class="ps-0  opacity-7">
                                        <?php echo isset($app->courseABR) ? $app->courseABR : 'N/A'; ?>
                                    </td>
                                    <td class="ps-0  opacity-7">
                                        <?php echo isset($app->year) ? $app->year : 'N/A'; ?>
                                    </td>
                                    <td class="ps-0  opacity-7">
                                        <div class="input-group flex-nowrap input-group-outline">
                                            <input type="text" class="form-control" name="qty" id="<?php echo $app->userID; ?>" value="<?php echo $app->userID; ?>">
                                        </div>
                                    </td>



                                    <td class="ps-1">
                                        <button type="submit" class="btn btn-sm btn-success my-0 rounded"
                                            onclick=" 
                                                    let setID = document.getElementById('<?php echo $app->userID; ?>').value;
                                                    window.location.href=`<?php echo site_url('admin/registrar') . '/' . '/?approve=' . $app->userID; ?>&id=${setID}`; 
                                                ">
                                            Approve
                                        </button>

                                    </td>

                                    <td class="ps-1">
                                        <button type="submit" class="btn btn-sm btn-danger my-0 rounded"
                                            onclick=" 
                                                    window.location.href=`<?php echo site_url('admin/registrar') . '/' . '/?disapprove=' . $app->userID; ?>`; 
                                                ">
                                            Disapprove
                                        </button>
                                    </td>
                                </tr>


                            <?php
                            } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
