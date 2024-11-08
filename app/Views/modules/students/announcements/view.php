<div class="row">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4">
            <div class="card-header p-3 pt-2">

                <div class="text-center pt-1">
                    <p class="h1 text-bold text-info text-center mt-4">General Announcements</p>
                    <h4 class="mb-0 text-bold"><?php echo ($table != null) ? count($table) : '0'; ?></h4>
                </div>
            </div>
            
        </div>
        <?php
        foreach ($table as $app) {
            $status = $app->status;
            $statusStr = '';
            $statusText = '';
            switch ($status) {
                case 0:
                    $statusStr = 'Pending';
                    $statusText = 'text-secondary';
                    break;
                case 1:
                    $statusStr = 'Scheduled';
                    $statusText = 'text-info';
                    break;
                case 2:
                    $statusStr = 'Fulfilled';
                    $statusText = 'text-success';
                    break;
            }
        ?>
            <div class="card mb-5">




                <div class="card-header">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="bi cfs-sm cfs-lg bi-calendar-date"></i>
                    </div>

                </div>

                <div class="card-body">
                    <div class="d-flex flex-column px-1">
                        <p class="h2 text-start <?php echo $statusText; ?>"> <?php echo $app->title; ?></p>
                        <p class="text-start my-0">Date: <?php echo $app->date; ?> </p>
                        <p class="fs-5 text-justify"><?php echo $app->content; ?></p>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>