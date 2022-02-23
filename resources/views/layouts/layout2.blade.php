

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href='{{asset("plugins/summernote/summernote-bs4.min.css")}}'>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <script src="{{asset('plugins/jquery/jquery.js')}}"> </script>
 
  <script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>


<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  @yield('css')
  @yield('js')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/Group 1.svg')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li>

                                    <a class="dropdown-item mt-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <p><b>Logout<b> <i class="fa fa-sign-out"></i></p>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          
      
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="index3.html" class="brand-link p-3 m-0" style="border-bottom:4px solid white">
            <img src="{{asset('assets/Group 1.svg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" >
            <span class="brand-text font-weight-light">OmahKunci</span>
          </a>
      <!-- Sidebar user panel (optional) -->
      <div class="mt-3 pb-3 mb-3 d-block ">
        <div class="image">
          <img src="{{asset('assets/Group 1.svg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(auth()->user()->roles[0]['name'] == 'kasir'  or  auth()->user()->roles[0]['name'] == 'manager' )
          <li class="nav-itemn">
            <a href="#" class="nav-link {{$whoactive=='kasir' ? 'active' : ''}}">
              <p>
                Kasir
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/kasir')}}" class="nav-link {{$whoactive=='kasir' ? 'active' : ''}}"">
                  <p>Transaksi Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/transaksi')}}" class="nav-link {{$whoactive=='riwayattransaksi' ? 'active' : ''}}"" >
                  <p>Riwayat transaksi</p>
                </a>
              </li>
              <li class="nav-header">Transaksi Pre-Order</li>
              <li class="nav-item">
                <a href="{{url('/notabesar')}}" class="nav-link {{$whoactive=='notabesar' ? 'active' : ''}}"">
                  <p>Pre-Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/transaksipreorder')}}" class="nav-link {{$whoactive=='transaksipreorder' ? 'active' : ''}}" >
                  <p>Riwayat Pre-Order</p>
                </a>
              </li>
            </ul>
          </li>
         @endif


           @if(auth()->user()->roles[0]['name'] == 'admin gudang' or auth()->user()->roles[0]['name'] == 'manager')
            <li class="nav-item">
            <a href="#" class="nav-link {{$whoactive =='admingudang' ? 'active' : ''}}">
              <p>
                Admin Gudang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{url('/stok')}}" class="nav-link {{$whoactive =='stok' ? 'active' : ''}}">
                  <p>Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('detailstok')}}" class="nav-link">
                  <p>Detail Stok</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

               @if(auth()->user()->roles[0]['name'] == 'manager' )
            <li class="nav-item menuopen">
            <a href="#" class="nav-link {{$whoactive=='manager' ? 'active' : ''}}">
              <p>
                Manager
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('/produk')}}" class="nav-link {{$whoactive =='produk' ? 'active' : ''}}">

                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link  {{$whoactive =='kelolakun' ? 'active' : ''}}">
            
                  <p>Kelola Akun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dsm')}}" class="nav-link {{$whoactive =='stoktrafic' ? 'active' : ''}}">
        
                  <p>Stok Trafic</p>
                </a>
              </li>
            </ul>
          </li>
          @endif




         
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
            <h1 class="m-0">@yield('pagetitle')</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            @yield("content")
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline asset -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap asset -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knoassethart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepasseter -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdomiasset Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernoteasset>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrassetbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE Aasset-->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE fassetdemo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dassetboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
</body>
</html>
