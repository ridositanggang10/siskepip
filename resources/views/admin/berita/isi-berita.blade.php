<style>
    img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
@section('title', 'Berita')
<x-admin-layout>    
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
                                <a href="{{ url('/berita/berita-lists') }}" class="btn btn-default">
                                    <i class="fa fa-angle-left"></i>&nbsp; Back
                                </a>
                                <a href="{{url('/berita/delete-berita-admin/'.$datas->id)}}">
                                    <button id="fa-delete" class="btn btn-danger pull-right"
                                    data-toggle="modal" data-target="#deleteModal">
                                    Delete</button>
                                </a>


                                {{-- <button id="fa-share" class="btn btn-default" data-toggle="modal"
                                    data-target="#shareModal"><i class="fa fa-share"></i><a href="">Share</a>
                                </button>
                                <div class="modal fade" id="shareModal" tabindex="-1" role="dialog"
                                    aria-labelledby="shareModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Share
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <p>
                                                        <button class="btn btn-default"><i
                                                                class="fa fa-phone-square"></i><a
                                                                href="https://web.whatsapp.com/"></i>&nbsp;
                                                                Whatsapp</button>

                                                        <button class="btn btn-default"><i class="fa fa-facebook"></i><a
                                                                href="https://www.facebook.com/"></i>
                                                                facebook</button>
                                                        <button class="btn btn-default"><i class="fa  fa-twitter"></i><a
                                                                href="https://twitter.com/twitter"></i>
                                                                twitter</button>
                                                        <button class="btn btn-default"><i class="fa fa-envelope"></i><a
                                                                href="https://mail.google.com/mail/u/0/#inbox?compose=new"></i>
                                                                Email</button>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div><!-- /.box-footer -->
                            </div><!-- /. box -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
        </section><!-- /.content -->
        @endforeach
    </div><!-- /.content-wrapper -->
</x-admin-layout>