@section('title', 'Kelola Pengguna')
    <x-admin-layout>
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Kelola Pengguna
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Kelola Pengguna</li>
                </ol>
            </section>
           
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-w">
                            <div class="box-header">
                                <h3 class="box-title">Daftar Pengguna Siskepip</h3>
                                @include('alert')
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat Email</th>
                                            <th>Instansi</th>
                                            {{-- <th>Role</th>
                                            <th>Bergabung Sejak</th> --}}
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $user_datas)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user_datas->name }}</td>
                                                <td>{{ $user_datas->email }}</td>
                                                @foreach ($collection = DB::table('instansi')->where('id', $user_datas->instansiID)->get() as $item)
                                                    <td>{{ $item->instansi_name }}</td>
                                                @endforeach
                                                {{-- @foreach ($instansi = DB::table('role_user')->select('*')->where('user_id', $user_datas->id)->get() as $instansi_collection)
                                                    @if ($instansi_collection->role_id == 1)
                                                        <td>Admin</td>
                                                    @else
                                                        <td>User</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $user_datas->created_at }}</td> --}}
                                                <td>
                                                  <a href="{{ url('kelola-pengguna/show-edit-form/'.$user_datas->id)}}" style="text-decoration: none"><button class="btn btn-primary"><i class="fa fa-eye"> Lihat</i></button></a>
                                                  <a href="{{ url('kelola-pengguna/delete-user/'.$user_datas->id)}}" style="text-decoration: none"><button class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></button></a>
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
                    {!! $data->links('vendor.pagination.custome') !!}
                </div>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </x-admin-layout>
