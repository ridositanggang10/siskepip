@section('title', 'Edit Profile')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Edit Profil</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Profil</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="box box-warning">
                            <!-- form start -->
                            <form role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Nama Lengkap</label>
                                        <input type="name" class="form-control" id="exampleInputName1"
                                            placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan email">
                                    </div>
                                    <div class="input-group">
                                        <label for="exampleInputdate">Tanggal Lahir</label>
                                        <input type="date" class="form-control" placeholder="Tanggal Lahir">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control">
                                            <option>---Pilih Jenis Kelamin---</option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kata Sandi</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Kata Sandi">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto Profil</label>
                                        <input type="file" id="exampleInputFile">
                                    </div>
                                    <div class="form-group">
                                        <label>Instansi</label>
                                        <select class="form-control" disabled>
                                            <option>Instansi tidak dapat diedit (otomatis), karena di daftarkan oleh
                                                admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Biografi</label>
                                        <textarea class="form-control" rows="3"
                                            placeholder="Masukkan biografi Anda ..."></textarea>
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <a href="profil.html">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </a>
                                    <a href="profil.html"><button type="submit" class="btn btn-default">Batal</button></a>
                                </div>
                            </form>
                        </div><!-- /.box -->
                        <!--End Advanced Tables -->
                    </div>
                </div><!-- /.box -->
        </div><!-- /.col -->
        </div><!-- /.row -->

        </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-user-layout>
