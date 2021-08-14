@section('title', 'Ubah Sandi')
<x-admin-layout> 
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Ubah Kata Sandi</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Ubah kata sandi</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
               
                <div class="col-lg-12">
                    <div class="box box-warning">
                        @include('alert')
                        <form action="{{ url('/ubah-katasandi/save-new-password')}}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="current_password">Kata Sandi Lama</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Kata Sandi Baru</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Konfirmasi Kata Sandi Baru</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                        
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->

    </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</x-admin-layout>