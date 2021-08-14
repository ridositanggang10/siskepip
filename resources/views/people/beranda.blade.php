<style>
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
.blockquote-custom {
  position: relative;
  font-size: 1.1rem;
}

.blockquote-custom-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: -25px;
  left: 50px;
}

</style>
@section('title','Beranda')
<x-people-layout>
    <div class="slider-area">
        <div class="slider-wrapper owl-carousel">
            @for ($i = 0; $i < 10; $i++)
                <div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-one">
                    <div class="container">
                        <div class="row">
                            <div class="slider-content-area">
                                <div class="slide-text">
                                    <h1 class="homepage-three-title">Partisipasi Anda adalah <span>KEMAJUAN BERSAMA</span>
                                        Bagi Humbang Hasundutan</h1>
                                    <h2>Melalui SISKePIP, <br>Anda dapat menyampaikan masukan dan penilaian Anda terhadap
                                        pelayanan yang Anda terima dari setiap instansi yang bergerak di Humbang Hasundutan
                                        namun dengan menggunakan bahasa yang sopan dan beretika</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div class="parallax section noover" data-stellar-background-ratio="0.7" style="background-image:url({{ asset('people/uploads/parallax_05.png')}}); padding-top: 40px">
        <div class="container">
            <div class="section-title text-center">
                <h3 style="color: #fff">Apa tanggapan masyarakat?</h3>
                <p class="lead">Berikut kritik dan saran yang sudah pernah masuk ke website SISKePIP dari masyarakat Humbang Hasundutan</p>
            </div> <!--End section-title-->
            <div class="row">
                <div class="col-md-12 mx-auto" >
                    @foreach ($collection = DB::table('kirik_dan_saran')->select('*')->where('status','public')->get() as $item)
                        <!-- CUSTOM BLOCKQUOTE -->
                    <blockquote class="col-md-5 blockquote blockquote-custom bg-white p-5 shadow rounded align-left" style="color: #3C8DAD; background-color:white; margin: 20px 60px 20px 20px;">
                        @foreach ($userdata = DB::table('data_masyarakat')->select('*')->where('id',$item->masyarakat_id)->get() as $ud)
                            <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-quote-left text-white"></i></div>
                            @foreach ($instansi = DB::table('instansi')->select('*')->where('id',$item->ks_instansi_id)->get() as $instans)
                                <h4>{{$instans->instansi_name}}</h4>
                            @endforeach
                            <p class="mb-0 mt-2 font-italic" style="color: black">"{!! Str::limit($item->pesan, 200, $end='...') !!}"</p>
                            <footer class="blockquote-footer pt-4 mt-4 border-top">
                                {{$ud->nama_lengakap}}
                            </footer>
                        @endforeach
                    </blockquote><!-- END -->
                    @endforeach
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
</x-people-layout>