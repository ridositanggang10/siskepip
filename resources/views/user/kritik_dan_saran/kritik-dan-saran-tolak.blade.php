@section('title', 'Tolak-Kritik dan Saran')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Kritik dan Saran Ditolak</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Kritik dan Saran Tolak</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class='row'>
                    <div class='col-xs-12'>
                        <div class="nav-tabs-custom">

                            <div class="tab-content">
                                <!-- Kritik dan Saran Baru -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Advanced Tables -->
                                        <div class="panel panel-default">

                                            <div class="box-body no-padding">

                                                <div class="table-responsive mailbox-messages">
                                                    <table class="table table-hover table-striped ">
                                                        <thead class="">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>Alamat Tinggal</th>
                                                                <th>Pendidikan Terakhir</th>
                                                                <th>No Telepon Aktif</th>
                                                                <th>Usia</th>
                                                                <th>Judul</th>
                                                                <th>Waktu</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($kds_data as $kds_datas)
                                                                <?php
                                                                $mas_data = DB::table('data_masyarakat')
                                                                    ->select('*')
                                                                    ->where('id', $kds_datas->masyarakat_id)
                                                                    ->get();
                                                                ?>
                                                                @foreach ($mas_data as $mas_datas)
                                                                    <tr>
                                                                        <td>{{ $mas_datas->nama_lengakap }}</td>
                                                                        <td>{{ $mas_datas->alamat }}</td>
                                                                        <td>
                                                                            <?php
                                                                            if ($mas_datas->pendidikan_terakhir == 'paud/tk') {
                                                                                echo 'Pendidikan Anak Usia Dini / Taman Kanak-kanak';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 'sd') {
                                                                                echo 'Sekolah Dasar';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 'smp') {
                                                                                echo 'Sekolah Menengah Pertama';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 'sma/smk') {
                                                                                echo 'Sekolah Menengah Atas/Kejuruan';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 'd1') {
                                                                                echo 'Ahli Pratama (D1)';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 'd2') {
                                                                                echo 'Ahli Muda (D2)';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 'd3') {
                                                                                echo 'Ahli Madya (D3)';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 'd4') {
                                                                                echo 'Sarjana Sains Terapan (D4)';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 's1') {
                                                                                echo 'Sarjana (S1)';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 's2') {
                                                                                echo 'Magister (S2)';
                                                                            } elseif ($mas_datas->pendidikan_terakhir == 's3') {
                                                                                echo 'Doktor (S3)';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>{{ $mas_datas->nomor_telepon }}</td>
                                                                        <td>
                                                                            <?php
                                                                            if ($mas_datas->usia == '1') {
                                                                                echo '15 - 20 tahun';
                                                                            } elseif ($mas_datas->usia == '2') {
                                                                                echo '21 - 25 tahun';
                                                                            } elseif ($mas_datas->usia == '3') {
                                                                                echo '26 - 30 tahun';
                                                                            } elseif ($mas_datas->usia == '4') {
                                                                                echo '31 - 35 tahun';
                                                                            } elseif ($mas_datas->usia == '5') {
                                                                                echo '40 - 45 tahun';
                                                                            } elseif ($mas_datas->usia == '6') {
                                                                                echo '46 - 50 tahun';
                                                                            } elseif ($mas_datas->usia == '7') {
                                                                                echo '55 - 60 tahun';
                                                                            } elseif ($mas_datas->usia == '8') {
                                                                                echo '61 - 65 tahun';
                                                                            } elseif ($mas_datas->usia == '9') {
                                                                                echo '66 - 70 tahun';
                                                                            } elseif ($mas_datas->usia == '10') {
                                                                                echo '> 70 tahun';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="mailbox-subject">
                                                                            <?php
                                                                            $data = DB::table('kirik_dan_saran')
                                                                                ->select('*')
                                                                                ->where('masyarakat_id', $mas_datas->id)
                                                                                ->get();
                                                                            ?>

                                                                            @foreach ($data as $datas)
                                                                                {!! substr($datas->pesan, 0, 100) !!}
                                                                        </td>
                                                                        <td class="mailbox-date">
                                                                            {{ date('Y:m:d', strtotime($mas_datas->created_at)) }}
                                                                        </td>


                                                                        <td>
                                                                            <a href="{{ url('kritik-dan-saran/detail/' . $mas_datas->id) }}"
                                                                                class="btn btn-sm btn-info" id="tolak">
                                                                                <span class="glyphicon glyphicon-eye-open"
                                                                                    id="tolak"></span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                            @endforeach
                                                        </tbody>
                                                    </table><!-- /.table -->
                                                </div><!-- /.mail-box-messages -->
                                            </div><!-- /.box-body -->
                                            <div class="box-footer no-padding">
                                                <div class="mailbox-controls">
                                                    <button class="btn btn-default btn-sm"><i
                                                            class="fa fa-refresh"></i></button>
                                                    <div class="pull-right">
                                                        1-50/200
                                                        <div class="btn-group">
                                                            <button class="btn btn-default btn-sm"><i
                                                                    class="fa fa-chevron-left"></i></button>
                                                            <button class="btn btn-default btn-sm"><i
                                                                    class="fa fa-chevron-right"></i></button>
                                                        </div><!-- /.btn-group -->
                                                    </div><!-- /.pull-right -->
                                                </div>
                                            </div>

                                        </div>
                                        <!--End Advanced Tables -->
                                    </div>
                                    <!--End Advanced Tables -->
                                </div><!-- /.box -->


                                <!-- Daftar Semua Kritik dan Saran yang diterima-->

                                <!--End Advanced Tables -->
                            </div><!-- /#ion-icons -->

                        </div><!-- /.tab-content -->
                    </div><!-- /.nav-tabs-custom -->
                </div><!-- /.col -->
        </div><!-- /.row -->
        </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </x-user-layout>
