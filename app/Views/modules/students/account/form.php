<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4 mx-lg-10 mx-sm-0">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ms-3 ps-2">Account</h6>
                </div>
            </div>
            <div class="card-body">
                <p class="h2 text-center mb-2 mt-5 mb-5">Update Account Data</p>
                <div class="table-responsive">
                    <div class="container-fluid">
                        <p class="fs-3 fw-bold">Update Personal Information</p>
                    </div>
                    <div class="container-fluid d-flex flex-column justify-content-start border-top p-0 py-2 px-1 mt-2">
                        <form action="<?php echo site_url('password/updateinfo'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-0 mt-2">
                                <div class="col">
                                    <div class="input-group input-group-outline mb-3 <?php echo isset($address) ? 'is-filled' : '' ?>">
                                        <label class="form-label my-0">New Address</label>
                                        <input type="text" class="form-control" name="address" required value="<?php echo $address ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 mt-2">
                                <div class="col">
                                    <div class="input-group input-group-outline mb-3 <?php echo isset($address) ? 'is-filled' : '' ?>">
                                        <label class="form-label my-0">New Phone</label>
                                        <input type="text" class="form-control" name="phone" value="<?php echo $phone ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 mt-2">
                                <div class="col">
                                    <label class="form-label my-0">Profile Picture <span class="text-secondary opacity-5"> max size: 18mb </span> </label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="file" class="form-control" name="file" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <button type="submit" class="btn btn-success btm-sm">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <p class="fs-3 fw-bold">Update Credentials</p>
                    </div>
                    <div class="container-fluid d-flex flex-column justify-content-start border-top p-0 py-2 px-1 mt-2">
                        <div class="container-fluid">
                            <p class="fs-7 text-info">REMINDER: password must contains characters and number and atleast 8 characters</p>
                        </div>
                        <form action="<?php echo site_url('password/update'); ?>" method="post">

                            <div class="row mb-0 mt-2">
                                <div class="col">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label my-0">Old Password</label>
                                        <input type="password" class="form-control" name="old" id="password3" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 mt-2">
                                <div class="col">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label my-0">New Password</label>
                                        <input type="password" class="form-control" name="password" id="password2" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 mt-2">
                                <div class="col">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label my-0">Confirm New Password</label>
                                        <input type="password" class="form-control" name="confirm" id="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check ps-0 mb-3">
                                <input class="form-check-input" type="checkbox" name="check" onclick="show_password();">
                                <label class="form-check-label">
                                    Show password
                                </label>
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