@extends('master')
@section('title')
SKPD
@endsection
@section('breadcrumb')
<li><a href="{{url('/home')}}">Beranda</a></li>
<li>Pajak Hotel</li>
<li class ="active"> Daftar SKPD</li>
@endsection
@section('content')
    <div class="company_ad">
        <h2>Pajak {{$pajak->jenis_pajak}}</h2>
    </div>
    <div class="row">
        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-heading">
                <h3>Daftar Surat Keputusan dari Dinas Pajak</h3>
            </div>
            <div class="panel-body">
                <ol>
                @if ($pajak->jenis_pajak=='pbb')
                    @foreach ($daftarskpd as $skpd)
                        <li><h4><a href="{{url('/pajak/'.$pajak->id.'/skpd/'.$skpd->id)}}"> SKPD- {{$skpd->id}} </a></h4> </li>
                    @endforeach
                    @foreach ($daftarskpdkb as $skpdkb)
                        <li><h4><a href="{{url('/pajak/'.$pajak->id.'/skpdkb/'.$skpdkb-id)}}"> SKPDKB- {{$skpdkb->id}} </a></h4> </li>
                    @endforeach                 
                @elseif ($pajak->jenis_pajak!='pbb') 
                    @foreach ($daftarskpd as $skpd)
                        <li><h4><a href="{{url('/pajak/'.$pajak->id.'/skpd/'.$skpd->no_sptpd)}}"> SKPD- {{$skpd->no_sptpd}} </a></h4> </li>
                    @endforeach
                    @foreach ($daftarskpdkb as $skpdkb)
                        <li><h4><a href="{{url('/pajak/'.$pajak->id.'/skpdkb/'.$skpdkb->no_sptpd)}}"> SKPDKB- {{$skpdkb->no_sptpd}} </a></h4> </li>
                    @endforeach  
                @endif
                </ol>
            </div>
        </div>
    </div>
@endsection