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
    <?php if (isset($msg)) { ?>
        alert('<?php echo $msg; ?>');
    <?php } ?>



    function go() {
        let form = document.getElementById('form');
        console.log('Selection Clicked');
        form.submit();
    }



    document.getElementById('download').addEventListener('click', async function() {
        console.log('Clicked!');
        let elem = document.getElementById('pdfContent');


        let fname = "appointment-form";
        let fileName = fname.concat('.pdf');

        var opt = {
            margin: 0,
            pagebreak: {
                mode: ['avoid-all', 'css', 'legacy']
            },
            filename: fileName,
            image: {
                type: 'png'
            },
            html2canvas: {
                scale: 2,
                scrollY: 0,
                scrollX: 0,
            },
            jsPDF: {
                unit: 'mm',
                format: 'a4',
                orientation: 'p'
            }
        };
        await html2pdf().set(opt).from(elem).toPdf().save();
    });
</script>

</body>

</html>