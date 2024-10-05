</div>
</main>
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
    console.log('Fuck');
    <?php if(isset($msg)) {?>
        alert('<?php echo $msg; ?>');
    <?php }?>
</script>

</body>
</html>