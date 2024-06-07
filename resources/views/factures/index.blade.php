<!DOCTYPE html>
<html @if(app()->getLocale() == "ar") dir=rtl @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GESTION GARAGISTE- ADMIN</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  @vite(['resources/js/app.js','resources/css/app.css'])
  <style>
    .content .box-info{
      display: flex;
      gap: 80px;
      justify-content: center;
    }
    .content .box-info li{
      list-style: none;
    }
    .p1{
      background-color: gray;
      padding: 10px;
      width: 300px;
      height: 100px;
      text-align: center;
      font-size: large;
      border: 1px solid beige;
      border-radius: 30px;
      color:white;
    }
    .p1:hover{
      color:gray;
      background-color: white;
    }
  </style>
  <!-- Google Font: Source Sans Pro -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.jpeg')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layouts.header')
  <aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color: #105589;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AUTO<span style="color: red">REPAIR</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info" style="color:white">
        {{ Auth::user()->name }}

        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color: white ; color:black" >
          <div class="input-group-append">
            <button class="btn btn-sidebar" style="background-color: white ; color:black">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{route('vehicules.listem')}}" class="nav-link" style="color:white">
                    <i class="fas fa-car"></i>
                    <p>
                        @lang('Gestion des véhicules')
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('factures.index')}}" class="nav-link" style="color:white">
                    <i class="fas fa-file-invoice"></i>
                    <p>
                        @lang('Listes des factures')
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('reparations.liste')}}" class="nav-link" style="color:white">
                    <i class="fas fa-wrench"></i>
                    <p>
                        @lang('Réparations')
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" style="color:white">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>
                        @lang('Deconnecter')
                    </p>
                </a>
            </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6"></div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">

      <div class='max-w-md mx-auto mt-10'>
        <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
          <div class="grid place-items-center h-full w-12 text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          {{-- <form id="searchForm" onsubmit="return submitForm(event)" action="{{ route('repairs.search') }}" method="post"> --}}
            @csrf
            <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" id="search" name="search" placeholder="@lang('Rechercher quelque chose..')" />
          </form>

        </div>
      </div>
      <div class="m-5">



        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p>{{ $message }}</p>
            </div>
        @endif
        <div id="showR">
            <!-- code de la fenetre modal  -->
        </div>
        <a class="btn btn-secondary" href="{{ route('factures.create') }}">
            <i class="fas fa-plus-circle fa-sm text-info"></i> <!-- Icône de Font Awesome -->
            @lang('Créer une facturation')
        </a>

    </section>
    <table class="table table-striped table-hover mt-10 w-50" >
        <tr style="background-color: #0B4C80; color: white;">
            <th >@lang('Charge supplimentaire')</th>
            <th >@lang('nom client')</th>
            <th >@lang('prenom client')</th>
            <th >@lang('Montant')</th>
            <th>@lang('Action')</th>
        </tr>
        @foreach ($factures as $fc)
            <tr id="row{{$fc->id}}" style="background-color: #E3F2FD;">
                <td>{{ $fc->chargeSupp}}</td>
                <td>{{ $fc->client_nom}}</td>
                <td>{{ $fc->client_prenom}}</td>
                <td>{{$fc->montant }}</td>
                <td>
                    <a class="btnEdit btn  bg-blue-500 hover:bg-blue-400 text-white font-bold  px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded" href="{{route('factures.edit',$fc->id)}}">@lang('Modifier')</a>
                </td>
            </tr>
        @endforeach
    </table>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('script')
</body>
</html>

<script>
function submitForm(event){
  event.preventDefault();
  var formData = $('#searchForm').serialize();


  axios.post(url, formData)
    .then(response => {
      $("#divResult").html(response.data);
    })
    .catch(error => {
      console.log(error);
    });
}
</script>
