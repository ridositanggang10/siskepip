@section('title', 'Detail Kritik dan Saran')
    <x-admin-layout>
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Detail Kritik dan Saran
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Kritik dan saran</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($data as $kds_data)
                            @foreach ($collection = DB::table('data_masyarakat')->select('*')->where('id', $kds_data->masyarakat_id)->get() as $mas_data)
                                <!-- Advanced Tables -->
                                <div class="col-md-12">
                                    <div class="box box-warning">
                                        <div class="box-body no-padding">
                                            <div class="mailbox-read-info">
                                                <h3>Detail Kritik dan Saran</h3>
                                                <h5>From: {{ $mas_data->nama_lengakap }}<span
                                                        class="mailbox-read-time pull-right">{{ $mas_data->created_at }}</span>
                                                </h5>
                                            </div><!-- /.mailbox-read-info -->

                                            <div class="mailbox-read-message">
                                                {!! $kds_data->pesan !!}
                                            </div><!-- /.mailbox-read-message -->
                                        </div><!-- /.box-body -->
                                        @if ($kds_data->foto)
                                            <div class="box-footer">
                                                <ul class="mailbox-attachments clearfix">
                                                    <li>
                                                        <span class="mailbox-attachment-icon has-img">
                                                            <img
                                                                src="{{ asset('assets_masyarakat/kritikdansaran/files/' . $kds_data->foto) }}" />
                                                        </span>
                                                        <div class="mailbox-attachment-info">
                                                            <a href="#" class="mailbox-attachment-name"><i
                                                                    class="fa fa-camera"></i>{{ $kds_data->foto }}</a>
                                                            <span class="mailbox-attachment-size">
                                                                {{ number_format(File::size(public_path('assets_masyarakat/kritikdansaran/files/' . $kds_data->foto)) / 1048576, 2) . ' MB' }}
                                                                <a href="{{ url('kritik-dan-saran/download-foto/' . $kds_data->foto) }}"
                                                                    class="btn btn-default btn-xs pull-right"><i
                                                                        class="fa fa-cloud-download"></i></a>
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div><!-- /.box-footer -->
                                        @endif
                                        <div class="box-footer">
                                            <div class="pull-right">
                                                <!-- Modal -->
                                                <a href="{{ url('/kritik-dan-saran/download-page/' . $mas_data->id) }}"
                                                    class="btn btn-default pull-left">
                                                    <i class="fa fa-cloud-download"></i>&nbsp; Download
                                                </a>
                                                <a class="btn btn-default pull-left" data-toggle="modal"
                                                    data-target="#ModalDelete" style="margin-left: 5px">
                                                    <i class="fa fa-trash-o" data-toggle="tooltip"></i>
                                                    &nbsp; Delete
                                                </a>
                                                <!--Modal-->
                                                <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog"
                                                    aria-labelledby="ModalUpdateLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="ModalDeleteLabel">
                                                                    Warning
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah kamu yakin akan menghapus data ini? </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{url()->previous()}}" class="btn btn-default pull-left"><i class="fa fa-backward"></i>&nbsp; Kembali</a>
                                                                <a href="{{url('/kritik-dan-saran/delete-record/'.$mas_data->id)}}" class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i>&nbsp; Hapus</a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ url('/kritik-dan-saran/kds-lists') }}"><button
                                                    class="btn btn-default "><i class="fa fa-left"></i>Back</button></a>
                                        </div><!-- /.box-footer -->
                                    </div><!-- /. box -->
                                </div><!-- /.col -->
                                <!--End Advanced Tables -->
                    </div>
                    <!--End Advanced Tables -->
                    @endforeach
                    @endforeach
                </div><!-- /.box -->
        </div><!-- /.col -->
        </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-admin-layout>
