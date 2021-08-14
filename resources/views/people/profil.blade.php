<style>
    .text-container{
        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>
@section('title','Profil')
<x-people-layout>
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Profil</h2>
                        <ul class="page-title-link">
                            <li><a href="{{ url('/public/beranda')}}">Beranda</a></li>
                            <li><a href="{{ url('/public/profil')}}">Profil</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div id="portfolio" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Profil Setiap Instansi</h3>
                <p class="lead">Berikut adalah profil dari setiap instansi pelayanan di Humbang Hasundutan <br>
                    Dibagi menjadi 4 role berdasarkan kriteria yang serupa.</p>
            </div><!-- end title -->
        </div><!-- end container -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="portfolio-filter text-center">
                        <ul>
                            <li><a class="btn btn-dark btn-radius btn-brd" href="#" data-toggle="tooltip"
                                    data-placement="top" title="23" data-filter=".cat1">Dinas</a></li>
                            <li><a class="btn btn-dark btn-radius btn-brd" href="#" data-toggle="tooltip"
                                    data-placement="top" title="5" data-filter=".cat2">Badan</a></li>
                            <li><a class="btn btn-dark btn-radius btn-brd" href="#" data-toggle="tooltip"
                                    data-placement="top" title="1" data-filter=".cat3">Sekretariat DPRD</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <hr class="invis">

            <div id="da-thumbs" class="da-thumbs portfolio">
                
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dinkes.humbanghasundutankab.go.id/">
                        <img src="{{ asset('people/images/Instansi/kesehatan.jpg')}}" class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Kesehatan </h3>
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dukcapil.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Dukcapil.jpg')}}" class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Kependudukan dan Catatan Sipil</h3>
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dpmp2tsp.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/pmpwtsp.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Penanaman Modal dan Pelayanan Perizinan Terpadu Satu Pintu (DPMP2TSP)</h3>
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dispen.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Dispen.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Pendidikan</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://diskominfo.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/diskominfo.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Komunikasi dan Informatika</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dinsos.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/sosial.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Sosial</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://perkim.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/perum.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Perkim </h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://disnakan.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Disnakan.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Peternakan dan Perikanan</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dpmdp2a.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/DPMDP2A.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Pemberdayaan Mas. Desa, Perempuan dan Perlindungan Anak (DPMDP2A)</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://ketapang.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Ketapang.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Ketahanan Pangan</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://lindup.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/lingkungan hidup.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Lingkunngan Hidup</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dispar.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/pariwista.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Pariwisata</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://pupr.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/PUPR.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Pekerjaan Umum Penataan Ruang</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://distan.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/pertanian.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Pertanian</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dispora.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Dispora.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Kepemudaan dan Olahraga</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://p2kb.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/p2kb.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Pengendalian Penduduk dan Keluarga Berencana (DP2KB)</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://kopedagin.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Kopedagin.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Koperasi, Perdagangan dan industri</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://satpolpp.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Pol PP.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Pol PP</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://disnaker.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/ketenagakerjaan.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Tenaga Kerja</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dishub.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/perhubungan.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Perhubungan</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://inspektorat.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Inspektorat.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Inspektorat</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://dispusarda.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/perpustakaan.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Dinas Perpustakaan dan Kearsipan</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat1">
                    <a href="https://rsud.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/RSUD.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>RSUD Doloksanggul</h3>
                            
                        </div>
                    </a>
                </div>

                <div class="post-media pitem item-w1 item-h1 cat2">
                    <a href="https://bpkpad.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/BPKPAD.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>BPKPAD</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat2">
                    <a href="https://bappeda.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Bappeda.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Badan BAPPEDA</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat2">
                    <a href="https://bkd.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/BKD.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>BKD</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat2">
                    <a href="https://bpbd.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/BPBD.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>BPBD</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat2">
                    <a href="https://badankesbangpol.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/Kesbangpol.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Kesbangpol</h3>
                            
                        </div>
                    </a>
                </div>
                <div class="post-media pitem item-w1 item-h1 cat3">
                    <a href="https://sekwan.humbanghasundutankab.go.id/" >
                        <img src="{{ asset('people/images/Instansi/SekDRPR.jpg')}}"  class="img-responsive">
                        <div class="text-container">
                            <h3>Sekretariat DPRD</h3>
                            
                        </div>
                    </a>
                </div>
            </div><!-- end portfolio -->
        </div><!-- end container -->
    </div><!-- end section -->
</x-people-layout>