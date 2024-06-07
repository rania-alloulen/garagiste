<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #105589;">
    <!-- Brand Logo -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
    .sidebar {
      background-color: #615EFC !important;
    }
    .brand-link{
      background-color: #615EFC !important;
    }
  </style>
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
        <div class="input-group" data-widget="sidebar-search" >
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color: white ; color:black">
          <div class="input-group-append" >
            <button class="btn btn-sidebar" style="background-color: white ; color:black" >
              <i class="fas fa-search fa-fw" ></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item"  >


                <a href="{{route('vehicules.index')}}" class="nav-link" style="color:white">
                  <i class="nav-icon fas fa-car"></i> <!-- Remplacer par l'icône de véhicule -->
                  <p>
                   @lang('Gestion des Vehicules')

                  </p>
                </a>
                <a href="{{route('factures.listec')}}" class="nav-link" style="color:white">
                    <i class="nav-icon fas fa-file-invoice"></i> <!-- Remplacer par l'icône de facture -->
                    <p>
                        @lang('Gestion des Factures')


                    </p>
                  </a>

              </li>

        <li class="nav-item">
            <a class="nav-link" style="color:white" href="{{route('vehicules.create')}}">
                <i class="nav-icon fas fa-plus"></i> <!-- Remplacer par l'icône pour ajouter un véhicule -->
                @lang('Ajouter un vehicule')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  style="color:white" href="{{ route('logout') }}">
                <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Remplacer par l'icône de déconnexion -->
                @lang('Deconnecter')
            </a>
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
