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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
               <a href="{{ auth()->check() ? (auth()->user()->role == 'admin' ? '/pages/admin/dashboard' : (auth()->user()->role == 'mahasiswa' ? '/pages/mahasiswa/dashboard' : '/pages/dosen/dashboard')) : '/login' }}" class="nav-link"> <!-- Tindakan untuk pengguna yang belum login, misalnya redirect ke halaman login -->
                {{-- @endif --}}
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                   Dashboard
                 </p>
                 </a>
            </li>

            @if(auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="/user" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Dosen & Mahasiswa
                            </p>
                        </a>
                    </li>
            @endif

            @if(auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="/program" class="nav-link">
                            <i class="nav-icon fas fa-thumbtack"></i>
                            <p>
                                Program Studi
                            </p>
                        </a>
                    </li>
            @endif
            
            @if(auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="/pages/admin/matakuliah" class="nav-link">
                            <i class="nav-icon fas fa-thumbtack"></i>
                            <p>
                                Matakuliah
                            </p>
                        </a>
                    </li>
            @endif

            @if(auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="/pages/admin/jadwal" class="nav-link">
                            <i class="nav-icon fas fa-thumbtack"></i>
                            <p>
                                Jadwal
                            </p>
                        </a>
                    </li>
            @endif

            {{-- Mahasiswa --}}
            @if(auth()->check() && auth()->user()->role == 'mahasiswa')
                    <li class="nav-item">
                        <a href="/pages/mahasiswa/matakuliah" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Matakuliah
                            </p>
                        </a>
                    </li>
            @endif

            {{-- Dosen --}}
            @if(auth()->check() && auth()->user()->role == 'dosen')
                    <li class="nav-item">
                        <a href="/pages/dosen/matakuliah" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Matakuliah
                            </p>
                        </a>
                    </li>
            @endif

            <li class="nav-item">
              <a href=""></a>
            </li>
          </ul>
          {{-- logout --}}
          <ul class="nav nav-pills nav-sidebar flex-column mt-5" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/logout" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
          </ul>
        {{-- /.logout> --}}
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>