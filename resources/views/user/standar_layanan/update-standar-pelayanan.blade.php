@section('title', 'Detail-Standar Layanan')
    <x-user-layout>
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Standar Layanan</h1>
                <ol class="breadcrumb">
                    <li><a href="../pages/dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Standar Layanan</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class='row'>
                    <div class='col-md-12'>
                        <div class='box box-warning'>
                            <div class="box-header with-border">
                                <h3 class="box-title">Update Standar Layanan</h3>
                                @include('alert')
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                @foreach ($data as $datas)
                                <form method="POST" action="{{ url('/standar-layanan/update-std/'.$datas->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-xs-12">
                                        <label>Judul</label>
                                        <input type="text" name="judul" class="form-control" placeholder="Judul Berita ..." value="{{$datas->judul}}"/>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="exampleInputFile">Pilih Foto</label>
                                        <input type="file" id="foto" name="foto">
                                        <div style="margin-top:20px">Size: <span id="size">0</span> bytes</div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="exampleInputFile">Pilih File</label>
                                        <input type="file" id="file" name="file">
                                        <div style="margin-top:20px">Size: <span id="size_file">0</span> bytes</div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label>Isi Standar Layanan</label>
                                        <div class='box-body pad'>
                                            <textarea id="editor" name="deskripsi">{{$datas->deskripsi}}</textarea>
                                        </div>
                                    </div>
                                    <div class="box-footer clearfix no-border">
                                        <button type='submit' class="btn btn-primary pull-right"> Submit</button>
                                        <a href="{{ url('/standar-layanan/all-lists/'.$datas->id)}}">
                                            <button class="btn btn-default"><i class=" fa fa-angle-left"></i> Back</button>
                                        </a>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col-->
                </div><!-- ./row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-user-layout>
