@section('title', 'Request Akun')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Request Akun</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Request Akun</li>
                </ol>

            </section>

            <!-- Main content -->
            <section class="content">
                <div class='row'>
                    <div class='col-xs-12'>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#fa-icons" data-toggle="tab">Request Akun Baru</a></li>
                                <li><a href="#glyphicons" data-toggle="tab">Daftar Semua Request Akun</a></li>
                            </ul>
                            <div class="tab-content">
                                <!-- Request Akun Baru -->
                                <div class="tab-pane active" id="fa-icons">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Advanced Tables -->
                                            <div class="box box-warning">
                                                <div class="panel-body">
                                                    @include('alert')
                                                    <form method="POST" action="{{ url('/request-akun/make-request') }}">
                                                        @csrf
                                                        <div class="form-group col-md-12">
                                                            <label for="name">Nama</label>
                                                            <input type="text" name="name" class="form-control" id="name">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="email">Email</label>
                                                            <input type="text" name="email" class="form-control" id="email">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="password">Password</label>
                                                            <input type="text" name="password" class="form-control"
                                                                id="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="password_confirm">Konfirmasi Password</label>
                                                            <input name="password_confirmation" type="text"
                                                                class="form-control" id="password_confirmation">

                                                        </div>
                                                        <button type="submit" class="btn btn-primary pull-right"
                                                            style="margin-right: 15px;">Request</button>
                                                    </form>
                                                </div>

                                            </div>
                                            <!--End Advanced Tables -->
                                        </div>
                                        <!--End Advanced Tables -->
                                    </div><!-- /.box -->
                                </div><!-- /#fa-icons -->

                                <!-- Daftar Semua Request Akun-->
                                <div class="tab-pane" id="glyphicons">
                                    <div class="panel panel-default">
                                        <div class="box box-warning">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover"
                                                        id="dataTables-example">
                                                        <thead>
                                                            <tr>
                                                                <th>Waktu Request</th>
                                                                <th>Nama</th>
                                                                <th>Email</th>
                                                            
                                                                <th>Status</th>
                                                                <th colspan="2" style="text-align:center">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $datas)
                                                                <tr class="odd gradeX">
                                                                    <td>{{ $datas->created_at }}</td>
                                                                    <td>{{ $datas->name }}</td>
                                                                    <td>{{ $datas->email }}</td>
                                                                    <?php
                                                                    $sts = $datas->status;
                                                                    ?>
                                                                    <td>
                                                                        @if ($sts == 'pending')
                                                                            <span class="label label-success">{{ $datas->status }}</span>
                                                                        @elseif($sts == 'accepted')
                                                                            <span class="label label-info">{{ $datas->status }}</span>
                                                                        @elseif($sts == 'rejected')
                                                                            <span class="label label-danger">{{ $datas->status }}</span>
                                                                        @endif
                                                                    </td>

                                                                    @if ($sts != 'accepted' && $sts != 'rejected' )
                                                                    
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="myModal" tabindex="-1"
                                                                        role="dialog" aria-labelledby="myModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"><span
                                                                                            aria-hidden="true">&times;</span></button>
                                                                                    <h4 class="modal-title"
                                                                                        id="myModalLabel">
                                                                                        Update Data
                                                                                        Request Akun
                                                                                    </h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="POST"
                                                                                        action="{{ url('/request-akun/update-request/' . $datas->id) }}">
                                                                                        @csrf
                                                                                        <div class="form-group row">
                                                                                            <label for="name"
                                                                                                class="col-sm-2 col-form-label">Nama</label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="name" name="name"
                                                                                                    placeholder="Nama"
                                                                                                    value="{{ $datas->name }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="email"
                                                                                                class="col-sm-2 col-form-label">Email</label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="email" name="email"
                                                                                                    placeholder="Email"
                                                                                                    value="{{ $datas->email }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    
                                                                                        <div class="form-group row">
                                                                                            <label
                                                                                                for="password_confirmation"
                                                                                                class="col-sm-2 col-form-label">Konfirmasi
                                                                                                Password</label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="password_confirmation"
                                                                                                    name="password_confirmation"
                                                                                                    placeholder="Konfirmasi Password">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary"
                                                                                                id="simpan">Simpan</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <td>
                                                                        <a href="" class="btn btn-default btn-sm"
                                                                            data-toggle="modal" data-target="#ModalDelete">
                                                                            <i class="fa fa-trash-o" data-toggle="tooltip"
                                                                                title="Delete"></i>
                                                                        </a>
                                                                    </td>


                                                                    <div class="modal fade" id="ModalDelete" tabindex="-1"
                                                                        role="dialog" aria-labelledby="ModalUpdateLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"><span
                                                                                            aria-hidden="true">&times;</span></button>
                                                                                    <h4 class="modal-title"
                                                                                        id="ModalDeleteLabel">Warning
                                                                                    </h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p>Apakah kamu yakin dengan pilihan ini?
                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <a
                                                                                        href="{{ url('/request-akun/delete-request/' . $datas->id) }}">
                                                                                        <button type="button"
                                                                                            class="btn btn-warning"
                                                                                            id="hapus">Hapus</button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </tr>                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer no-padding">
                                            <div class="mailbox-controls">
                                                <button class="btn btn-default btn-sm"><i
                                                        class="fa fa-refresh"></i></button>
                                                <div class="pull-right">
                                                    1-50/200
                                                    <div class="btn-group">
                                                        <button class="btn btn-default btn-sm"><i
                                                                class="fa fa-chevron-left"></i></button>
                                                        <button class="btn btn-default btn-sm"><i
                                                                class="fa fa-chevron-right"></i></button>
                                                    </div><!-- /.btn-group -->
                                                </div><!-- /.pull-right -->
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Advanced Tables -->
                                </div><!-- /#ion-icons -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-user-layout>
