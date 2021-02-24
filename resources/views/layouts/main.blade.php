<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Simpus</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  
  {{-- jquery-ui --}}
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-ui/jquery-ui.theme.min.css')}}">

  {{-- pNotify --}}
  <link rel="stylesheet" href="{{asset('assets/plugins/pnotify2/dist/PNotifyBrightTheme.css')}}">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2/dist/sweetalert2.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
  
  @if ($iscss??'')
  <link rel="stylesheet" href="{{asset('assets/dist/css/custom/'.$iscss)}}">
{{-- <script src="{{asset('assets/dist/js/custom/'.$isJS)}}"></script> --}}
  @endif

{{-- @if($printJS??false)
  <link rel="stylesheet" href="{{asset('assets/plugins/print/print.min.css')}}">  
@endif --}}

  
</head>
<body class="hold-transition sidebar-collapse layout-top-nav" data-site="{{url('/')}}">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="{{asset('uploads/images/Kota-Cimahi.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIMPUS</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      @include('layouts.menu')

      </div>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="{{asset('uploads\images\avatar5.png')}}" alt="image" class="brand-image img-circle elevation-3">
            u.wirahadi10@gmail.com
            {{-- <img src="{{asset('uploads/images/Kota-Cimahi.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Profile
                    <span class="float-right text-sm text-danger"><i class="fas fa-user"></i></span>
                  </h3>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Change password
                    {{-- <span class="float-right text-sm text-danger"><i class="fas fa-eye"></i></span> --}}
                    <span class="float-right text-sm text-danger"><i class="far fa-eye-slash"></i></span>
                  </h3>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Logout
                    <span class="float-right text-sm text-danger"><i class="fas fa-sign-out-alt"></i></span>
                  </h3>
                </div>
              </div>
            </a>
          </div>
        </li></ul>
    </div>
  </nav>
  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/">{{$menu??'Home'}}</a></li>
              @if($submenu??'')
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$submenu??''}}</a></li>
              @endif
              @if($submenu2??'')
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$submenu2??''}}</a></li>
              @endif

              {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">{{$aksi??''}}</a></li> --}}
            </ol>
          </div>
          <div class="col-sm-6">
            
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            
              {{-- @if(session('status'))
              <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Info!</strong> {{session('status')}}
            </div>
            @endif --}}
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            @yield('content')
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  


  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Dinas Kesehatan Kota Cimahi</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->

{{-- pnotify --}}
{{-- <script src="{{asset('assets/plugins/pnotify/pnotify.js')}}"></script>
<script src="{{asset('assets/plugins/pnotify/pnotify.buttons.js')}}"></script>
<script src="{{asset('assets/plugins/pnotify/pnotify.nonblock.js')}}"></script> --}}

<script src="{{asset('assets/plugins/pnotify2/dist/iife/PNotify.js')}}"></script>
<script src="{{asset('assets/plugins/pnotify2/dist/iife/PNotifyButtons.js')}}"></script>
<script>
  // PNotify.defaultModules.set(PNotifyMobile, {});
  PNotify.defaults.styling = 'bootstrap4'; // Bootstrap version 4
</script>

<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment-with-locales.min.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{('assets/dist/js/demo.js')}}"></script> --}}

<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>


{{-- datatables --}}
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@if ($isJS??'')
<script src="{{asset('assets/dist/js/custom/'.$isJS)}}"></script>
@endif

@if ($printJS??false)
<script src="{{asset('assets/plugins/print/print.min.js')}}"></script>
@endif
{{-- <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}" type="text/javascript"></script> --}}

<script>
  $(document).ready(function(){
    moment.locale('id');
    setInterval(()=>{
        $("#jam").html(moment().format('LLLL.ss'));
    },1000);
  });
</script>

</body>
</html>
