@section('title', 'Redirect-Kritik dan Saran')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Redirect Kritik dan Saran</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                    <li class="active"> Redirect Kritik dan Saran</li>
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
                                                                <th>Pesan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $datas)
                                                                @foreach ($collection = DB::table('data_masyarakat')
                                                                                ->select('*')
                                                                                ->where('id',$datas->rkds_masyarakat_id)
                                                                                ->get() as $item)
                                                                    <tr>
                                                                        <td>{{$item->nama_lengakap}}</td>
                                                                        <td>{{ $item->alamat }}l</td>
                                                                        <td>
                                                                        <?php
                                                                            if ($item->pendidikan_terakhir == 'paud/tk') {
                                                                                echo 'Pendidikan Anak Usia Dini / Taman Kanak-kanak';
                                                                            } elseif ($item->pendidikan_terakhir == 'sd') {
                                                                                echo 'Sekolah Dasar';
                                                                            } elseif ($item->pendidikan_terakhir == 'smp') {
                                                                                echo 'Sekolah Menengah Pertama';
                                                                            } elseif ($item->pendidikan_terakhir == 'sma/smk') {
                                                                                echo 'Sekolah Menengah Atas/Kejuruan';
                                                                            } elseif ($item->pendidikan_terakhir == 'd1') {
                                                                                echo 'Ahli Pratama (D1)';
                                                                            } elseif ($item->pendidikan_terakhir == 'd2') {
                                                                                echo 'Ahli Muda (D2)';
                                                                            } elseif ($item->pendidikan_terakhir == 'd3') {
                                                                                echo 'Ahli Madya (D3)';
                                                                            } elseif ($item->pendidikan_terakhir == 'd4') {
                                                                                echo 'Sarjana Sains Terapan (D4)';
                                                                            } elseif ($item->pendidikan_terakhir == 's1') {
                                                                                echo 'Sarjana (S1)';
                                                                            } elseif ($item->pendidikan_terakhir == 's2') {
                                                                                echo 'Magister (S2)';
                                                                            } elseif ($item->pendidikan_terakhir == 's3') {
                                                                                echo 'Doktor (S3)';
                                                                            }
                                                                        ?>
                                                                        </td>
                                                                        <td>{{ $item->nomor_telepon }}</td>
                                                                        <td>
                                                                            <?php
                                                                            if ($item->usia == '1') {
                                                                                echo '15 - 20 tahun';
                                                                            } elseif ($item->usia == '2') {
                                                                                echo '21 - 25 tahun';
                                                                            } elseif ($item->usia == '3') {
                                                                                echo '26 - 30 tahun';
                                                                            } elseif ($item->usia == '4') {
                                                                                echo '31 - 35 tahun';
                                                                            } elseif ($item->usia == '5') {
                                                                                echo '40 - 45 tahun';
                                                                            } elseif ($item->usia == '6') {
                                                                                echo '46 - 50 tahun';
                                                                            } elseif ($item->usia == '7') {
                                                                                echo '55 - 60 tahun';
                                                                            } elseif ($item->usia == '8') {
                                                                                echo '61 - 65 tahun';
                                                                            } elseif ($item->usia == '9') {
                                                                                echo '66 - 70 tahun';
                                                                            } elseif ($item->usia == '10') {
                                                                                echo '> 70 tahun';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="mailbox-subject"> 
                                                                            {!! substr($datas->pesan, 0, 20) !!}
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{ url('kritik-dan-saran/detail/' . $item->id) }}"
                                                                                class="btn btn-sm btn-info" id="show">
                                                                                <span class="glyphicon glyphicon-eye-open"
                                                                                    id="tolak"></span>
                                                                            </a>
                                                                            @if (($datas->status != "rejected") and ($datas->status != "accepted"))
                                                                                <a href="{{ url('/kritik-dan-saran/accept-redirected/' . $datas->id) }}"
                                                                                    class="btn btn-sm btn-success" id="terima">
                                                                                    <span class="glyphicon glyphicon-ok"
                                                                                        id="terima"></span>
                                                                                </a>
                                                                                <a href="{{ url('/kritik-dan-saran/reject-redirected/' . $datas->id) }}"
                                                                                    class="btn btn-sm btn-danger" id="tolak">
                                                                                    <span class="glyphicon glyphicon-remove"
                                                                                        id="terima"></span>
                                                                                </a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
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
                                                        <!-- pagination begin -->
                                                            <div class="pagination-ourter text-center">
                                                                {{$data->links()}} 
                                                            </div>
                                                        <!-- pagination close -->
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
