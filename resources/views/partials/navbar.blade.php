<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Home</a>
      </li>
      
    </ul>
    <ul class="navbar-nav">
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Home</a>
      </li>
      
    </ul>
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
        <li class="nav-item">
         <a href="{{ auth()->check() ? (auth()->user()->role == 'admin' ? '/dashboard' : (auth()->user()->role == 'mahasiswa' ? '/pages/mahasiswa/dashboard' : '/pages/dosen/dashboard')) : '/login' }}" class="nav-link {{ ($active === "dashboard") ? 'active' : '' }}"> <!-- Tindakan untuk pengguna yang belum login, misalnya redirect ke halaman login -->
          {{-- @endif --}}
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
             Dashboard
           </p>
           </a>
        </li>

      @if(auth()->check() && auth()->user()->role == 'admin')
        <li class="nav-item">
          <a href="#" class="nav-link {{ ($active === "user" || $active === "data-dosen" || $active === "program" || $active === "ruangan" || $active === "kelas" || $active === "jam") ? 'active' : '' }}">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Input Data
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/user" class="nav-link {{ ($active === "user") ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Data User</p>
          </a>
      </li>
      <li class="nav-item">
        <a href="/data-dosen" class="nav-link {{ ($active === "data-dosen") ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Data Dosen
            </p>
        </a>
    </li>
    <li class="nav-item">
      <a href="/program" class="nav-link {{ ($active === "program") ? 'active' : '' }}">
          <i class="nav-icon fas fa-graduation-cap"></i>
          <p>
            Data Program Studi
          </p>
      </a>
  </li>
  <li class="nav-item">
    <a href="/ruangan" class="nav-link {{ ($active === "ruangan") ? 'active' : '' }}">
        <i class="nav-icon fas fa-chalkboard"></i>
        <p>
          Data Ruangan
        </p>
    </a>
</li>
<li class="nav-item">
  <a href="/kelas" class="nav-link {{ ($active === "kelas") ? 'active' : '' }}">
      <i class="nav-icon fas fa-school"></i>
      <p>
        Data Kelas
      </p>
  </a>
</li>
<li class="nav-item">
  <a href="/jam" class="nav-link {{ ($active === "jam") ? 'active' : '' }}">
      <i class="nav-icon fas fa-clock"></i>
      <p>
        Data Jam Kelas
      </p>
  </a>
</li>
       
      </ul>
    </li>
    @endif

    @if(auth()->check() && auth()->user()->role == 'admin')
              <li class="nav-item">
                  <a href="/matakuliah" class="nav-link {{ ($active === "matakuliah") ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                      <p>
                          Matakuliah
                      </p>
                  </a>
              </li>
      @endif

      @if(auth()->check() && auth()->user()->role == 'admin')
              <li class="nav-item">
                  <a href="/jadwal" class="nav-link {{ ($active === "jadwal") ? 'active' : '' }}">
                      <i class="nav-icon fas fa-thumbtack"></i>
                      <p>
                          Jadwal
                      </p>
                  </a>
              </li>
      @endif

      {{-- Mahasiswa --}}
      {{-- @if(auth()->check() && auth()->user()->role == 'mahasiswa')
              <li class="nav-item">
                  <a href="/pages/mahasiswa/matakuliah" class="nav-link">
                      <i class="nav-icon fas fa-book"></i>
                      <p>
                          Matakuliah
                      </p>
                  </a>
              </li>
      @endif

      @if(auth()->check() && auth()->user()->role == 'dosen')
              <li class="nav-item">
                  <a href="/pages/dosen/matakuliah" class="nav-link">
                      <i class="nav-icon fas fa-book"></i>
                      <p>
                          Matakuliah
                      </p>
                  </a>
              </li>
      @endif --}}
      <li class="nav-item mt-5">
        <a href="/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
  </ul>
</nav>
    </div>
    <!-- /.sidebar -->
  </aside>