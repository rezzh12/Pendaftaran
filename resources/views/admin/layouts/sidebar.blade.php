  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <img src="{{asset('images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PENDAFTARAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/pengguna/' . Auth::user()->foto) }}" class=" elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p>{{ Auth::user()->username }}</p>
      
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link">
                <i class="fas fa-fw fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('admin.angkatan') }}"  class="nav-link">
                  <i class="fas fa-calendar-check nav-icon"></i>
                  <p>Angkatan</p>
                </a>
              </li>
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('admin.pendaftaran') }}"  class="nav-link ">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Pendaftaran</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('admin.pembayaran') }}"  class="nav-link ">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Pembayaran</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.santri') }}"  class="nav-link ">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Santri</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.alumni') }}"  class="nav-link">
                  <i class="fas fa-user-circle nav-icon"></i>
                  <p>Alumni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.guru') }}"  class="nav-link">
                  <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pihak') }}"  class="nav-link">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Pihak</p>
                </a>
              <li class="nav-item">
                <a href="{{ route('admin.pengumuman') }}"  class="nav-link">
                  <i class="fas fa-bullhorn nav-icon"></i>
                  <p>Pengumuman</p>
                </a>
              <li class="nav-item">
                <a href="{{ route('admin.berita') }}"  class="nav-link">
                  <i class="fas fa-newspaper nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('admin.pengguna') }}"  class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="Info" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Info</p>
                </a>
              </li> -->

              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>