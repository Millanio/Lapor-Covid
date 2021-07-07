<?php
  ob_start();
  session_start();
  if (!isset($_SESSION['login'])) {
    header("location: login.php");
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
  }
  require "db_config.php";
  $data_laporan = mysqli_query($conn, "SELECT * FROM laporan");
  $data_grafik = mysqli_query($conn, "select date_format(infeksi,'%M') as bulan,count(id) as jumlah from laporan WHERE year(infeksi) = YEAR(CURDATE()) group by month(infeksi) order by month(infeksi)");
  $data_grafik_sembuh = mysqli_query($conn, "select date_format(tanggal_sembuh,'%M') as bulan,count(id) as jumlah from laporan WHERE year(tanggal_sembuh) = YEAR(CURDATE()) AND status = '0' group by month(tanggal_sembuh) order by month(tanggal_sembuh)");

  $jumlah_infeksi = 0;
  $jumlah_sembuh = 0;

  $bulan['infeksi'][0] = 0;
  $bulan['infeksi'][1] = 0;
  $bulan['infeksi'][2] = 0;
  $bulan['infeksi'][3] = 0;
  $bulan['infeksi'][4] = 0;
  $bulan['infeksi'][5] = 0;
  $bulan['infeksi'][6] = 0;
  $bulan['infeksi'][7] = 0;
  $bulan['infeksi'][8] = 0;
  $bulan['infeksi'][9] = 0;
  $bulan['infeksi'][10] = 0;
  $bulan['infeksi'][11] = 0;
  $bulan['infeksi'][12] = 0;

  $bulan['sembuh'][0] = 0;
  $bulan['sembuh'][1] = 0;
  $bulan['sembuh'][2] = 0;
  $bulan['sembuh'][3] = 0;
  $bulan['sembuh'][4] = 0;
  $bulan['sembuh'][5] = 0;
  $bulan['sembuh'][6] = 0;
  $bulan['sembuh'][7] = 0;
  $bulan['sembuh'][8] = 0;
  $bulan['sembuh'][9] = 0;
  $bulan['sembuh'][10] = 0;
  $bulan['sembuh'][11] = 0;
  $bulan['sembuh'][12] = 0;
  foreach ($data_grafik as $d) {
    $jumlah_infeksi += $d['jumlah'];
    switch ($d['bulan']) {
      case 'January':
        $bulan['infeksi'][0] = $d['jumlah'];
        break;
      case 'February':
        $bulan['infeksi'][1] = $d['jumlah'];
        break;
      case 'March':
        $bulan['infeksi'][2] = $d['jumlah'];
        break;
      case 'April':
        $bulan['infeksi'][3] = $d['jumlah'];
        break;
      case 'May':
        $bulan['infeksi'][4] = $d['jumlah'];
        break;
      case 'June':
        $bulan['infeksi'][5] = $d['jumlah'];
        break;
      case 'July':
        $bulan['infeksi'][6] = $d['jumlah'];
        break;
      case 'August':
        $bulan['infeksi'][7] = $d['jumlah'];
        break;
      case 'September':
        $bulan['infeksi'][8] = $d['jumlah'];
        break;
      case 'October':
        $bulan['infeksi'][9] = $d['jumlah'];
        break;
      case 'November':
        $bulan['infeksi'][10] = $d['jumlah'];
        break;
      case 'December':
        $bulan['infeksi'][11] = $d['jumlah'];
        break;
    }
  }
  foreach ($data_grafik_sembuh as $ds) {
    $jumlah_sembuh += $ds['jumlah'];
    switch ($ds['bulan']) {
      case 'January':
        $bulan['sembuh'][0] = $ds['jumlah'];
        break;
      case 'February':
        $bulan['sembuh'][1] = $ds['jumlah'];
        break;
      case 'March':
        $bulan['sembuh'][2] = $ds['jumlah'];
        break;
      case 'April':
        $bulan['sembuh'][3] = $ds['jumlah'];
        break;
      case 'May':
        $bulan['sembuh'][4] = $ds['jumlah'];
        break;
      case 'June':
        $bulan['sembuh'][5] = $ds['jumlah'];
        break;
      case 'July':
        $bulan['sembuh'][6] = $ds['jumlah'];
        break;
      case 'August':
        $bulan['sembuh'][7] = $ds['jumlah'];
        break;
      case 'September':
        $bulan['sembuh'][8] = $ds['jumlah'];
        break;
      case 'October':
        $bulan['sembuh'][9] = $ds['jumlah'];
        break;
      case 'November':
        $bulan['sembuh'][10] = $ds['jumlah'];
        break;
      case 'December':
        $bulan['sembuh'][11] = $ds['jumlah'];
        break;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lapor Covid</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./?page=dashboard" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./?page=lapor" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Lapor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./?page=daftar" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Daftar Laporan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="./?page=grafik" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Grafik
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./?page=export" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Ekspor Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./?logout=1" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <div class="content-wrapper">
      <!-- Content Wrapper. Contains page content -->
      <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        }else {
          $page = "dashboard";
        }
        include "pages/$page.php";
      ?>
      <!-- /.content-wrapper -->
    </div>
  <footer class="main-footer">
    <strong>Contact Person : <a href="http://wa.me/6282331541851">Bagas Adil</a>.</strong>
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- App -->
<script src="dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $('.select2').select2();
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    <?php if ($_GET['page'] == "grafik"): ?>
    var areaChartData = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Jumlah Infeksi',
          backgroundColor     : 'red',
          borderColor         : 'red',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?= json_encode($bulan['infeksi']) ?>
        },
        {
          label               : 'Jumlah Sembuh',
          backgroundColor     : 'green',
          borderColor         : 'green',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?= json_encode($bulan['sembuh']) ?>
        },
      ]
    }
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
    <?php endif; ?>

    $('#daftar_laporan').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [ 8, 'asc' ]
    });
  });
</script>
</body>
</html>
