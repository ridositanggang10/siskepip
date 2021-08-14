@section('title','Rating')
<x-people-layout>
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Sekretariat Badan</h2>
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
                <h3>Kuisioner Rating Badan</h3>
                <p class="lead">Jawablah kuisioner dengan jujur<br>
                    Karena kejujuran selalu membawa kepada kebaikan
                </p>
            </div><!-- end title -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="row" style="margin-bottom: 100px">
        <div class="col-md-8 col-md-offset-2">
            <div class="contact_form">
                <div id="message">@include('alert')</div>
                <form  class="row" action="{{ url('public/rating/form-two/'.$tag)}}" name="contactform" method="post">
                    @csrf
                    <div hidden>
                        <input type="text" name="id" value="{{$data_user['id']}}" placeholder="{{$data_user['id']}}">
                        <input type="text" name="nama_lengakap" value="{{$data_user['nama_lengakap']}}" placeholder="{{$data_user['nama_lengakap']}}">
                        <input type="text" name="jenis_kelamin" value="{{$data_user['jenis_kelamin']}}" placeholder="{{$data_user['jenis_kelamin']}}">
                        <input type="text" name="alamat" value="{{$data_user['alamat']}}" placeholder="{{$data_user['alamat']}}">
                        <input type="text" name="nomor_telepon" value="{{$data_user['nomor_telepon']}}" placeholder="{{$data_user['nomor_telepon']}}">
                        <input type="text" name="pendidikan_terakhir" value="{{$data_user['pendidikan_terakhir']}}" placeholder="{{$data_user['pendidikan_terakhir']}}">
                        <input type="text" name="pekerjaan" value="{{$data_user['pekerjaan']}}" placeholder="{{$data_user['pekerjaan']}}">
                        <input type="text" name="usia" value="{{$data_user['usia']}}" placeholder="{{$data_user['usia']}}">
                    </div>
                    <fieldset class="row-fluid">
                        @foreach ($datas = DB::table('survei_questions')
                                    ->select('*')
                                    ->where('survei_tag',$tag)
                                    ->get() as $key=>$data)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 15px">
                            <span class="space2">
                                <b>
                                    <span>{{$data->question_number+1}}.</span> 
                                    {{$data->question}}
                                </b>
                            </span>
                            <br> 
                            <div class="question-container" style="padding: 5px 10px">
                                <input type="radio"  name="{{'nilai'.$key}}" value="25" style="margin:0 5px"><label for="child">{{$data->opsi_1}}</label><br>
                                <input type="radio"  name="{{'nilai'.$key}}" value="50" style="margin:0 5px"><label for="child">{{$data->opsi_2}}</label><br>
                                <input type="radio"  name="{{'nilai'.$key}}" value="75" style="margin:0 5px"><label for="child">{{$data->opsi_3}}</label><br>
                                <input type="radio"  name="{{'nilai'.$key}}" value="100" style="margin:0 5px"><label for="child">{{$data->opsi_4}}</label><br>
                            </div>
                        </div>
                        @endforeach 
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-light btn-radius btn-brd grd1 pull-right">Kirim</button>
                            </div>
                    </fieldset>
                </form>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</x-people-layout>
