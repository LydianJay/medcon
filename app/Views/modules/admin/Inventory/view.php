<div class="row mt-3">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Medicine Storage Record</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row border-bottom pb-4">
                    <div class="col-5">
                        <form action="" method="post">
                            <div class="d-flex flex-start flex-row align-items-center">
                                <div class="input-group flex-nowrap input-group-outline mb-3 border-1">
                                    <label class="form-label">Search</label>
                                    <input type="text" class="form-control" name="search" >
                                    <button type="submit" class="btn btn-outline-primary my-0 ms-2 rounded opacity-8">
                                        <i class="bi fs-7 bi-search fw-bolder"> 
                                            Search
                                        </i>
                                    </button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col d-flex flex-row justify-content-end align-items-start">
                        <button type="button" class="btn mb-0 btn-sm btn-outline-info opacity-8 me-2" onclick="window.location.href='<?php echo site_url('admin/inventory/add'); ?>'; ">
                            <p class="fs-10 fw-bolder my-0">Add Entry</p>
                        </button>
                    </div>

                    
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center">
                        <thead>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>