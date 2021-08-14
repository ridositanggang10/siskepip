@section('title', 'Rating')
    <x-user-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Rating</h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Daftar Rating</li>
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
                                                @include('alert')
                                                <div class="table-responsive mailbox-messages">
                                                    <table class="table table-hover table-striped ">
                                                        <thead class="thead">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Survei Tag</th>
                                                                <th>Jumlah Pertanyaan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $datas)
                                                                <tr>
                                                                    <td>{{ ++$i }}</td>
                                                                    <td>{{ $datas->survei_tag }}</td>
                                                                    <td>{{ DB::table('survei_questions')->where('survei_tag', $datas->survei_tag)->count('survei_tag') }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ url('/rating/rating-detail/'.$datas->survei_tag) }}"
                                                                            class="btn btn-sm btn-info" id="tolak">
                                                                            <span class="glyphicon glyphicon-eye-open"
                                                                                id="tolak"></span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table><!-- /.table -->
                                                </div><!-- /.mail-box-messages -->
                                            </div><!-- /.box-body -->
                                            <div class="box-footer no-padding">
                                                <div class="mailbox-controls">


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
