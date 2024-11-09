<div class="row">
    <div class="col mb-xl-0 mb-4">
        <div class="card mx-lg-10 px-lg-5">
            <div class="card-header my-0 py-0 border-bottom">


                <p class="h2 text-center mb-2 mt-5">Create General Announcement</p>

            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <div class="container-fluid d-flex flex-column justify-content-start">

                        <form action="<?php echo site_url('admin/announcements/postadd'); ?>" method="post">
                            <div class="container px-lg-5 px-sm-0">
                                <label class="form-label my-0">Title</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" placeholder="No medical service ..." name="title" required>
                                </div>
                            </div>
                            <div class="container px-lg-5 px-sm-0 mt-3">
                                <label class="form-label my-0">Content</label>
                                <div class="input-group input-group-outline">
                                    <textarea class="form-control" name="content" rows="10" placeholder="Due to ..."></textarea>
                                </div>
                            </div>
                            <div class="container px-lg-5 px-sm-0 mt-3">
                                <label class="form-label my-0">Date</label>
                                <div class="input-group input-group-outline">
                                    <input type="date" class="form-control" name="date" required>
                                </div>
                            </div>
                            <div class="container px-lg-5 px-sm-0 mt-3 d-flex flex-row justify-content-center">
                                <button type="submit" class="btn btn-success btm-sm">Create</button>
                            </div>
                        </form>



                    </div>


                </div>

            </div>

        </div>
    </div>
</div>