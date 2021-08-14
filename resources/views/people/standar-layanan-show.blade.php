<style>
    a img, p img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .widget-title img{
        margin-left: 0;
        margin-right: 0;
        width: 50%;
    }
</style>
@section('title','Standar Layanan')
<x-people-layout>
    
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Standar Layanan</h2>
                        <ul class="page-title-link">
                            <li><a href="{{ url('/public/beranda')}}">Beranda</a></li>
                            <li><a href="{{ url('/public/standar-layanan')}}">Standar Layanan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper" style="margin: 100px 0">
        <!-- Main content -->
        @foreach ($data as $datas)
            <section class="container">
                <div class="box box-warning">
                    <div class="box box-solid">
                        <div class="col-xs-12">
                            <div class="box-header with-border">
                                <h1 class="box-title" style="font-weight: bold">{{ $datas->judul }}</h1>
                            </div>
                            <div class="mailbox-read-message" style="color: black">
                                {!! $datas->deskripsi !!}
                            </div><!-- /.mailbox-read-message -->
                        </div><!-- /.box-body -->

                        <div class="box-footer">
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
                                                    <a href="{{ url('/public/download-std-file/people/'.$datas->file)}}" class="btn btn-default btn-xs pull-right"><i
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
                                                <a href="{{ url('/public/download-std-foto/people/'.$datas->foto)}}" class="btn btn-default btn-xs pull-right">
                                                    <i class="fa fa-cloud-download"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
            </section><!-- /.content -->
        @endforeach
    </div><!-- /.content-wrapper -->
</x-people-layout>