<header class="main-header">
    <!-- Logo -->
    <a href="dashboard.html" class="logo"><b>SISKePIP</b> Humbahas</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <?php 
                        $i = 0; 
                        foreach ($notif_count = DB::table('notifikasi')
                                            ->select('*')
                                            ->where([
                                                ['status','unseen'],
                                                ['n_instansi_id', Auth::user()->instansiID],
                                                ['isi_notifikasi','!=','Pengajuan pembuatan akun baru']
                                                ])
                                            ->get() as $user_notif_count) {
                            $i++;
                        }
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        @if($i !==0)
                            <span class="label label-warning">{{$i}}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Anda Memiliki {{$i}} notifikasi baru</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach ($notif = DB::table('notifikasi')
                                            ->select('*')
                                            ->where([
                                                ['status','unseen'],
                                                ['n_instansi_id', Auth::user()->instansiID],
                                                ['isi_notifikasi','!=','Pengajuan pembuatan akun baru']
                                                ])
                                            ->orderBy('created_at', 'desc')
                                            ->get() as $user_notif) 
                                        <li>
                                            <div class="card" style="padding: 5px 10px">
                                                <a href="#">
                                                    @if ($user_notif->isi_notifikasi == 'Request diterima')
                                                        <i class="fa fa-users text-aqua"> 
                                                    @elseif($user_notif->isi_notifikasi == 'Kritik dan Saran Baru')
                                                        <i class="fa fa-pencil"> 
                                                    @elseif($user_notif->isi_notifikasi == 'Redirect Kritik dan Saran')
                                                        <i class="fa fa-forward text-aqua"> 
                                                    @endif
                                                        {{$user_notif->isi_notifikasi}}
                                                    </i>
                                                </a>
                                                <div class="pull-right">
                                                    <a href="{{ url('user/userNotif/'.$user_notif->id)}}">seen</a>
                                                </div>
                                            </div>
                                        </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('profile.png')}}" class="user-image" alt="User Image" />
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('profile.png')}}" class="img-circle" alt="User Image" />
                            <p>
                                {{Auth::user()->name}}
                                <small>Bergabung Sejak {{Auth::user()->created_at->format('d.m.Y')}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="btn btn-default btn-flat">{{ __('Log Out') }}</a>
                                    {{-- <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link> --}}
                                </form>
                                
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
