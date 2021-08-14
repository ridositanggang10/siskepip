@section('title', 'Create Berita')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Berita</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active"> Berita</li>

                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class='row'>
                    <div class='col-xs-12'>
                        <div class="box box-solid">
                            <div class="panel panel-default">
                                <div class="box box-warning">
                                    @include('alert')
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Daftar Berita Instansi</Nama>
                                            </h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <ul class="todo-list">
                                                @foreach ($data as $datas)
                                                <div class="col-sm-6" >
                                                    <div class="card" style="height: 140px; margin-bottom: 10px;">
                                                      <div class="card-body">
                                                        <h5 class="card-title" style="font-weight: bold">{{$datas->judul}}</h5>
                                                        <p class="card-text">{!! Str::limit($datas->berita_description, 100, $end='...') !!}</p>
                                                        <a href="{{url('/berita/all-news/content/'.$datas->id)}}" class="btn btn-success">Selengkapnya</a>
                                                      </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </ul>
                                        </div><!-- /.box-body -->
                                </div>
                                <div class="box-footer clearfix no-border">
                                    <a href="{{ url('/berita/create-berita')}}"><button class="btn btn-default pull-right"><i
                                                class="fa fa-plus"></i> Buat Berita Baru</button></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-user-layout>
