</div>


</main>
<footer class="footer position-absolute bottom-2 w-100">
    <div class="container-fluid px-7 d-lg-block d-none px-5">
        <div class="d-flex flex-row justify-content-between">
            <div class="ms-10 flex-column d-flex align-items-start">
                <div class="d-flex flex-row align-items-center">
                    <i class="bi bi-geo-alt-fill opacity-10 me-1 text-dark"></i>
                    <p class="fs-5 fw-bolder text-dark my-0 opacity-7">Cantilan, Surigao del Sur 8317</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <i class="bi bi-telephone-fill opacity-10 me-1 text-dark"></i>
                    <p class="fs-5 fw-bolder text-dark my-0 opacity-7">086-212-2723</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <i class="bi bi-globe-americas opacity-10 me-1 text-dark"></i>
                    <p class="fs-5 fw-bolder text-dark my-0 opacity-7">www.nemsu.edu.ph</p>
                </div>
            </div>

            <div class="flex-row d-flex">
                <div class="justify-content-center">
                    <img src="<?php echo base_url() . 'assets/img/alpas.png' ?>" alt="alpas" class="mx-auto img-footer">
                </div>
                <div class="justify-content-center">
                    <img src="<?php echo base_url() . 'assets/img/alpas2.png' ?>" alt="alpas" class="mx-auto img-footer">
                </div>
                <div class="justify-content-center">
                    <img src="<?php echo base_url() . 'assets/img/alpas3.png' ?>" alt="alpas" class="mx-auto img-footer">
                </div>
            </div>
        </div>
    </div>
</footer>

<!--   Core JS Files   -->
<script src="<?php echo base_url() ?>/assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>


<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url() ?>/assets/js/material-dashboard.min.js?v=3.1.0"></script>

<script>
    <?php if (isset($msg)) { ?>
        alert('<?php echo $msg; ?>');
    <?php } ?>
</script>

</body>

</html>