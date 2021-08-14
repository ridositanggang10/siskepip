<style>
    input::value{
        color:#000;
    }
</style>
@section('title', 'Rating')
<x-user-layout>    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Rating</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class=""><a href="rating.html">Rating</a> </li>
                <li class="active"> Tambah Pertanyaan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Daftar pertanyaan untuk pengguna</div>
                        @include('alert')
                        <div class="panel-body">
                            {{-- <form action="{{ url('/rating/post-form') }}" method="POST">
                                @csrf --}}
                                @foreach ($title as $titles)
                                <div class=" col-sm-12 nopadding form-group">
                                    <label for="survei_tag">Kategori</label>
                                    <input type="text" class="form-control" value="{{$titles->survei_tag}}" disabled>
                                </div>
                                <div class="col-sm-12 nopadding form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" value="{{$titles->judul}}" disabled>
                                </div>
                                
                                
                                @foreach ($data as $datas)
                                <div id="education_fields">
                                    <div class="col-sm-12 nopadding">
                                        <div class="form-group">
                                            <label for="pertanyaan">Pertanyaan ke-{{++$i}}</label>
                                            <input type="text" class="form-control" value="{{$datas->question}}" style="color:black" disabled>
                                        </div>
                                    </div>
    
                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <label for="pertanyaan">Opsi pertama</label>
                                            <input type="text" class="form-control" value="{{$datas->opsi_1}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <label for="pertanyaan">Opsi kedua</label>
                                            <input type="text" class="form-control" value="{{$datas->opsi_2}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <label for="pertanyaan">Opsi ketiga</label>
                                            <input type="text" class="form-control" value="{{$datas->opsi_3}}" disabled>
                                        </div>
                                    </div>
    
                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="form-group">
                                                    <label for="pertanyaan">Opsi keempat</label>
                                                    <input type="text" class="form-control" value="{{$datas->opsi_4}}" disabled>
                                                </div>
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="box-footer no-padding">
                                    <div class="mailbox-controls">
                                        <div class="pull-right">
                                            <a href="{{ url('/rating/rating-edit-form/'.$titles->survei_tag)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o">&nbsp; Edit</i></a>
                                        </div><!-- /.pull-right -->
                                    </div>
                                </div>
                                @endforeach
                            {{-- </form> --}}
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
    </div><!-- /.row -->

    </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</x-user-layout>