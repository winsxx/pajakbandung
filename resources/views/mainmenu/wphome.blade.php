@extends('master')
@section('title')
    Beranda
@endsection
@section('content')

    <div class="row pajak-container">
        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-body" style="text-align:center;">
                @if(Auth::user()->hasNpwpd())
                    <h3>Status NPWPD: {{Auth::user()->wajibpajak->status}}</h3>
                @else
                    <h3>Anda belum memiliki NPWPD</h3>
                @endif
            </div>
        </div>
        <div class="col-md-5 list-pajak">
            <div class="company_ad">
                <h2> Daftar pajak anda </h2>
            </div>
            @if (count($daftarPajakSendiriAktif) == 0)
                <h3 class="text-center">Anda tidak memiliki pajak</h3>
            @else
                @foreach($daftarPajakSendiriAktif as $pajak)
                    <div class="grid_list_pajak">
                        <div class="images_pajak">
                            <p>{{ucfirst($pajak->jenis_pajak[0])}}</p>
                        </div>
                        <div class="grid_pajak">
                            <h3><a href="{{url('/pajak/'.$pajak->id)}}">Pajak {{$pajak->jenis_pajak}} </a></h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            @endif
            <div class="company_ad">
                <h2> Daftar pajak sebagai pengurus </h2>
            </div>
            @if (count($daftarPajakKolabAktif) == 0)
                <h3 class="text-center">Anda tidak mengurus pajak orang lain</h3>
            @else
                @foreach($daftarPajakKolabAktif as $pajak)
                    <div class="grid_list_pajak">
                        <div class="images_pajak">
                            <p>{{ucfirst($pajak->jenis_pajak[0])}}</p>
                        </div>
                        <div class="grid_pajak">
                            <h3><a href="{{url('/pajak/'.$pajak->id)}}">Pajak {{$pajak->jenis_pajak}} ({{$pajak->wajibpajak->penduduk->nama}})</a></h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="col-md-5">
            <div class="btn-add-pajak">
                <p>Anda memiliki usaha baru? Daftarkan pajak usaha anda pada link berikut </p>
            </div>
            <a href="{{url('/tambahpajak')}}">
                <button class="btn btn-default btn-add-pajak">Daftar Pajak Baru</button>
            </a>
        </div>
    </div>
@endsection