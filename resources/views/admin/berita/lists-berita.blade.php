@section('title', 'List Berita')
    <x-admin-layout>
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Berita
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">List Berita</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="box box-w">
                          <div class="box-header">
                              <h3 class="box-title">Daftar Berita Setiap Instansi</h3>
                              @include('alert')
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Judul</th>
                                          <th>Instansi</th>
                                          <th>Post Date</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($beritas as $berita)
                                      <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$berita->judul}}</td>
                                        <td>
                                          @foreach ($collection = DB::table('instansi')->where('id', $berita->berita_instansi_id)->get() as $item)
                                            {{$item->instansi_name}}
                                          @endforeach
                                        </td>
                                        <td>{{$berita->created_at}}</td>
                                        <td>
                                          <a href="{{url('/berita/berita-lists/admin-contet/'.$berita->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div><!-- /.box-body -->
                      </div><!-- /.box -->
                  </div><!-- /.col -->
              </div><!-- /.row -->
              <!--End Advanced Tables -->
               <div class="d-flex justify-content-center">
                  {!! $beritas->links('vendor.pagination.custome') !!}
              </div> 
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-admin-layout>
