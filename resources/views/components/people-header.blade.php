<!-- Header -->
<header class="header header_style_01">
    <nav class="megamenu navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand" href="index.html" style="margin-left: 20px; margin-top: 5px;"><img src="{{ asset('people/images/logos/Logo_V7.png') }}"
                        alt="image" style="width: 200px"></div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/public/beranda')}}">Beranda</a></li>
                    <li><a href="{{ url('/public/profil')}}">Profil </span></a></li>
                    <li><a href="{{ url('/public/berita')}}">Berita <span></span></a></li>
                    <li><a href="{{ url('/public/standar-layanan')}}">Standar Layanan <span></span></a></li>
                    <li class="active">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kirim Masukan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ url('/public/rating/rating-results')}}">Rating</a></li>
                            <li><a class="dropdown-item" href="{{ url('/public/rating/instansi')}}">Beri Rating</a></li>
                            <li><a class="dropdown-item" href="{{ url('/public/kds/kritik-dan-saran')}}">Kritik dan Saran</a></li>
                        </ul>
                        {{-- <a href="/kirim-masukan" class="dropdown-toggle" > <span></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="rating.html"></a></li>
                            <li><a href="kritik-dan-saran.html"></a></li>
                        </ul> --}}
                    </li>
                    <li><a href="{{ url('/public/tentang')}}">Tentang</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>