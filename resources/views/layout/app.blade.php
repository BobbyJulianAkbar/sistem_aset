<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT Supra Uniland Utama</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- Datatables Buttons -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- FullCalendar -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
  @stack('styles')
  <style>
    .marquee-wrapper {
      background-color: #f8f9fa;
      overflow: hidden;
      white-space: nowrap;
      box-sizing: border-box;
      border-bottom: 1px solid #ccc;
      padding: 8px 0;
      position: relative;
      z-index: 1000;
    }

    .marquee-content {
      display: inline-block;
      padding-left: 100%;
      animation: scroll-left 20s linear infinite;
      font-style: italic;
      color: #4A9099;
    }

    @keyframes scroll-left {
      0% {
        transform: translateX(0%);
      }
      100% {
        transform: translateX(-100%);
      }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/logout" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- Scrolling Text Bar -->
    <div class="marquee-wrapper">
      <div class="marquee-content">
        <i>We are one in purpose and complement each other in TEAMWORK</i>
        <span class="mx-4">|</span>
        <i>We maintain a sense of OWNERSHIP to always achieve the best</i>
        <span class="mx-4">|</span>
        <i>We develop PEOPLE to grow together</i>
        <span class="mx-4">|</span>
        <i>We act with INTEGRITY</i>
        <span class="mx-4">|</span>
        <i>We understand and provide the best for CUSTOMERS</i>
        <span class="mx-4">|</span>
        <i>We avoid indifference and pursue CONTINUOUS IMPROVEMENT</i>
      </div>
    </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li>
        <div class="user-panel d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/uniland_logo.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a>PT Supra Uniland Utama</a>
          </div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-light elevation-4" style="background-color: #4A9099">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              @if(Auth::user()->profile_picture)
                  <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" 
                      class="img-circle elevation-2" 
                      alt="{{ Auth::user()->name }}">
              @else
                  <img src="{{ asset('dist/img/default-user.png') }}" 
                      class="img-circle elevation-2" 
                      alt="Default User">
              @endif
          </div>
          <div class="info">
              <a class="d-block">{{ Auth::user()->name }}</a>
          </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/transaksi" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/cicilan" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Cicilan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/properti" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>Properti</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/klien" class="nav-link">
              <i class="nav-icon fas fa-house-user"></i>
              <p>Klien</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pemasukan" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>Pemasukan</p>
            </a>
          </li>
          @if (in_array(Auth::user()->jabatan, [1, 2]))
              <li class="nav-item">
                  <a href="/staff" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Staff</p>
                  </a>
              </li>
          @endif
          <li class="nav-item">
            <a href="/logout" class="nav-link">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid mb-5">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2025 PT Supra Uniland Utama</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- FullCalendar -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
  $(function () {
  $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    "buttons": ["colvis"]
  }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

  $("#example3").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
});
</script>
</body>
</html>
