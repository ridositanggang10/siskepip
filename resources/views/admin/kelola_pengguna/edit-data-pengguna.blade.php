@section('title', 'Edit Data Pengguna')
<x-admin-layout>
<style>
    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;
    }
    
    th, td {
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even){background-color: #f2f2f2}
</style>
@foreach ($data as $datas)
 <div class="content-wrapper" style="background-color: #fff; padding: 20px">
        <section class="content-header">
            <h1>
                Kelola Pengguna
            </h1>
            <hr>
            <table style="overflow-x:auto;">
                <tr>
                    <td>User id</td>
                    <td>{{$datas->id}}</td>
                  </tr>
                  <tr>
                    <td>User name</td>
                    <td>{{$datas->name}}</td>
                  </tr>
                  <tr>
                    <td>Instansi</td>
                    <td>
                        @foreach ($collection = DB::table('instansi')->where('id', $datas->instansiID)->get() as $item)
                            {{ $item->instansi_name }}
                        @endforeach
                    </td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$datas->email}}</td>
                  </tr>
                  <tr>
                      <td>Role</td>
                      <td>
                        @foreach ($instansi = DB::table('role_user')->select('*')->where('user_id', $datas->id)->get() as $instansi_collection)
                            @if ($instansi_collection->role_id == 1)
                                Admin
                            @else
                                User
                            @endif
                        @endforeach
                      </td>
                  </tr>
              </table>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-w">
                        {{-- <div class="box-header">
                            <h3 class="box-title">Ubah Role</h3>
                            @include('alert')
                        </div><!-- /.box-header -->
                        <div class="box-body" style="padding: 20px 0 40px 0 ">
                            <form action="{{ url('kelola-pengguna/update-role/'.$datas->id)}}" method="POST">
                                @csrf
                                <label for="role_id">Update role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option selected disabled>-- Pilih Role --</option>
                                    @foreach ($user_role = DB::table('roles')
                                                                ->select('*')
                                                                ->get(); as $role_item)
                                        <option value="{{$role_item->id}}">{{$role_item->display_name}}</option>
                                    @endforeach
                                </select>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px">
                                        Ubah 
                                    </button>
                                </div>
                            </form>
                        </div> --}}
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{url('/kelola-pengguna/all-user')}}" style="text-decoration: none;">
                                    <button type="submit" class="btn btn-secondary" style="margin-top: 20px">
                                        Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endforeach
</x-admin-layout>