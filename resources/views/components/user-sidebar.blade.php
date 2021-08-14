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
            <li class="header">MENU UTAMA</li>
            <li class="active treeview">
                <a href="{{ url('/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="{{ url('/request-akun/request-lists')}}">
                    <i class="fa fa-files-o"></i><span>Request Akun</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>Kritik dan Saran</span><small class="label pull-right bg-green">new</small>

                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/kritik-dan-saran/all-lists')}}"><i class="fa fa-circle-o"></i> Kritik dan Saran Baru</a></li>
                    <li><a href="{{ url('/kritik-dan-saran/acc-lists')}}"><i class="fa fa-circle-o"></i> Daftar Kritik dan Saran Terima</a></li>
                    <li><a href="{{ url('/kritik-dan-saran/rejected-lists')}}"><i class="fa fa-circle-o"></i> Daftar Kritik dan Saran Tolak</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{ url('/kritik-dan-saran/redirect-lists')}}">
                    <i class="fa fa-share"></i> <span>Redirect Kritik dan Saran</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>Rating</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/rating/create-form')}}"><i class="fa fa-circle-o"></i>Buat Rating Baru</a></li>
                    <li><a href="{{ url('/rating/rating-lists')}}"><i class="fa fa-circle-o"></i>Daftar Rating</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ url('/berita/all-news')}}"><i class="fa fa-laptop"></i><span>Berita</span> </a>
            </li>
            <li class="treeview">
                <a href="{{url('/standar-layanan/all-lists')}}">
                    <i class="fa fa-pie-chart"></i><span>Standar Layanan</span></a>
            </li>
            <li class="treeview">
                <a href="{{ url('/password/show-form')}}">
                    <i class="fa fa-edit"></i> <span>Ubah Kata Sandi</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
