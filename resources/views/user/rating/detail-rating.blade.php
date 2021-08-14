@section('title', 'Detail-Rating')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Detail Pertanyaan Survei</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="rating.html">Rating</a> </li>
                    <li class="active"> Detail Pertanyaan Survei</li>
                </ol>
            </section>

            <!-- Main content -->



            <section class="content">

                <!-- Info boxes -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Advanced Tables -->


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th scope="row">Kategori</th>
                                                <th scope="col">Prokes</th>

                                                <th scope="col" class="center"><a href="" class="btn btn-default btn-sm"
                                                        data-toggle="modal" data-target="#updatekategori">
                                                        <i class="fa fa-edit" data-toggle="tooltip" title="Update"></i>

                                                    </a></th>

                                            </tr>
                                            <tr>
                                                <th scope="row">Judul</th>
                                                <th scope="col">Pelaksanaan Prokes Covid19</th>
                                                <th scope="col"><a href="" class="btn btn-default btn-sm"
                                                        data-toggle="modal" data-target="#updateJudul">
                                                        <i class="fa fa-edit" data-toggle="tooltip" title="Update"></i>

                                                    </a></th>
                                            </tr>
                                        </thead>



                                    </table>
                                </div>

                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Pertanyaan</th>
                                                <th>Opsi 1</th>
                                                <th>Opsi 2</th>
                                                <th>Opsi 3</th>
                                                <th>Opsi 4</th>
                                                <th colspan="2">Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bagaimana Pelayanan Prokes di tempatmu?</td>
                                                <td>Kurang</td>
                                                <td>Cukup</td>
                                                <td>Baik</td>
                                                <td>Sangat Baik</td>
                                                <td><a href="" class="btn btn-default btn-sm" data-toggle="modal"
                                                        data-target="#updateQuestion">
                                                        <i class="fa fa-edit" data-toggle="tooltip" title="Update"></i>

                                                    </a></td>



                                                <!-- Modal  kategori-->
                                                <div class="modal fade" id="updateJudul" tabindex="-1" role="dialog"
                                                    aria-labelledby="updateJudulLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="updateJudulLabel">Update
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group row">
                                                                        <label for="kategori"
                                                                            class="col-sm-2 col-form-label">Kategori</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="judul">
                                                                        </div>
                                                                    </div>


                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-primary"
                                                                    id="simpan">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal  judul-->
                                                <div class="modal fade" id="updatekategori" tabindex="-1" role="dialog"
                                                    aria-labelledby="updatekategoriLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="updateQuestionLabel">Update
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group row">
                                                                        <label for="kategori"
                                                                            class="col-sm-2 col-form-label">Kategori</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="kategori">
                                                                        </div>
                                                                    </div>


                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-primary"
                                                                    id="simpan">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Modal update Question-->
                                                <div class="modal fade" id="updateQuestion" tabindex="-1" role="dialog"
                                                    aria-labelledby="updateQuestionLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="updateQuestionLabel">Update
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group row">
                                                                        <label for="pertanyaan"
                                                                            class="col-sm-2 col-form-label">Pertanyaan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="pertanyaan">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="Opsi1"
                                                                            class="col-sm-2 col-form-label">Opsi 1</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="Opsi1">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="Opsi2"
                                                                            class="col-sm-2 col-form-label">Opsi 2</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="Opsi2">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="Opsi3"
                                                                            class="col-sm-2 col-form-label">Opsi 3</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="Opsi3">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="Opsi4"
                                                                            class="col-sm-2 col-form-label">Opsi 4</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="Opsi4">
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-primary"
                                                                    id="simpan">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <td><a href="" class="btn btn-default btn-sm" data-toggle="modal"
                                                        data-target="#ModalDelete">
                                                        <i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i>

                                                    </a></td>


                                                <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog"
                                                    aria-labelledby="ModalUpdateLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="ModalDeleteLabel">Warning
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah kamu yakin dengan pilihan ini? </p>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-warning"
                                                                    id="hapus">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
        </div><!-- /.row -->

        </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-user-layout>
