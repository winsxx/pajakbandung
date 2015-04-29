@extends('master')
@section('title')
    Beranda
@endsection
@section('content')

    <div class="row pajak-container">
        <div class="col-md-5 list-pajak">
            <div class="company_ad">
                <h2> Daftar pajak anda </h2>
            </div>
            @if (count($daftarPajakSendiri) == 0)
                <h3 class="text-center">Anda tidak memiliki pajak</h3>
            @else
                @foreach($daftarPajakSendiri as $pajak)
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
            @if (count($daftarPajakKolab) == 0)
                <h3 class="text-center">Anda tidak mengurus pajak orang lain</h3>
            @else
                @foreach($daftarPajakKolab as $pajak)
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