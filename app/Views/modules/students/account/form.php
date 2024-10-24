<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4 mx-lg-10 mx-sm-0">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ms-3 ps-2">Account</h6>
                </div>
            </div>
            <div class="card-body">
                <p class="h2 text-center mb-2 mt-5">Update Password</p>
              
                <div class="table-responsive">
                    <div class="container-fluid d-flex flex-column justify-content-start border-top p-0 py-2 px-1 mt-2">

                        <form action="<?php echo site_url('password/update'); ?>" method="post">
                            <div class="row mb-0 mt-4">
                                <div class="col">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label my-0">Old Password</label>
                                        <input type="password" class="form-control" name="old" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 mt-4">
                                <div class="col">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label my-0">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 mt-4">
                                <div class="col">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label my-0">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <button type="submit" class="btn btn-success btm-sm">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="card-footer border-top border-bottom">
               
                
                
            </div>
      
        </div>
    </div>
</div>