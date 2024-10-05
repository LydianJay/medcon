<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4 mx-lg-10 mx-sm-0">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ms-3 ps-2">Manage Inventory</h6>
                </div>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <p class="fs-4 fw-bold text-dark mb-1">Edit Medicine Entry</p>
                    <div class="container-fluid d-flex flex-column justify-content-start border-top px-1 pt-0">
                    <form role="form" method="POST" action="<?php echo site_url('admin/inventory/apply'); ?>">

                        <div class="row mb-3 mt-4">
                            <div class="col">
                                <label class="form-label my-0" >Generic Name</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="generic" required value="<?php echo $current->genericName; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label my-0" >Brand Name</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="brand" required value="<?php echo $current->brandName; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3 mt-1">
                            <div class="col">
                                <label class="form-label my-0" >Type</label>
                                <div class="input-group input-group-outline">
                                    <select class="form-select px-2" name="type">
                                        <?php for ($i = 0; $i < count($medtype); $i++) { ?>
                                            <option value="<?php echo $i+1; ?>" <?php echo $i == $current->medType-1 ? 'selected' : '';?>>
                                                <?php echo $medtype[$i]; ?>
                                            </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label my-0" >Quantity</label>
                                <div class="input-group input-group-outline">
                                    <input type="number" class="form-control" name="qty" required value="<?php echo $current->qty; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mt-1">
                            <div class="col">
                                <label class="form-label my-0" >Date Acquired</label>
                                <div class="input-group input-group-outline">
                                    <div class="input-group input-group-outline">
                                        <input type="date" class="form-control" name="date" required value="<?php echo $current->recDate; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label my-0" >Expiration Date</label>
                                <div class="input-group input-group-outline">
                                    <input type="date" class="form-control" name="exp" required value="<?php echo $current->expDate; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3 mt-1">
                            <label class="form-label my-0" >Description</label>
                            <div class="input-group input-group-outline">
                                <textarea class="form-control" name="desc" rows="3" required><?php echo $current->description; ?></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-between  pt-3 mb-3 mt-2 px-10">
                            <button class="btn btn-success btn-sm" type="submit">
                                Apply
                            </button>
                        </div>
                        
                    </form>


                    </div>
                </div>
            </div>
            <div class="card-footer border-top border-bottom">
                <div class="container-fluid table-responsive">
                    
                </div>


            </div>
        </div>
    </div>
</div>