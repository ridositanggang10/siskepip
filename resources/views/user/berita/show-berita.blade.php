<style>
    img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
@section('title', 'Show Berita')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Berita</h1>
                <ol class="breadcrumb">
                    <li><a href="../pages/dashboard.html"><i class="fa fa-dashboard"></i> Berita</a></li>
                    <li><a href="../pages/berita.html">Berita</a></li>
                    <li class="active">Detail Berita</li>
                </ol>
            </section>

            <!-- Main content -->
            @foreach ($data as $datas)
            <section class="content">
                <div class='row'>
                    <div class='col-xs-12'>
                        <div class="box box-solid">
                            <div class="box box-warning">
                                <div class="box-body no-padding">
                                    <div class="mailbox-read-info">
                                        <h3>{{$datas->judul}}
                                        </h3>
                                        @foreach ($instansi = DB::table('instansi')
                                                                ->select('*')
                                                                ->where('id',$datas->berita_instansi_id)
                                                                ->get(); as $item)
                                            <h5>Penulis : {{$item->instansi_name}} 
                                        @endforeach
                                            <span class="mailbox-read-time pull-right">{{$datas->created_at}}</span></h5>
                                        
                                        
                                    </div><!-- /.mailbox-read-info -->
                                    <div class="box-header">
                                        <ul class="mailbox-attachments clearfix">
                                            <span class="mailbox-attachment-icon has-img"><img
                                                    src="{{ asset('assets_user/berita/pictures/'.$datas->berita_foto)}}" alt="Attachment" width="400px"
                                                    height="100px" /></span>
                                    </div>
                                    <div class="mailbox-read-message">
                                        <p>{!! $datas->berita_description !!}</p>
                                    </div><!-- /.mailbox-read-message -->
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="pull-right">
                                        <button id="fa-delete" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteModal">
                                            Delete</button>
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Delete
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Apakah Anda Yakin Ingin Menghapus Berita ini?</h5>
                                                        <div class="modal-footer">
                                                            <a href="{{url('/berita/delete-berita/'.$datas->id)}}">
                                                                <button id="fa-delete" class="btn btn-danger"
                                                                data-toggle="modal" data-target="#deleteModal">
                                                                Delete</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-default">
                                        <i class=" fa fa-angle-left">
                                            <a href="{{ url()->previous() }}">
                                        </i>
                                        Back
                                    </button></a>
                                    <button class="btn btn-default"><i class=" fa fa-edit"><a
                                                href="{{ url('/berita/update-berita-view/'.$datas->id)}}"></i>
                                        Update</button></a>
                                </div><!-- /. box -->
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
            </section><!-- /.content -->
            @endforeach
        </div><!-- /.content-wrapper -->
    </x-user-layout>
