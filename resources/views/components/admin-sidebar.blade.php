<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('profile.png')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->name}}</p>
  
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU ADMIN</li>
            <li class="active treeview">
                <a href="{{ url('/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="{{ url('/verifikasi/lists')}}">
                  <i class="fa fa-files-o"></i>
                  <span>Verifikasi Request Akun</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ url('ubah-katasandi/show-admin-form')}}">
                  <i class="fa fa-edit"></i> <span>Ubah Kata Sandi</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{url('/kelola-pengguna/all-user')}}">
                  <i class="fa fa-table"></i> <span>Kelola Pengguna</span>
                </a>
            </li>
            <li class="header">MENU UTAMA</li>
            <li>
                <a href="{{url('/kritik-dan-saran/kds-lists')}}">
                  <i class="fa fa-envelope"></i> <span>Kritik dan Saran</span>
                </a>
            </li>
            <li class="treeview">
              <a href="{{ url('berita/berita-lists')}}">
                  <i class="fa fa-laptop"></i><span>Berita</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ url('/standar-layanan/std-lists')}}">
                  <i class="fa fa-pie-chart"></i><span>Standar Layanan</span>
              </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>