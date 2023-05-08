<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Afifah Nofa Kurnia Rahmadani</a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href={{route('dashboard')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>

       <li class="nav-item">
        <a href={{route('profile')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Profile
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>

       <li class="nav-item">
        <a href={{route('pengalaman')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Pengalaman
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>

       <li class="nav-item">
        <a href={{route('artikel')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Artikel
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>

       <li class="nav-item">
        <a href={{('/hobi')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Hobi
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>

       <li class="nav-item">
        <a href={{('/keluarga')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Keluarga
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href={{('/matkul')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            MatKul
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href={{('/mahasiswa')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Mahasiswa
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href={{('/matakuliah')}} class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            MataKuliah
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>
        
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>