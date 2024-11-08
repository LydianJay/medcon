<div class="row mt-3">
    <div class="col mb-xl-0 mx-xl-8 mx-sm-0 mb-4">
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Medicine Storage Record</h6>
                </div>
                <div class="d-flex flex-row flex-start pt-3">
                    <p class="fs-4 fw-bold text-dark">Add Medicine</p>
                </div>
            </div>
            <div class="card-body border-top border-1">
                <div class="table-responsive p-0">
                    <form action="<?php echo site_url('admin/inventory/addmed'); ?>" method="post">
                        <div class="d-flex flex-row justify-content-evenly">
                            <div class="container px-lg-5 px-sm-0">
                                <label class="form-label my-0">Generic Name</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" placeholder="Paracetamol" name="gname"  required>
                                </div>
                            </div>
                            <div class="container px-lg-5 px-sm-0">
                                <label class="form-label my-0">Brand Name</label>
                                <div class="input-group input-group-outline ">
                                    <input type="text" class="form-control" placeholder="Biogesic" name="bname" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="d-flex flex-row justify-content-evenly">
                            <div class="container px-lg-5 px-sm-0">
                                <label class="form-label my-0">Quantity</label>
                                <div class="input-group input-group-outline">
                                    <input type="number" class="form-control" name="quantity" required>
                                </div>
                            </div>
                            <div class="container px-lg-5 px-sm-0">
                                <label class="form-label my-0">Type</label>
                                <select class="form-select px-2" name="type">
                                    <option value="1" selected>
                                        <?php echo $medtype[0]; ?>
                                    </option>
                                    <?php for ($i = 1; $i < count($medtype); $i++) { ?>
                                        <option value="<?php echo $i+1; ?>">
                                            <?php echo $medtype[$i]; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-evenly">

                            <div class="container px-lg-5 px-sm-0">
                                <label class="form-label my-0">Receive Date</label>
                                <div class="input-group flex-nowrap input-group-outline mb-3">
                                    <input type="date" class="form-control"  name="receive" required>
                                </div>
                            </div>

                            <div class="container px-lg-5 px-sm-0">
                                <label class="form-label my-0">Expiration Date</label>
                                <div class="input-group flex-nowrap input-group-outline mb-3">
                                    <input type="date" class="form-control"  name="expire" required>
                                </div>
                            </div>
                            
                        </div>


                        <div class="container-fluid px-lg-5 px-sm-0 mt-3">
                            <label class="form-label mb-0">Description</label>
                            <div class="input-group input-group-outline">
                                <textarea class="form-control" rows="3" name="description" placeholder="General treatment of common colds... etc..."></textarea>
                            </div>
                        </div>
                        
                        <div class="d-flex flex-row justify-content-center mt-5 pt-3 border-top">
                            <button class="btn btn-success btn-md" type="submit">Add</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>