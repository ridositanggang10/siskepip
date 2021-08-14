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
            <div class="section-title text-center">
                <h3>Rating tingkat Kepuasan</h3>
                <p class="lead">Berikut adalah informasi rating dari masyarakat terhadap tingkat kepuasan pelayanan tiap
                    instansi di Humbang Hasundutan!
                    <br>Mari berikan penilaian Anda terhadap pelayanan yang Anda terima di lingkungan Humbang
                    Hasundutan!
                </p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form  class="row" action="{{ url('/public/rating/get-category')}}"  method="POST">
                            @csrf
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="id">Pilih Instansi Tujuan</label>
                                        <select name="id" id="id" class="form-control" data-style="btn-white">
                                            @foreach ($datas as $data)
                                                <option value="{{$data->id}}">{{$data->instansi_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                                        <button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Kirim</button>
                                    </div>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

        </div><!-- end container -->
    </div><!-- end section -->
</x-people-layout>