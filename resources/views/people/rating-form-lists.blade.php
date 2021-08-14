@section('title','Rating')
<x-people-layout>
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Rating</h2>
                        <ul class="page-title-link">
                            <li><a href="index.html">Beranda</a></li>
                            <li><a href="kirim-masukan.html">Kirim Masukan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="section wb" style="margin: 100px 0">

        <div class="container">
            <h1>Pilih Survey</h1>
            <div class="row text-center">
                @foreach ($datas as $data)
                    <div class="col-md-12 col-sm-12">
                        <div class="about-item">
                            <div class="about-text">
                                <h3><a href="#">{{$data->survei_tag}}</a></h3>
                            </div>
                            <a class="button btn btn-light btn-radius btn-brd" href="{{url('/public/rating/question-lists/'.$data->survei_tag)}}">Beri Penilaian</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
</x-people-layout>