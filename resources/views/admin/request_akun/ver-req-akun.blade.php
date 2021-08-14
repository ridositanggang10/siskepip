@section('title', 'Verifikasi Request Akun')
<x-admin-layout>    
 <!-- Right side column. Contains the navbar and content of the page -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Verifikasi Request Akun
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Verifikasi request akun</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="box box-warning">
        <div class="box-header">
          <a href="{{ url('/verifikasi/lists')}}" class="btn-sm btn-info" style="margin-left: 20px;"> Daftar Request Akun Baru</a>
          <a href="{{ url('/verifikasi/acc')}}" class="btn-sm btn-default" style="margin-left: 20px;"> Daftar Request
            Akun Diterima</a>
          <a href="{{ url('/verifikasi/reject')}}" class="btn-sm btn-default" style="margin-left: 20px;"> Daftar Request Akun
            Ditolak</a>
          <hr>
        </div>
        @include('alert')
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Instansi</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key=>$rq_akun)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td>{{$rq_akun->name}}</td>
                        <td>{{$rq_akun->email}}</td>
                        <td>
                            @foreach ($collection = DB::table('instansi')
                                                        ->select('*')
                                                        ->where('id',$rq_akun->ra_instansi_id)
                                                        ->get() as $item)
                                {{$item->instansi_name}}
                            @endforeach
                        </td>
                        <td>{{$rq_akun->created_at}}</td>
                        <td>
                            <a href="{{ url('/verifikasi/create-user/'.$rq_akun->id)}}" class="btn btn-success" style="margin-left: 40px;">Terima</a>
                            <a href="{{ url('/verifikasi/reject-req/'.$rq_akun->id)}}" class="btn btn-danger" style="margin-left: 20px;">Tolak</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section><!-- /.content -->
    <div class="d-flex justify-content-center">
        {!! $data->links('vendor.pagination.custome') !!}
    </div>
  </div><!-- /.content-wrapper -->
</x-admin-layout>