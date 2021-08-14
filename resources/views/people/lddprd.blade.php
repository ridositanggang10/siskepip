@section('title','DPRD - Lengkapi Data')
<x-people-layout>
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Sekretariat DPRD</h2>
                        <ul class="page-title-link">
                            <li><a href="index.html">Beranda</a></li>
                            <li><a href="rating.html">Rating</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Lengkapi Data Diri Kemudian Berikan Rating</h3>
                <p class="lead">Isi data diri Anda terlebih dahulu.
                    <br>Kemudian jawab setiap pertanyaan kuisioner yang tersedia untuk memberikan rating ke instansi
                    tujuan Anda!
                </p>
            </div><!-- end title -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="contact_form">
                <div id="message"></div>
                <form id="contactform" class="row" action="contact.php" name="contactform" method="post">
                    <fieldset class="row-fluid">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Nama Lengkap
                            <input type="text" name="first_name" id="first_name" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Jenis Kelamin
                            <select name="select_service" id="select_service" class="selectpicker form-control"
                                data-style="btn-white">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Alamat Tinggal
                            <input type="text" name="addres" id="addres" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Nomor Telepon
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> Pendidikan Terakhir
                            <select name="select_service" id="select_service" class="selectpicker form-control"
                                data-style="btn-white">
                                <option value="12">SD</option>
                                <option value="Web Design">SMP</option>
                                <option value="Web Development">SMA</option>
                                <option value="Graphic Design">S1</option>
                                <option value="Others">S2</option>
                                <option value="Others">S3</option>
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Pekerjaan
                            <input type="text" name="addres" id="addres" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Berapa Usia Anda?
                            <select name="select_price" id="select_price" class="selectpicker form-control"
                                data-style="btn-white">
                                <option value="6th">6-10 tahun</option>
                                <option value="11th">11-20 tahun</option>
                                <option value="20th">21-30 tahun</option>
                                <option value="31th">31-40 tahun</option>
                                <option value="40th">41-50 tahun</option>
                                <option value="50th">51-70 tahun</option>
                                <option value="71">> 71 tahun</option>
                            </select>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Pilih Dinas Sekretariat Daerah
                            <select name="select_price" id="select_price" class="selectpicker form-control"
                                data-style="btn-white">
                                <option value="Bagian Umum">Bagian Umum</option>
                                <option value="Bagian Protokol">Bagian Protokol</option>
                                <option value="Bagian Hukum">Bagian Hukum</option>
                                <option value="Bagian Organisasi">Bagian Organisasi</option>
                                <option value="Bagian Tata Pemerintahan Umum">Bagian Tata Pemerintahan Umum</option>
                                <option value="Bagian Unit Kerja Pemerintah Barang dan Jasa">Bagian Unit Kerja
                                    Pemerintah Barang dan Jasa</option>
                                <option value="Bagian Ekonomi dan Pembangunan">Bagian Ekonomi dan Pembangunan</option>
                            </select>
                        </div>
                        <a href="Kuisioner-DPRD.html" class="btn btn-light btn-radius btn-brd grd1">Selanjutnya</a>
                    </fieldset>
                </form>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</x-people-layout>