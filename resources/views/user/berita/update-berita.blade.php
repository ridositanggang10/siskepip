@section('title', 'Show Berita')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Berita</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Berita</li>
                </ol>
            </section>

            <!-- Main content -->
            @foreach ($data as $datas)
            <section class="content">
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='box box-warning'>
                            <div class="box-header with-border">
                                <h3 class="box-title">Update Berita</h3>
                            </div><!-- /.box-header -->
                            @include('alert')
                            <div class="box-body">
                                <form method="POST" action="{{ url('/berita/update-berita/'.$datas->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-xs-12">
                                        <label for="judul">Judul</label>
                                        <input name="judul" type="text" class="form-control" placeholder="{{$datas->judul}}" value="{{$datas->judul}}"/>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="link">Referensi Link</label>
                                        <input name="link" type="text" class="form-control" placeholder="{{$datas->link}}" value="{{$datas->link}}"/>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="berita_foto">Pilih foto</label>
                                        <input type="file" name="berita_foto" id="foto" value="{{$datas->berita_foto}}">
                                        <div style="margin-top:20px">Size: <span id="size">0</span> bytes</div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="berita_description">Isi Berita</label>
                                        <div class='box-body pad'>
                                            <textarea id="editor" name="berita_description">{{$datas->berita_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="box-footer clearfix no-border">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        <a href="{{ url('/berita/all-news')}}" class="btn btn-default">
                                            <i class=" fa fa-angle-left"></i> Back
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col-->
                </div><!-- ./row -->
            </section><!-- /.content -->
            @endforeach
        </div><!-- /.content-wrapper -->
    </x-user-layout>
