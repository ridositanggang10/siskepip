@section('title', 'Kritik dan Saran')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Detail Kritik dan Saran</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="">Kritik dan Saran</li>
                    <li class="active"> Detail Kritik dan Saran</li>
                </ol>
                @include('alert')
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="col-md-12">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Detail</h3>
                                </div><!-- /.box-header -->
                                @foreach ($data as $datas)
                                <div class="box-body no-padding">
                                    <div class="mailbox-read-info">
                                        <h3>Detail Pesan dari Masyarakat</h3>
                                        <h5>From: {{ $datas->nama_lengakap }} <span class="mailbox-read-time pull-right">15
                                                Feb. 2015 11:03
                                                PM</span></h5>
                                    </div><!-- /.mailbox-read-info -->
                                    @foreach ($kds = DB::table('kirik_dan_saran')
                                                ->select('*')
                                                ->where('masyarakat_id',$datas->id)
                                                ->get(); as $item)
                                    <div class="mailbox-read-message">
                                            {!!$item->pesan!!}
                                        
                                        
                                    </div><!-- /.mailbox-read-message -->
                                </div><!-- /.box-body -->
                                @if ($item->foto)
                                <div class="box-footer">
                                    <ul class="mailbox-attachments clearfix">
                                        <li>
                                            <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                                            <div class="mailbox-attachment-info">
                                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                                    {{$item->foto}}</a>
                                                <span class="mailbox-attachment-size">
                                                    {{ number_format(File::size(public_path('assets_masyarakat/kritikdansaran/files/' . $item->foto)) / 1048576, 2) . ' MB' }}
                                                    <a href="{{ url('/kritik-dan-saran/download-kds/'.$item->foto)}}" class="btn btn-default btn-xs pull-right"><i
                                                            class="fa fa-cloud-download"></i></a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- /.box-footer -->
                                @endif
                                <div class="box-footer">
                                    @if (($item->status != 'accepted') and ($item->status != 'rejected'))
                                        <div class="pull-right">
                                            <button id="forward" class="btn btn-primary" data-toggle="modal"
                                                data-target="#forwardModal">
                                                Forward
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="forwardModal" tabindex="-1" role="dialog"
                                                aria-labelledby="forwardModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Redirect Kritik dan Saran
                                                            </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{url('/kritik-dan-saran/redirect-kds/'.$item->id)}}" method="POST">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <label for="inputinstansi"
                                                                        class="col-sm-2 col-form-label">Instansi Tujuan</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="instansi_baru" id="rkds_instansi_id" class="form-control">
                                                                            <?php 
                                                                                $instansi = DB::table('instansi')
                                                                                                ->select('*')
                                                                                                ->get();
                                                                            ?>
                                                                            @foreach ($instansi as $all)
                                                                                @if ($all->id != Auth::user()->instansiID)
                                                                                    <option value="{{$all->id}}">{{$all->instansi_name}}</option>
                                                                                @endif 
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        id="simpan">Kirim</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    @endif
                                    <a href="{{url('kritik-dan-saran/print-kds/'.$datas->id)}}" class="btn btn-primary"><i class="fa fa-print">&nbsp;</i>Print</a>
                                    @if ($item->status == 'accepted')
                                        <a href="{{url('kritik-dan-saran/show-to-public/'.$datas->id)}}" class="btn btn-success"><i class="fa fa-eye">&nbsp;</i>Show Public</a>
                                    @endif
                                    @if ($item->status == 'public')
                                        <a href="{{url('kritik-dan-saran/accept-kds/'.$item->id)}}" class="btn btn-success"><i class="fa fa-eye-slash">&nbsp;</i>Hide</a>
                                    @endif
                                    
                                </div><!-- /.box-footer -->
                            </div><!-- /. box -->
                        </div><!-- /.col -->
                        <!--End Advanced Tables -->
                    </div>
                    <!--End Advanced Tables -->

                </div><!-- /.box -->
        </div><!-- /.col -->
        </div><!-- /.row -->

        </section><!-- /.content -->
        </div><!-- /.content-wrapper -->                                
        @endforeach
        @endforeach
    </x-user-layout>
