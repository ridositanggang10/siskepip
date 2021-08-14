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
                            <div class="panel-heading">Tambahkan pertanyaan untuk Survey</div>
                            @include('alert')
                            <div class="panel-body">
                                <form action="{{ url('/rating/post-form') }}" method="POST">
                                    @csrf
                                    <div class=" col-sm-12 nopadding form-group">
                                        <label for="survei_tag">Kategori</label>
                                        <input type="text" class="form-control" id="survei_tag" name="survei_tag">
                                    </div>
                                    <div class="col-sm-12 nopadding form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul">
                                    </div>
                                    <div id="education_fields"></div>
                                    <div class="col-sm-12 nopadding">
                                        <div class="form-group">
                                            <label for="pertanyaan">Pertanyaan</label>
                                            <input type="text" class="form-control" id="question" name="question[]"
                                                placeholder="Tambahkan Pertanyaan">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="opsi_1" name="opsi_1[]"
                                                placeholder="Opsi 1 : Total Nilai 25">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="opsi_2" name="opsi_2[]"
                                                placeholder="Opsi 2 : Total Nilai 50">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="opsi_3" name="opsi_3[]"
                                                placeholder="Opsi 3 : Total Nilai 75">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="opsi_4" name="opsi_4[]"
                                                        placeholder="Opsi 4 : Total Nilai 100">
                                                </div>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button"
                                                        onclick="education_fields();">
                                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Simpan
                                    </button>
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
