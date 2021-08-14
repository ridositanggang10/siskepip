@section('title','Tentang')
<x-people-layout>
    
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Tentang</h2>
                        <ul class="page-title-link">
                            <li><a href="{{ url('/public/beranda')}}">Beranda</a></li>
                            <li><a href="{{ url('/public/tentang')}}">Tentang</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr1">
    <div id="about" class="section wb" style="margin-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h4>Visi</h4>
                        <h2>Berikut Visi dari website SISKePIP</h2>
                        <p class="lead">Sistem Informasi dan Survei Kepuasan Pelayanan Informasi Publik Kabupaten
                            Humbang Hasundutan.</p>

                        <p align="justify">
                            <li>1. Membangun hubungan yg baik dengan masyarakat.</li>
                            <li>2. Menjadikan dinas menjadi wadah aspirasi masyarakat dalam meningkatkan mutu pelayanan
                                pemerintah.</li>
                            <li>3. Memberikan pelayanan terbaik kepada masyarakat.</li>
                            <li> 4. Menyediakan kritik dan saran sebagai sarana perbaikan diri dan pengembangan kualitas
                                pelayanan dinas.</li>
                        </p>

                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="{{ asset('people/uploads/about_01.jpg')}}" alt="" class="img-responsive img-rounded">
                        <a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]"
                            class="playbutton"><i class="flaticon-play-button"></i></a>
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="hr1">

            <div class="row">
                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="{{ asset('people/uploads/about_02.jpg')}}" alt="" class="img-responsive img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="message-box">
                        <h4>Misi</h4>
                        <h2>Berikut Misi dari website SISKePIP</h2>
                        <p class="lead">Sistem Informasi dan Survei Kepuasan Pelayanan Informasi Publik Kabupaten
                            Humbang Hasundutan.</p>

                        <p align="justify">
                            <li>1. Membangun hubungan yg baik dengan masyarakat.</li>
                            <li>2. Menjadikan dinas menjadi wadah aspirasi masyarakat dalam meningkatkan mutu pelayanan
                                pemerintah.</li>
                            <li>3. Memberikan pelayanan terbaik kepada masyarakat.</li>
                            <li> 4. Menyediakan kritik dan saran sebagai sarana perbaikan diri dan pengembangan kualitas
                                pelayanan dinas.</li>
                        </p>

                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
</x-people-layout>