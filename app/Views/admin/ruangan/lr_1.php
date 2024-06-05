<!-- DEBUG-VIEW START 3 APPPATH\Views\admin\ruangan\template_ruangan_admin.php -->
<!-- DEBUG-VIEW START 2 APPPATH\Views\admin\layout\template.php -->
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

        <!-- DEBUG-VIEW START 1 APPPATH\Views\admin\layout\sidebar.php -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/dashboard" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/gudang/list" aria-expanded="false"><i class="fas fa fa-square"></i><span class="hide-menu">Gudang</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/barang/list" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Barang</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/ruangan/list" aria-expanded="false"><i class="fa fa-th"></i><span class="hide-menu">Ruangan</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/fasilitas/list" aria-expanded="false"><i class="fa fa-laptop"></i><span class="hide-menu">Fasilitas</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/barang-masuk/list" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Barang Masuk</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/barang-keluar/list"><i class="mdi mdi-cart-off"></i><span class="hide-menu">Barang Keluar</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/suplier/list" aria-expanded="false"><i class="fa fa-truck"></i><span class="hide-menu">Supplier</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/pengguna/list" aria-expanded="false"><i class="fa fa-user-circle"></i><span class="hide-menu">Pengguna</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/admin/pengguna/profil" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Profil</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="http://localhost:8080/logout" aria-expanded="false"><i class="fa fa-sign-out"></i><span class="hide-menu">Logout</span></a></li>
            </ul>
        </nav>
    </div>
</aside>
<!-- DEBUG-VIEW ENDED 1 APPPATH\Views\admin\layout\sidebar.php -->

        <div class="page-wrapper">
            <div class="content-header">

                
<div class="content-header mb-4">
    <h1 class="text-center mb-5">
        Data Barang Lr 1    </h1>

    <div class="box-header">
        <span class="btn-group pull-right mr-5">
            <a href="http://localhost:8080/admin/barang/create" class="btn btn-secondary" target="_blank">
                <i class="fa fa-plus"></i> &nbsp; Tambah Data Barang
            </a>
        </span>
    </div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">NO</td>
                <td class="table-dark">KODE RUANGAN</td>
                <td class="table-dark">NAMA BARANG</td>
                <td class="table-dark">KODE BARANG</td>
                <td class="table-dark">TAHUN PEMBELIAN</td>
                <td class="table-dark">SPESIFIKASI BARANG</td>
                <td class="table-dark">KONDISI BARANG</td>
                <td class="table-dark">RUANGAN</td>
                <td class="table-dark">JUMLAH BARANG</td>
                <td class="table-dark">KETERANGAN</td>
            </tr>
        </thead>
        <tbody>
                                <tr>
                        <td>1</td>
                        <td>Lr 1</td>
                        <td>Sepatu</td>
                        <td>Kursi/2023</td>
                        <td>2023</td>
                        <td>Keren</td>
                        <td>Bagus</td>
                        <td>Lr 1</td>
                        <td>0</td>
                        <td>Percobaan 1</td>
                    </tr>
                                <tr>
                        <td>2</td>
                        <td>Lr 1</td>
                        <td>Sepatu</td>
                        <td>Kursi/2023</td>
                        <td>2023</td>
                        <td>Keren</td>
                        <td>Bagus</td>
                        <td>Lr 1</td>
                        <td>1</td>
                        <td>ccc</td>
                    </tr>
                                <tr>
                        <td>3</td>
                        <td>Lr 1</td>
                        <td>Sepatu</td>
                        <td>Kursi/2023</td>
                        <td>2023</td>
                        <td>Keren</td>
                        <td>Bagus</td>
                        <td>Lr 1</td>
                        <td>1</td>
                        <td>Percobaan 2</td>
                    </tr>
                                <tr>
                        <td>4</td>
                        <td>Lr 1</td>
                        <td>Pulpen</td>
                        <td>Pulpen/Int/2024</td>
                        <td>2023</td>
                        <td>Kecil</td>
                        <td>Baru</td>
                        <td>Lr 1</td>
                        <td>16</td>
                        <td></td>
                    </tr>
                                <tr>
                        <td>5</td>
                        <td>Lr 1</td>
                        <td>Sepatu</td>
                        <td>Kursi/2023</td>
                        <td>2024</td>
                        <td>Bagus</td>
                        <td>bagus</td>
                        <td>Lr 1</td>
                        <td>2</td>
                        <td></td>
                    </tr>
                    </tbody>
    </table>
</div>


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
<!-- DEBUG-VIEW ENDED 2 APPPATH\Views\admin\layout\template.php -->

<!-- DEBUG-VIEW ENDED 3 APPPATH\Views\admin\ruangan\template_ruangan_admin.php -->
