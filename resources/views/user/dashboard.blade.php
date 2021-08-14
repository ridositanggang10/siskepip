@section('title', 'Dashboard')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Dashboard</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Laporan Bulanan Instansi-->
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <i class="ion ion-clipboard"></i>
                                <h3 class="box-title">Laporan Bulanan Instansi</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="container-fluid" style="margin-left: 40px">
                                    <div class="row">
                                        @foreach ($hasil_rating = DB::table('hasil_penilaian_instansi')->select('*')->where('hpi_instansi_id', Auth::user()->instansiID)->get() as $rating)
                                        <div class="col-sm-6">
                                            <h5>{{$rating->question_tag}}</h5>
                                            <div class="c100 p25">
                                                <span>{{$rating->jumlah_rating}}%</span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div><!-- /.row -->
                                </div>
                            </div><!-- ./box-body -->
                        </div><!-- /.box -->

                        <!-- TO DO List -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-laptop"></i>
                                <h3 class="box-title">Berita</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="todo-list">
                                    @foreach ($beritas = DB::table('berita')->select('*')->where('berita_instansi_id', Auth::user()->instansiID)->orderby('created_at','desc')->paginate(5) as $berita)
                                    <li>
                                        <!-- todo text -->
                                        <a href="{{url('/berita/all-news/content/'.$berita->id)}}">
                                            <span class="text">{{$berita->judul}}</span>
                                        </a>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o">&nbsp;</i>{{date('d-m-Y', strtotime($berita->created_at))}}</small>
                                    </li>
                                    @endforeach
                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix no-border">
                                <button class="btn btn-default pull-right"><i class="fa fa-plus">
                                        <a href="{{ url('/berita/create-berita')}}"></i> Tambahkan Berita</button></a>
                            </div>
                        </div><!-- /.box -->

                    </section><!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">
                        <!-- Kalender -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <i class="fa fa-envelope"></i>
                                <h3 class="box-title">Kritik dan Saran</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    @foreach ($kritikdansaran = DB::table('kirik_dan_saran')->select('*')->where('ks_instansi_id',Auth::user()->instansiID)->paginate(5) as $kds)
                                        <li class="item">
                                            <div class="product-img">
                                                @if ($kds->foto)
                                                    <img src="{{ asset('assets_masyarakat/kritikdansaran/files/'.$kds->foto)}}" alt="Product Image" />
                                                @else
                                                <img src="{{ asset('images/paper.png')}}" alt="Product Image" />
                                                @endif
                                                
                                            </div>
                                            <div class="product-info">
                                                @foreach ($data_masyarakat = DB::table('data_masyarakat')->select('*')->where('id',$kds->masyarakat_id)->get() as $mas_data)
                                                    <a href="{{ url('/kritik-dan-saran/detail/'.$mas_data->id)}}" class="product-title">{{ $mas_data->nama_lengakap}}</a>
                                                @endforeach
                                                
                                                <span class="product-description">
                                                    {!! substr($kds->pesan, 0, 50) !!}
                                                </span>
                                            </div>
                                        </li><!-- /.item -->
                                    @endforeach
                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{ url('kritik-dan-saran/all-lists')}}" class="uppercase">Lihat semua</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->

                        <!-- TABLE: Request Akun -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <i class="fa fa-files-o"></i>
                                <h3 class="box-title">List Request Akun</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Nama Lengkap</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($requestAkun = DB::table('request_akun')->select('*')->where('ra_instansi_id',Auth::user()->instansiID)->orderby('created_at','desc')->paginate(5) as $ra)
                                            <tr>
                                                <td>{{ substr($ra->id, 0, 8)}}</td>
                                                <td>{{$ra->name}}</td>
                                                <td>
                                                    @if ($ra->status == 'accepted')
                                                        <span class="label label-success">Diterima</span>
                                                    @elseif($ra->status == 'pending')
                                                        <span class="label label-warning">Menunggu</span>
                                                    @else
                                                        <span class="label label-danger">Ditolak</span>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <a href="{{url('/request-akun/request-lists')}}">Request Akun
                                    Baru</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->

                    </section><!-- right col -->
                </div><!-- /.row (main row) -->

            </section><!-- /.content -->

        </div><!-- /.content-wrapper -->
    </x-user-layout>
