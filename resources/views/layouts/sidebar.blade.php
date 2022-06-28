<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{!!asset('PurpleAdmin/assets/images/faces/face1.jpg')!!}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
            <span class="text-secondary text-small">{{ Auth::user()->roles->name }}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      @if(Auth::user()->role_id == 1)
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin/dashboard')}}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin/grooms')}}">
          <span class="menu-title">Grooming</span>
          <i class="mdi mdi-broom menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin/hotels')}}">
          <span class="menu-title">Boarding</span>
          <i class="mdi mdi-hotel menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin/breeds')}}">
          <span class="menu-title">Breeding</span>
          <i class="mdi mdi-houzz-box menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Manajemen</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-file-document-box menu-icon"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin/users')}}"> Pengguna </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin/pets')}}"> Hewan Peliharaan </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin/cages')}}"> Kandang </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin/reports')}}"> Laporan </a></li>
          </ul>
        </div>
      </li>
      @endif

      @if (Auth::user()->role_id == 2)
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin/grooms')}}">
          <span class="menu-title">Rekam Medis</span>
          <i class="mdi mdi-broom menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin/hotels')}}">
          <span class="menu-title">Penitipan Hewan Sakit</span>
          <i class="mdi mdi-hotel menu-icon"></i>
        </a>
      </li>
      @endif
    </ul>
  </nav>