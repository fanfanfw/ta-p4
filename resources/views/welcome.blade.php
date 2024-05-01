<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Layout Options
          <i class="fas fa-angle-left right"></i>
          <span class="badge badge-info right">6</span>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="pages/layout/top-nav.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Top Navigation</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Top Navigation + Sidebar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/boxed.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Boxed</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Sidebar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Sidebar <small>+ Custom Area</small></p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-topnav.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Navbar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-footer.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Footer</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Collapsed Sidebar</p>
          </a>
        </li>
      </ul>
    </li>
    
  </ul>
</nav>



{{-- --}}


<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Input Data
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
          <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/user" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Data User</p>
                        </a>
                    </li>
                      <li class="nav-item">
                          <a href="/data-dosen" class="nav-link">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  Data Dosen
                              </p>
                          </a>
                      </li>
                    <li class="nav-item">
                        <a href="/program" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                              Data Program Studi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/ruangan" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard"></i>
                            <p>
                              Data Ruangan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kelas" class="nav-link">
                            <i class="nav-icon fas fa-school"></i>
                            <p>
                              Data Kelas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kelas" class="nav-link">
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
                  <a href="/matakuliah" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                      <p>
                          Matakuliah
                      </p>
                  </a>
              </li>
      @endif

      @if(auth()->check() && auth()->user()->role == 'admin')
              <li class="nav-item">
                  <a href="/jadwal" class="nav-link">
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