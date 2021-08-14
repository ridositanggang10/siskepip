@foreach ($data as $datas)
    <div class="box-body no-padding">
        <div class="mailbox-read-info">
            <h3>Detail Pesan dari Masyarakat</h3>
            <h5>From: {{ $datas->nama_lengakap}} <span class="mailbox-read-time pull-right">{{$datas->created_at}}</span></h5>
        </div><!-- /.mailbox-read-info -->
                    @foreach ($kds = DB::table('kirik_dan_saran')
                                ->select('*')
                                ->where('masyarakat_id',$datas->id)
                                ->get(); as $item)
                            <div class="mailbox-read-message">
                                    {!!$item->pesan!!}
                            </div><!-- /.mailbox-read-message -->
                    @endforeach
    </div><!-- /. box -->            
@endforeach