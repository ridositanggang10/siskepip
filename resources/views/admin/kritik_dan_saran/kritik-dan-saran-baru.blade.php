@section('title', 'Kritik dan Saran')
    <x-admin-layout>
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Kritik dan Saran
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Kritik dan saran</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="box box-warning">
                            <div class="box-body">
                                <div class="table-responsive">
                                    @include('alert')
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat Tinggal</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>No Telepon Aktif</th>
                                                <th>Usia</th>
                                                <th>Judul</th>
                                                <th>Waktu</th>
                                                <th>Instansi</th>
                                                <th>Status</th>
                                                <th colspan="2" style="text-align:center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $kds_datas)
                                                @foreach ($collection = DB::table('data_masyarakat')->select('*')->where('id', $kds_datas->masyarakat_id)->get(); as $mas_data)
                                                    <tr class="odd gradeX">
                                                        <td>{{++$i}}</td>
                                                        <td>{{$mas_data->nama_lengakap}}</td>
                                                        <td>{{$mas_data->alamat}}</td>
                                                        <td>
                                                            <?php
                                                            if ($mas_data->pendidikan_terakhir == 'paud/tk') {
                                                                echo 'Pendidikan Anak Usia Dini / Taman Kanak-kanak';
                                                            } elseif ($mas_data->pendidikan_terakhir == 'sd') {
                                                                echo 'Sekolah Dasar';
                                                            } elseif ($mas_data->pendidikan_terakhir == 'smp') {
                                                                echo 'Sekolah Menengah Pertama';
                                                            } elseif ($mas_data->pendidikan_terakhir == 'sma/smk') {
                                                                echo 'Sekolah Menengah Atas/Kejuruan';
                                                            } elseif ($mas_data->pendidikan_terakhir == 'd1') {
                                                                echo 'Ahli Pratama (D1)';
                                                            } elseif ($mas_data->pendidikan_terakhir == 'd2') {
                                                                echo 'Ahli Muda (D2)';
                                                            } elseif ($mas_data->pendidikan_terakhir == 'd3') {
                                                                echo 'Ahli Madya (D3)';
                                                            } elseif ($mas_data->pendidikan_terakhir == 'd4') {
                                                                echo 'Sarjana Sains Terapan (D4)';
                                                            } elseif ($mas_data->pendidikan_terakhir == 's1') {
                                                                echo 'Sarjana (S1)';
                                                            } elseif ($mas_data->pendidikan_terakhir == 's2') {
                                                                echo 'Magister (S2)';
                                                            } elseif ($mas_data->pendidikan_terakhir == 's3') {
                                                                echo 'Doktor (S3)';
                                                            }
                                                            ?>                                                    
                                                        </td>
                                                        <td class="center">{{$mas_data->nomor_telepon}}</td>
                                                        <td>
                                                            <?php
                                                            if ($mas_data->usia == '1') {
                                                                echo '15 - 20 tahun';
                                                            } elseif ($mas_data->usia == '2') {
                                                                echo '21 - 25 tahun';
                                                            } elseif ($mas_data->usia == '3') {
                                                                echo '26 - 30 tahun';
                                                            } elseif ($mas_data->usia == '4') {
                                                                echo '31 - 35 tahun';
                                                            } elseif ($mas_data->usia == '5') {
                                                                echo '40 - 45 tahun';
                                                            } elseif ($mas_data->usia == '6') {
                                                                echo '46 - 50 tahun';
                                                            } elseif ($mas_data->usia == '7') {
                                                                echo '55 - 60 tahun';
                                                            } elseif ($mas_data->usia == '8') {
                                                                echo '61 - 65 tahun';
                                                            } elseif ($mas_data->usia == '9') {
                                                                echo '66 - 70 tahun';
                                                            } elseif ($mas_data->usia == '10') {
                                                                echo '> 70 tahun';
                                                            }
                                                            ?>            
                                                        </td>
                                                        <td class="mailbox-subject">
                                                            {!! Str::limit($kds_datas->pesan, 150, $end='...') !!}
                                                        </td>
                                                        <td class="mailbox-date">
                                                            {{ date('Y:m:d', strtotime($kds_datas->created_at)) }}
                                                        </td>
                                                        @foreach ($instansi = DB::table('instansi')->select('*')->where('id',$kds_datas->ks_instansi_id)->get() as $instansi_item)
                                                            <td>{{$instansi_item->instansi_name}}</td>
                                                        @endforeach
                                                        @if ($kds_datas->status == 'accepted')
                                                            <td><span class="label label-success">Diterima</span></td>
                                                        @elseif($kds_datas->status == 'rejected')
                                                            <td><span class="label label-danger">Ditolak</span></td>
                                                        @else
                                                            <td><span class="label label-warning">Menunggu</span></td>
                                                        @endif
                                                        <td>
                                                            <a href="{{url('/kritik-dan-saran/kds-detail/'.$kds_datas->id)}}"
                                                                class="btn btn-default btn-sm">
                                                                <i class="fa fa-eye" data-toggle="tooltip" title="view"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                        <div class="d-flex justify-content-center">
                            {!! $data->links('vendor.pagination.custome') !!}
                        </div>
                    </div>
                </div>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </x-admin-layout>
