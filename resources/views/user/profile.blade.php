@section('title', 'Edit Profile')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Profil</h1>
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

                            <!-- Main content -->
                            <section class="content">

                                <!-- row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- The time line -->
                                        <ul class="timeline">
                                            <!-- timeline time label -->
                                            <li class="time-label">
                                                <span class="bg-red">
                                                    Profil Saya
                                                </span>
                                            </li>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-user bg-aqua"></i>
                                                <div class="timeline-item">
                                                    <span class="time"> Nama Lengkap</span>
                                                    <h3 class="timeline-header no-border">Irie Willen Marshelly</h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <span class="time"> Alamat Email</span>
                                                    <h3 class="timeline-header"><a
                                                            href="https://mail.google.com/mail/u/0/#inbox?compose=new">contoh.email@gmail.com</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-phone-square bg-green"></i>
                                                <div class="timeline-item">
                                                    <span class="time"> Nomor WhatsApp</span>
                                                    <h3 class="timeline-header"><a
                                                            href="https://web.whatsapp.com/">08123456789</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-calendar-o bg-yellow"></i>
                                                <div class="timeline-item">
                                                    <span class="time">Tanggal Lahir</span>
                                                    <h3 class="timeline-header">03 Agustus 2005</h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-female bg-green"></i>
                                                <div class="timeline-item">
                                                    <span class="time">Jenis Kelamin</span>
                                                    <h3 class="timeline-header">Perempuan</h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-eye bg-red"></i>
                                                <div class="timeline-item">
                                                    <span class="time">Kata Sandi</span>
                                                    <h3 class="timeline-header">sandi*saya123</h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-camera bg-purple"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                        <img src="http://placehold.it/150x100" alt="..." class='margin' />
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-tags bg-blue"></i>
                                                <div class="timeline-item">
                                                    <span class="time">Instansi</span>
                                                    <h3 class="timeline-header">Dinas Kesehatan</h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-pencil-square bg-aqua"></i>
                                                <div class="timeline-item">
                                                    <span class="time">Biografi</span>
                                                    <h3 class="timeline-header">Selama Anda hidup, maka Anda akan terus
                                                        terikat dengan bayangan Anda sendiri.</h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                        </ul>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                                <a href="edit-profil.html">
                                    <button type="submit" class="btn btn-primary">Edit Profil</button>
                                </a>
                            </section><!-- /.content -->
                        </div><!-- /.box -->
                        <!--End Advanced Tables -->
                    </div>
                </div><!-- /.box -->
            </section><!-- /.content -->
        </div><!-- /.col -->
    </x-user-layout>
