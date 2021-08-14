@section('title', 'Create Rating')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Rating</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class=""><a href="rating.html">Rating</a> </li>
                    <li class="active"> Tambah Pertanyaan</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit data pertanyaan</div>
                            @include('alert')
                            <div class="panel-body">
                                @foreach ($title as $titles)
                                <form action="{{ url('/rating/update-rating/'.$titles->survei_tag) }}" method="POST">
                                    @csrf
                                    <div class=" col-sm-12 nopadding form-group">
                                        <label for="survei_tag">Kategori</label>
                                        <input type="text" class="form-control" id="survei_tag" name="survei_tag" value="{{$titles->survei_tag}}" disabled>
                                    </div>
                                    <div class="col-sm-12 nopadding form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="{{$titles->judul}}">
                                    </div>

                                    @foreach ($data as $datas)
                                    <div class="col-sm-12 nopadding">
                                        <div class="form-group">
                                            <label for="pertanyaan">Pertanyaan ke-{{++$i}}</label>
                                            <input type="text" class="form-control" id="question" name="question[]"
                                            value="{{$datas->question}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="opsi_1" name="opsi_1[]"
                                            value="{{$datas->opsi_1}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="opsi_2" name="opsi_2[]"
                                            value="{{$datas->opsi_2}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="opsi_3" name="opsi_3[]"
                                            value="{{$datas->opsi_3}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="opsi_4" name="opsi_4[]"
                                            value="{{$datas->opsi_4}}">   
                                        </div>
                                    </div>
                                   @endforeach
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Update
                                    </button>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
        </div><!-- /.row -->

        </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-user-layout>
