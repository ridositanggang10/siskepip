@section('title', 'Dashboard')
<x-admin-layout>
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
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
                                    @foreach ($hasil_rating = DB::table('hasil_penilaian_instansi')->select('*')->get() as $rating)
                                    <div class="col-sm-4">
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
                    </div><!-- /.col (RIGHT) -->
                    <div class="col-xs-12">
                        <div class="box box-warning">
                          <div class="box-header"><i class="fa fa-files-o"></i>
                            <h3 class="box-title">Verifikasi Request Akun</h3>
                            <div class="box-tools">
                              <div class="input-group">
                                <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                <div class="input-group-btn">
                                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                              </div>
                            </div>
                          </div><!-- /.box-header -->
                          <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                              <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Instansi</th>
                                <th>Status</th>
                              </tr>
                              @foreach ($request_akun = DB::table('request_akun')->select('*')->orderby('created_at','desc')->paginate(5) as $ra)
                                <tr>
                                  <td>{{ substr($ra->id, 0, 5)}}</td>
                                  <td>{{ $ra->name }}</td>
                                  <td>{{ $ra->email }}</td>
                                  @foreach ($instansi_detail = DB::table('instansi')->select('*')->where('id',$ra->ra_instansi_id)->get() as $instansi)
                                  <td>{{$instansi->instansi_name}}</td>
                                  @endforeach
                                  
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
                            </table>
                            <div class="box-footer clearfix">
                                <a href="{{url('/verifikasi/acc')}}" class="btn btn-sm btn-default btn-flat pull-left">Lihat Semua Request</a>
                              </div><!-- /.box-footer -->
                          </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                    <div class='col-md-6'>
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                          <div class="box-header with-border"><i class="fa fa-group (alias)"></i>
                            <h3 class="box-title">Daftar Pengguna Aktif</h3>
                            <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                          </div><!-- /.box-header -->
                          <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                              @foreach ($user = DB::table('users')->select('*')->paginate(8) as $users)
                                <li>
                                  <img src="{{ asset('/profile.png')}}" alt="User Image"/>
                                  <a class="users-list-name">{{$users->name}}</a>
                                  @foreach ($user_instansi = DB::table('instansi')->select('*')->where('id',$users->instansiID)->get() as $u_ins)
                                    <span class="users-list-instansi">{{$u_ins->instansi_name}}</span>
                                  @endforeach
                                </li>
                              @endforeach
                            </ul><!-- /.users-list -->
                          </div><!-- /.box-body -->
                          <div class="box-footer text-center">
                            <a href="{{ url('/kelola-pengguna/all-user')}}" class="uppercase">Lihat Semua</a>
                          </div><!-- /.box-footer -->
                        </div><!--/.box -->
                    </div><!-- /.col -->
                    <div class='col-md-6'>
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-laptop"></i>
                                <h3 class="box-title">Daftar Berita</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="todo-list">
                                  @foreach ($news = DB::table('berita')->select('*')->orderBy('created_at','desc')->paginate(5) as $berita)
                                    <li>
                                        <!-- drag handle -->
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <!-- todo text -->
                                        <a href="{{ url('/berita/berita-lists/admin-contet/'.$berita->id)}}">
                                            <span class="text">{{substr($berita->judul, 0, 50)}}</span>
                                        </a>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o"></i>{{date('d-m-Y', strtotime($berita->created_at))}}</small>
                                    </li>
                                  @endforeach
                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                              <a href="{{ url('/berita/berita-lists')}}" class="uppercase">Lihat Semua Berita</a>
                            </div><!-- /.box-footer -->
                          </div><!-- /.box -->
                    </div>
                    <div class='col-md-6'>
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <i class="fa fa-envelope"></i>
                                <h3 class="box-title">Kritik dan Saran Terbaru</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <ul class="products-list product-list-in-box">
                                @foreach ($kritik_dan_saran = DB::table('kirik_dan_saran')->select('*')->orderby('created_at','desc')->paginate(5) as $kds)
                                  <li class="item">
                                    <div class="product-img">
                                      @if ($kds->foto)
                                        <img src="{{ asset('assets_masyarakat/kritikdansaran/files/'.$kds->foto)}}" alt="Product Image"/>
                                      @else
                                        <img src="{{ asset('images/paper.png')}}" alt="Product Image"/>
                                      @endif
                                    </div>
                                    <div class="product-info">
                                      @foreach ($data_mas = DB::table('data_masyarakat')->select('*')->where('id',$kds->masyarakat_id)->get() as $dmas)
                                        <a href="javascript::;" class="product-title">{{$dmas->nama_lengakap}}</a>
                                      @endforeach
                                      <span class="product-description">
                                        {!!substr($kds->pesan, 0, 20)!!}
                                      </span>
                                    </div>
                                  </li><!-- /.item -->
                                @endforeach
                              </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                              <a href="{{url('/kritik-dan-saran/kds-lists')}}" class="uppercase">Lihat Semua Kritik dan Saran</a>
                            </div><!-- /.box-footer -->
                          </div><!-- /.box -->
                    </div>
                </div>
                
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
</x-admin-layout>