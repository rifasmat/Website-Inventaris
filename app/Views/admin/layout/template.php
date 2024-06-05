<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>STTI NIIT I - TECH</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/dist/css/calendar.css">
    <link rel="stylesheet" href="/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/assets/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="/assets/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
</head>

<body>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <?= $this->include('admin/layout/sidebar'); ?>

        <div class="page-wrapper">
            <div class="content-header">

                <?= $this->renderSection('content'); ?>

            </div>
        </div>
    </div>


    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/dist/js/custom.js"></script>

    <script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="/assets/bower_components/raphael/raphael.min.js"></script>

    <script src="/assets/bower_components/morris.js/morris.min.js"></script>

    <script src="/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

    <script src="/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script src="/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

    <script src="/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <script src="/assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

    <script src="/assets/bower_components/moment/min/moment.min.js"></script>

    <script src="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script src="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <script src="/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <script src="/assets/bower_components/fastclick/lib/fastclick.js"></script>

    <script src="/assets/dist/js/adminlte.min.js"></script>

    <script src="/assets/dist/js/pages/dashboard.js"></script>

    <script src="/assets/dist/js/demo.js"></script>

    <script src="/assets/bower_components/ckeditor/ckeditor.js"></script>

    <!-- Script Pada Halaman Barang -->
    <script src="/dist/js/barang.js"></script>

    <!-- Script Pada Halaman Fasilitas -->
    <script src="/dist/js/fasilitas.js"></script>

    <!-- Script Pada Halaman Pengguna -->
    <script src="/dist/js/pengguna.js"></script>

</body>

</html>