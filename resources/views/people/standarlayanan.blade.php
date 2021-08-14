<style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
/* This pen */
 body {
	 font-family: "Baloo 2", cursive;
	 font-size: 16px;
	 color: #fff;
	 text-rendering: optimizeLegibility;
	 font-weight: initial;
}
 .dark {
	 background: #110f16;
}
 .light {
	 background: #f3f5f7;
}
 a, a:hover {
	 text-decoration: none;
	 transition: color 0.3s ease-in-out;
}
 #pageHeaderTitle {
	 margin: 2rem 0;
	 text-transform: uppercase;
	 text-align: center;
	 font-size: 2.5rem;
}
/* Cards */
 .postcard {
	 flex-wrap: wrap;
	 display: flex;
	 box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
	 border-radius: 10px;
	 margin: 0 0 2rem 0;
	 overflow: hidden;
	 position: relative;
	 color: #fff;
}
 .postcard.dark {
	 background-color: #18151f;
}
 .postcard.light {
	 background-color: #e1e5ea;
}
 .postcard .t-dark {
	 color: #18151f;
}
 .postcard a {
	 color: inherit;
}
 .postcard h1, .postcard .h1 {
	 margin-bottom: 0.5rem;
	 font-weight: 500;
	 line-height: 1.2;
}
 .postcard .small {
	 font-size: 80%;
}
 .postcard .postcard__title {
	 font-size: 1.75rem;
}
 .postcard .postcard__img {
	 max-height: 180px;
	 width: 100%;
	 object-fit: cover;
	 position: relative;
}
 .postcard .postcard__img_link {
	 display: contents;
}
 .postcard .postcard__bar {
	 width: 50px;
	 height: 10px;
	 margin: 10px 0;
	 border-radius: 5px;
	 background-color: #424242;
	 transition: width 0.2s ease;
}
 .postcard .postcard__text {
	 padding: 1.5rem;
	 position: relative;
	 display: flex;
	 flex-direction: column;
}
 .postcard .postcard__preview-txt {
	 overflow: hidden;
	 text-overflow: ellipsis;
	 text-align: justify;
	 height: 100%;
}
 .postcard .postcard__tagbox {
	 display: flex;
	 flex-flow: row wrap;
	 font-size: 14px;
	 margin: 20px 0 0 0;
	 padding: 0;
	 justify-content: center;
}
 .postcard .postcard__tagbox .tag__item {
	 display: inline-block;
	 background: rgba(83, 83, 83, 0.4);
	 border-radius: 3px;
	 padding: 2.5px 10px;
	 margin: 0 5px 5px 0;
	 cursor: default;
	 user-select: none;
	 transition: background-color 0.3s;
}
 .postcard .postcard__tagbox .tag__item:hover {
	 background: rgba(83, 83, 83, 0.8);
}
 .postcard:before {
	 content: "";
	 position: absolute;
	 top: 0;
	 right: 0;
	 bottom: 0;
	 left: 0;
	 background-image: linear-gradient(-70deg, #424242, transparent 50%);
	 opacity: 1;
	 border-radius: 10px;
}
 .postcard:hover .postcard__bar {
	 width: 100px;
}
 @media screen and (min-width: 769px) {
	 .postcard {
		 flex-wrap: inherit;
	}
	 .postcard .postcard__title {
		 font-size: 2rem;
	}
	 .postcard .postcard__tagbox {
		 justify-content: start;
	}
	 .postcard .postcard__img {
		 max-width: 300px;
		 max-height: 100%;
		 transition: transform 0.3s ease;
	}
	 .postcard .postcard__text {
		 padding: 3rem;
		 width: 100%;
	}
	 .postcard .media.postcard__text:before {
		 content: "";
		 position: absolute;
		 display: block;
		 background: #18151f;
		 top: -20%;
		 height: 130%;
		 width: 55px;
	}
	 .postcard:hover .postcard__img {
		 transform: scale(1.1);
	}
	 .postcard:nth-child(2n+1) {
		 flex-direction: row;
	}
	 .postcard:nth-child(2n+0) {
		 flex-direction: row-reverse;
	}
	 .postcard:nth-child(2n+1) .postcard__text::before {
		 left: -12px !important;
		 transform: rotate(4deg);
	}
	 .postcard:nth-child(2n+0) .postcard__text::before {
		 right: -12px !important;
		 transform: rotate(-4deg);
	}
}
 @media screen and (min-width: 1024px) {
	 .postcard__text {
		 padding: 2rem 3.5rem;
	}
	 .postcard__text:before {
		 content: "";
		 position: absolute;
		 display: block;
		 top: -20%;
		 height: 130%;
		 width: 55px;
	}
	 .postcard.dark .postcard__text:before {
		 background: #18151f;
	}
	 .postcard.light .postcard__text:before {
		 background: #e1e5ea;
	}
}
/* COLORS */
 .postcard .postcard__tagbox .green.play:hover {
	 background: #79dd09;
	 color: black;
}
 .green .postcard__title:hover {
	 color: #79dd09;
}
 .green .postcard__bar {
	 background-color: #79dd09;
}
 .green::before {
	 background-image: linear-gradient(-30deg, rgba(121, 221, 9, 0.1), transparent 50%);
}
 .green:nth-child(2n)::before {
	 background-image: linear-gradient(30deg, rgba(121, 221, 9, 0.1), transparent 50%);
}
 .postcard .postcard__tagbox .blue.play:hover {
	 background: #0076bd;
}
 .blue .postcard__title:hover {
	 color: #0076bd;
}
 .blue .postcard__bar {
	 background-color: #0076bd;
}
 .blue::before {
	 background-image: linear-gradient(-30deg, rgba(0, 118, 189, 0.1), transparent 50%);
}
 .blue:nth-child(2n)::before {
	 background-image: linear-gradient(30deg, rgba(0, 118, 189, 0.1), transparent 50%);
}
 .postcard .postcard__tagbox .red.play:hover {
	 background: #bd150b;
}
 .red .postcard__title:hover {
	 color: #bd150b;
}
 .red .postcard__bar {
	 background-color: #bd150b;
}
 .red::before {
	 background-image: linear-gradient(-30deg, rgba(189, 21, 11, 0.1), transparent 50%);
}
 .red:nth-child(2n)::before {
	 background-image: linear-gradient(30deg, rgba(189, 21, 11, 0.1), transparent 50%);
}
 .postcard .postcard__tagbox .yellow.play:hover {
	 background: #bdbb49;
	 color: black;
}
 .yellow .postcard__title:hover {
	 color: #bdbb49;
}
 .yellow .postcard__bar {
	 background-color: #bdbb49;
}
 .yellow::before {
	 background-image: linear-gradient(-30deg, rgba(189, 187, 73, 0.1), transparent 50%);
}
 .yellow:nth-child(2n)::before {
	 background-image: linear-gradient(30deg, rgba(189, 187, 73, 0.1), transparent 50%);
}
 @media screen and (min-width: 769px) {
	 .green::before {
		 background-image: linear-gradient(-80deg, rgba(121, 221, 9, 0.1), transparent 50%);
	}
	 .green:nth-child(2n)::before {
		 background-image: linear-gradient(80deg, rgba(121, 221, 9, 0.1), transparent 50%);
	}
	 .blue::before {
		 background-image: linear-gradient(-80deg, rgba(0, 118, 189, 0.1), transparent 50%);
	}
	 .blue:nth-child(2n)::before {
		 background-image: linear-gradient(80deg, rgba(0, 118, 189, 0.1), transparent 50%);
	}
	 .red::before {
		 background-image: linear-gradient(-80deg, rgba(189, 21, 11, 0.1), transparent 50%);
	}
	 .red:nth-child(2n)::before {
		 background-image: linear-gradient(80deg, rgba(189, 21, 11, 0.1), transparent 50%);
	}
	 .yellow::before {
		 background-image: linear-gradient(-80deg, rgba(189, 187, 73, 0.1), transparent 50%);
	}
	 .yellow:nth-child(2n)::before {
		 background-image: linear-gradient(80deg, rgba(189, 187, 73, 0.1), transparent 50%);
	}
}
 
</style>
@section('title','Standar Layanan')
<x-people-layout>
    
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Standar Layanan</h2>
                        <ul class="page-title-link">
                            <li><a href="{{ url('/public/beranda')}}">Beranda</a></li>
                            <li><a href="{{ url('/public/standar-layanan')}}">Standar Layanan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section-title text-center">
            <br><br><h3>Pilih instansi yang ingin dituju</h3>
            <p class="lead">Berikut standar layanan dari setiap instansi. <br>Anda dapat melihat prosedur layanan
                yang tersedia.</p>
        </div><!-- end title -->
    </div><!-- end container -->

    @foreach ($instansi = DB::table('instansi')->select('*')->get() as $instance)
    <?php 
        $jumlah = DB::table('standar_layanan')->select('judul')->where('sl_instansi_id',$instance->id)->get()
    ?>
    <section class="light">
        <div class="container py-2">
            @if (count($jumlah))
            <div class="h1 text-center text-dark" id="pageHeaderTitle">{{$instance->instansi_name}}</div>
            @endif
            @foreach ($collection = DB::table('standar_layanan')->select('*')->where('sl_instansi_id',$instance->id)->get() as $item)
            <article class="postcard light blue">
                <a class="postcard__img_link" href="{{url('/public/standar-layanan/show/'.$item->id)}}">
                    @if ($item->foto)
                        <img class="postcard__img" src="{{ asset('assets_user/standarLayanan/pictures/'.$item->foto)}}" alt="Image Title">
                    @else
                        <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
                    @endif
                </a>
                <div class="postcard__text t-dark" style="margin-left: 30px">
                    <h1 class="postcard__title blue"><a href="{{url('/public/standar-layanan/show/'.$item->id)}}">{{$item->judul}}</a></h1>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2" style="margin-left: 20px"></i>{{$item->created_at}}
                        </time>
                    </div>
                    <div class="postcard__bar" style="margin-left: 20px"></div>
                    <div class="postcard__preview-txt" style="margin-left: 20px">{!! Str::limit($item->deskripsi, 300, $end='...') !!}</div>
                    <ul class="postcard__tagbox"> 
                        <li class="tag__item play blue" style="margin-left: 20px">
                            <a href="{{url('/public/standar-layanan/show/'.$item->id)}}"><i class="fa fa-eye">&nbsp;</i>Selengkapnya</a>
                        </li>
                    </ul>
                </div>
            </article>
            @endforeach
        </div>
    </section>
    @endforeach
    

    {{-- <div id="portfolio" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <br><br><h3>Pilih instansi yang ingin dituju</h3>
                <p class="lead">Berikut standar layanan dari setiap instansi. <br>Anda dapat melihat prosedur layanan
                    yang tersedia.</p>
            </div><!-- end title -->
        </div><!-- end container -->

        @foreach ($instansi = DB::table('instansi')->select('*')->get() as $instance)
        <?php 
            $jumlah = DB::table('standar_layanan')->select('judul')->where('sl_instansi_id',$instance->id)->get()
        ?>
        <div class="container" style="margin-top: 40px">
            @if (count($jumlah))
                <h1>{{$instance->instansi_name}}</h1>        
            @endif
        </div>
        <div class="container">
            <div id="da-thumbs" class="da-thumbs portfolio" style="width: 220px; height: 160px;">
                    
                @foreach ($collection = DB::table('standar_layanan')->select('*')->where('sl_instansi_id',$instance->id)->get() as $item)
                    <div class="post-media pitem item-w1 item-h1 cat1">
                        <a href="{{url('/public/standar-layanan/show/'.$item->id)}}">
                            <img src="{{ asset('assets_user/standarLayanan/pictures/'.$item->foto)}}" class="img-responsive" style="width: 220px; height: 160px;">
                            <div>
                                <h3>{{$item->judul}}</h3>
                            </div>
                        </a>
                        <a class="btn-light" href="{{url('/public/standar-layanan/show/'.$item->id)}}">Selengkapnya</a>
                    </div>
                @endforeach
            </div><!-- end portfolio -->
        </div>
        @endforeach
        
    </div><!-- end section --> --}}
</x-people-layout>