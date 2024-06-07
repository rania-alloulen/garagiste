<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-2bJ%2FseEBvZfMySBLkNvBgZV8uW1w2fQ1A+ICBv9FPLzuzkxOfmt67Ck57d0ucHzXOC%2BpOtH0xxeU3z%2FLMn4Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #105589;">
<style>
    .sidebar {
      background-color: #615EFC !important;
    }
    .brand-link{
      background-color: #615EFC !important;
    }
  </style>
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/im.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GARAGE<span style="color: red">2024</span> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" style="color:white ">
          {{Str::upper( Auth::user()->name)}}
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color: white ; color:black">
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
            <a href="{{route('clients.index')}}" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('Gestion des clients')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('mecaniciens.index')}}" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                @lang('Gestion mécaniciens')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('pieces.index')}}" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                @lang('Gestion de stock')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('reparations.index')}}" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                @lang('Gestion des réparations')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('vehicules.liste')}}" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-car"></i>
              <p>
                @lang('Gestion des véhicules')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('factures.listea')}}" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                @lang('Facturations')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" class="nav-link" style="color:white" href="{{ route('logout') }}">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>@lang('Deconnecter')</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
