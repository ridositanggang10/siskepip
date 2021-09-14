@section('title','Kritik dan Saran')
<x-people-layout>
    
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Kritik dan Saran</h2>
                        <ul class="page-title-link">
                            <li><a href="{{ url('/public/beranda')}}">Beranda</a></li>
                            <li><a href="{{ url('/public/kritik-dan-saran')}}">Kirim Masukan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Formulir penyampaian masukan dan penilaian terhadap pelayanan instansi di Humbang Hasundutan
                </h3>
                <p class="lead">Anda dapat menyampaikan masukan, kritikan, dan juga penilaian Anda terhadap
                    layanan dari setiap instansi di Humbang Hasundutan<br>Tetaplah dengan bahasa yang sopan dan
                    beretika</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="contact_form">
                        <div id="message">@include('alert')</div>                          
                        <fieldset class="row-fluid">
                        <form action="{{ url('/public/kds/create-kritik-dan-saran')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Nama Lengkap
                                    <input type="text" name="nama_lengakap" id="first_name" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Jenis Kelamin
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option selected disabled>-- Pilih Salah Satu --</option>
                                        <option value="Pria">Laki-laki</option>
                                        <option value="Wanita">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Usia
                                    <select name="usia" id="usia" class="form-control">
                                        <option selected disabled>-- Pilih Salah Satu --</option>
                                        <option value="1">15 - 20 tahun</option>
                                        <option value="2">21 - 25 tahun</option>
                                        <option value="3">26 - 30 tahun</option>
                                        <option value="4">31 - 35 tahun</option>
                                        <option value="5">40 - 45 tahun</option>
                                        <option value="6">46 - 50 tahun</option>
                                        <option value="7">55 - 60 tahun</option>
                                        <option value="8">61 - 65 tahun</option>
                                        <option value="9">66 - 70 tahun</option>
                                        <option value="10"> > 70 tahun</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Nomor Telepon Aktif
                                    <input type="tel" name="nomor_telepon" id="nomor_telepon" class="form-control" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="Contoh : 0823-8080-4546">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Alamat Tinggal Saat ini
                                    <input type="text" name="alamat" id="alamat" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Pendidikan Terakhir
                                    <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
                                        <option selected disabled>-- Pilih Salah Satu --</option>
                                        <option value="paud/tk">Pendidikan Anak Usia Dini / Taman Kanak-kanak</option>
                                        <option value="sd">Sekolah Dasar</option>
                                        <option value="smp">Sekolah Menengah Pertama</option>
                                        <option value="sma/smk">Sekolah Menengah Atas/Kejuruan</option>
                                        <option value="d1">Ahli Pratama (D1)</option>
                                        <option value="d2">Ahli Muda (D2)</option>
                                        <option value="d3">Ahli Madya (D3)</option>
                                        <option value="d4">Sarjana Sains Terapan (D4)</option>
                                        <option value="s1">Sarjana (S1)</option>
                                        <option value="s2">Magister (S2)</option>
                                        <option value="s3">Doktor (S3)</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Pekerjaan
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Pilih Instansi Tujuan
                                    <select name="ks_instansi_id" id="ks_instansi_id" class="form-control">
                                        <option selected disabled>-- Pilih Salah Satu --</option>
                                        @foreach ($data as $datas)
                                        <option value="{{$datas->id}}">{{$datas->instansi_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Foto atau File (*max 2mb)
                                    <input type="file" name="foto" id="foto" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="pesan" id="editor"></textarea>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center pull-right" style="margin-top: 20px">
                                    <button type="submit" class="button btn btn-light btn-radius btn-brd pull-right">Submit</button>
                                </div>
                          
                        </form>
                    </fieldset>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
</x-people-layout>