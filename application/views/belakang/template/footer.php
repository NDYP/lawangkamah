<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
</footer>


<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('assets/'); ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/'); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/'); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- DataTables -->
<script>
$(function() {
    $('#example2').DataTable()
    $('#example1').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
    })
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true,
        //format: 'yyyy-mm-dd',
    })
})
</script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('.select21').select2()
    $('.select22').select2()
    $('.select23').select2()
    $('.select24').select2()
    $('.select25').select2()
    $('.select26').select2()
    $('.select27').select2()
    $('.select28').select2()
    $('.select29').select2()
    $('.select210').select2()
    $('.select211').select2()
    $('.select212').select2()
    $('.select213').select2()
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    })
    $('#datepicker1').datepicker({
        autoclose: true
    })
    $('#datepicker2').datepicker({
        autoclose: true
    })
    $('#datepicker3').datepicker({
        autoclose: true
    })
})
</script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/') ?>bower_components/chart.js/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script>
$(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
    $('.textarea1').wysihtml5()
    $('.textarea2').wysihtml5()
})
</script>
<script type="text/javascript">
<?php if ($this->session->flashdata('success')) { ?>
toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php } else if ($this->session->flashdata('error')) {  ?>
toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php } else if ($this->session->flashdata('warning')) {  ?>
toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php } else if ($this->session->flashdata('info')) {  ?>
toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
</script>

<!-- JAVASCRIPT UNTUK CHART DASHBOARD -->
<script>
$(function() {
    //get the bar chart canvas
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var ctx = $("#bar-chart");
    //bar chart data
    var data = {
        labels: cData.label,
        datasets: [{
            label: cData.label,
            data: cData.data,
            backgroundColor: [
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
            ],
            borderColor: [
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
            ],
            borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
        }]
    };
    //options
    var options = {
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: cData.title,
            fontSize: 12,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "bottom",
            labels: {
                fontColor: "#333",
                fontSize: 12
            }
        }
    };
    //create bar Chart class object
    var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
    });

});
</script>
<script>
$(function() {
    //get the bar chart canvas
    var cData = JSON.parse(`<?php echo $chart_data2; ?>`);
    var ctx = $("#bar-chart2");
    //bar chart data
    var data = {
        labels: cData.label,
        datasets: [{
            label: cData.label,
            data: cData.data,
            backgroundColor: [
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
            ],
            borderColor: [
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
            ],
            borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
        }]
    };
    //options
    var options = {
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: cData.title,
            fontSize: 12,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "bottom",
            labels: {
                fontColor: "#333",
                fontSize: 12
            }
        }
    };
    //create bar Chart class object
    var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
    });

});
</script>
<!-- JAVASCRIPT UNTUK CHART DASHBOARD -->
<script>
$(function() {
    //get the bar chart canvas
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var ctx = $("#line-chart");
    //bar chart data
    var data = {
        labels: cData.label,
        datasets: [{
            data: cData.data,
            label: 'Jumlah Penduduk',
            backgroundColor: "#CDA776",
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    //options
    var options = {
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: cData.title,
            fontSize: 12,
            fontColor: "#111"
        },

    };
    //create bar Chart class object
    var chart1 = new Chart(ctx, {
        type: "line",
        data: data,
        options: options
    });

});
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js"
    integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.js"
    integrity="sha512-JjkQxXsZ8GMTLe9DUkPrx7J2c+LHkgdiG5KnC8SAcH98s6whNCmf7WB8EbUI9GmkjIPdtGrXTFkuyidNAPfZeA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#y").chained("#x");
});
</script>

</body>

</html>