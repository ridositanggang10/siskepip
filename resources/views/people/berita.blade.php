@section('title', 'Berita')
    <x-people-layout>
        <div class="banner-area banner-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner">
                            <h2>Berita</h2>
                            <ul class="page-title-link">
                                <li><a href="index.html">Beranda</a></li>
                                <li><a href="berita.html">Berita</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax section noover" data-stellar-background-ratio="0.7" style="background-image:url({{ asset('people/uploads/parallax_05.png')}}); padding-top: 40px">
            <div class="container">
                <div class="text-center">
                    <section id="gallery">
                        <div class="">
                            <div class="row">
                                @foreach ($collection = DB::table('berita')->select('*')->get() as $item)
                                <div class="col-lg-4 mb-4" style="margin: 20px 0">
                                    <div class="card" style="background-color: #fff; padding: 20px 10px;">
                                        @if ($item->berita_foto)
                                        <img src="{{ asset('assets_user/berita/pictures/'.$item->berita_foto)}}" alt="Berita Image" class="card-img-top" style="max-width: 250px; max-height: 180px;">
                                        @endif
                                            <div class="card-body"><br>
                                                <h3 class="card-title">{{$item->judul}}</h3>
                                                <p class="card-text">{!! Str::limit($item->berita_description, 150, $end='...') !!}</p>
                                                <a href="{{ url('/public/show-berita/'.$item->id)}}" class="btn btn-primary btn-sm">Read More</a>
                                            </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    
                </div><!-- end container -->
            </div>
        </div><!-- end section -->
    </x-people-layout>
