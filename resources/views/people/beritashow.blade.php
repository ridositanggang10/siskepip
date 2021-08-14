<style>
    .image img, a img{
        display: block;
        margin: 40px auto;
    }
</style>
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
        
        <div class="content-wrapper" data-stellar-background-ratio="0.7" style="background-image:url({{ asset('people/uploads/parallax_05.png')}}); padding: 40px 0;">
            <section class="container-fluid">
                    @foreach ($datas as $data)
                    <div id="content" style="background-color: #fff; padding: 20px">
                            <div class="center" style="padding: 0 50px">
                                <div id="clickMe" class="box image" style="text-align: center">
                                    <img name="img1" src="{{ asset('assets_user/berita/pictures/'.$data->berita_foto)}}" alt="" class="img-responsive" style="width: 360px; height:270px; ">
                                </div>
                                <h3>{{$data->judul}}</h3>
                                <h6>{{$data->created_at}}</h6>
                                <div id="content">
                                    <p>{!!$data->berita_description!!}</p>
                                </div>
                            </div>
                    </div>
                    @endforeach
            </section>
        </div><!-- end section -->
        
    </x-people-layout>
