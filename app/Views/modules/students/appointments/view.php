<div class="row">
    <div class="col mb-xl-0 mb-4">
        <div class="card mb-4">
            <div class="card-header p-3 pt-2">

                <div class="text-center pt-1">
                    <p class="h1 text-bold text-info text-center mt-4">Appointments</p>
                    <h4 class="mb-0 text-bold"><?php echo ($appointments != null) ? count($appointments) : '0';?></h4>
                </div>
            </div>
            <div class="card-footer border-top">
                <div class="d-flex flex-row justify-content-center">
                    <a href="<?php echo site_url('appointments/form') ?>" class="me-2">
                        <i class="bi bi-plus-square-fill"></i>
                    </a>
                    <a href="<?php echo site_url('appointments/form') ?>">
                        <p class="text-center my-0 ">Add Appointment</p>
                    </a>
                </div>

            </div>
        </div>
        <?php 
            foreach( $appointments as $app) { 
                $status = $app->status;
                $statusStr = '';
                $statusText = '';
                switch($status) {
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
                    <p class="h2 text-start <?php echo $statusText; ?>"> <?php echo $statusStr; ?></p>
                    <p class="fs-4 text-dark text-start border-top"><?php echo $app->name; ?></p>
                    <p class="text-start my-0">Request Date: <?php echo $app->reqDate; ?> </p>
                    <p class="text-start my-0">Scheduled Date: <?php echo $app->schedDate == null ? '-----------' : $app->schedDate; ?> </p>
                    <p class="text-start mt-2 mb-0">Patient reason/description: </p>
                    <p class="fs-5 text-justify"><?php echo $app->description; ?></p>
                </div>
            </div>

           
            
        </div>
        <?php } ?>
    </div>
</div>