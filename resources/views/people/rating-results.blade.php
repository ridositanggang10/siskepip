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

    <div id="about" class="section wb">
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
                    @foreach ($datas as $data)
                    <div class="col-md-6 col-sm-6">
                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                @foreach ($collection = DB::table('instansi')
                                                            ->select('*')
                                                            ->where('id',$data->hpi_instansi_id)
                                                            ->get() as $item)
                                    <h3 class="title">{{$item->instansi_name}}</h3>
                                @endforeach
                            </div>
                            <div class="price-value">
                                <div class="value" >

                                    <span class="amount" style="margin-top: 10px">{{$data->jumlah_rating}}%</span>

                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <h2 style="color: #125D98">{{$data->question_tag}}</h2>
                        </div>
                    </div>
                    @endforeach
                </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <hr class="hr1">
</x-people-layout>