<style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
@section('title', 'Detail-Standar Layanan')
    <x-user-layout>
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Standar Layanan</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Standard layanan</li>
                </ol>
            </section>

            <!-- Main content -->
            @foreach ($data as $datas)
                <section class="content">
                    <div class="box box-warning">
                        <div class="box box-solid">
                            <div class="col-xs-12">
                                <div class="box-header with-border">
                                    <h5 class="box-title">{{ $datas->judul }}</h5>
                                    <div class="box-tools pull-right">
                                        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i
                                                class="fa fa-chevron-left"></i></a>
                                        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i
                                                class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <div class="mailbox-read-message">
                                    {!! $datas->deskripsi !!}
                                </div><!-- /.mailbox-read-message -->
                            </div><!-- /.box-body -->

                            <div class="box-footer" >
                                <ul class="mailbox-attachments clearfix">
                                    @if ($datas->file)
                                <li>
                                    <div class="container" style="width:220px; height:140px;">
                                        <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                                            <div class="mailbox-attachment-info">
                                                <a href="$datas->foto" class="mailbox-attachment-name">
                                                    <i class="fa fa-paperclip">&nbsp; {{ Str::limit($datas->file, 20, $end='...') }}</i>
                                                </a>
                                                <span class="mailbox-attachment-size">
                                                    {{ number_format(File::size(public_path('assets_user/standarLayanan/files/' . $datas->file)) / 1048576, 2) . ' MB' }}
                                                    <a href="{{ url('/standar-layanan/download-std-file/'.$datas->file)}}" class="btn btn-default btn-xs pull-right"><i
                                                            class="fa fa-cloud-download"></i>
                                                    </a>
                                                </span>
                                            </div>
                                    </div>
                                </li>
                                @endif
                                @if ($datas->foto)
                                <li>
                                    <div class="container" style="width:220px; height:140px;">
                                        <span class="mailbox-attachment-icon has-img">
                                            <img src="{{ asset('assets_user/standarLayanan/pictures/' . $datas->foto) }}"
                                                alt="Attachment" class="img-fluid" />
                                        </span>
                                        <div class="mailbox-attachment-info">
                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera">&nbsp; {{ Str::limit($datas->foto, 20, $end='...') }}</i>
                                                </a>
                                            <span class="mailbox-attachment-size">
                                                {{ number_format(File::size(public_path('assets_user/standarLayanan/pictures/' . $datas->foto)) / 1048576, 2) . ' MB' }}
                                                <a href="{{ url('/standar-layanan/download-std-foto/'.$datas->foto)}}" class="btn btn-default btn-xs pull-right">
                                                    <i class="fa fa-cloud-download"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                </ul>
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
                                                        <h5>Apakah Anda Yakin Ingin Menghapus Bagian Ini?</h5>
                                                        <div class="modal-footer">
                                                            <a href="{{ url('/standar-layanan/delete-std/' . $datas->id) }}">
                                                                <button id="fa-delete" class="btn btn-primary"
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
                                            <a href="{{ url('/standar-layanan/all-lists') }}">
                                        </i>
                                        Back</a>
                                    </button>

                                    <button class="btn btn-default"><i class=" fa fa-edit"><a
                                                href="{{ url('standar-layanan/show-to-update/' . $datas->id) }}"></i>
                                        Update </a></button>
                                    <button id="fa-share" class="btn btn-default" data-toggle="modal"
                                        data-target="#shareModal">
                                        <i class="fa fa-share"></i><a href="">Share</a> </button>

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
                                                    <button class="btn btn-default"><i class="fa fa-phone-square"></i><a
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

                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- /.box-footer -->
                                </div><!-- /. box -->
                            </div>
                        </div>
                </section><!-- /.content -->
            @endforeach
        </div><!-- /.content-wrapper -->
    </x-user-layout>
