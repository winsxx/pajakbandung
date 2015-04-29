@extends('master')
@section('title')
SKPDKB
@endsection
@section('breadcrumb')
<li><a href="{{url('/home')}}">Beranda</a></li>
<li><a href="{{url('/pajak/'.$pajak->id)}}">Pajak {{$pajak->jenis_pajak}}</a></li>
@if ($pajak->jenis_pajak == 'pbb')
    <li class ="active"> SKPDKB- {{$skpdkb->id}} </li> 
@elseif ($pajak->jenis_pajak != 'pbb')
    <li class ="active"> SKPDKB- {{$skpdkb->no_sptpd}} </li>
@endif
@endsection
@section('content')
    <div class="company_ad">
        <h2>Pajak {{$pajak->jenis_pajak}} </h2>
    </div>
    <div class="row">
        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-body">
                <center><h2>Surat Ketetapan Pajak Daerah Kurang Bayar</h2>
                @if ($pajak->jenis_pajak=='pbb')
                    <h3>No : {{$skpdkb->id}} </h3></center>                
                @elseif ($pajak->jenis_pajak!='pbb')
                    <h3>No : {{$skpdkb->no_sptpd}} </h3></center>                            
                @endif
                <br><br>
                @if ($pajak->jenis_pajak=='pbb')
                    <h4> Bersama surat ini kami beritahukan bahwa anda belum membayar pajak terutang sebesar {{$skpdkb->hutang}}
                    pada periode tahun {{$skpdkb->tahun}}.  <br><br>
                    Sekian. Terimakasih <br><br><br>
                    Dinas Pajak Kota Bandung
                    </h4>                 
                @elseif ($pajak->jenis_pajak!='pbb')
                    <h4> Bersama surat ini kami beritahukan bahwa anda belum membayar pajak terutang sebesar {{$skpdkb->nilai_skpd}}
                    pada periode bulan {{$skpdkb->bulan}} tahun {{$skpdkb->tahun}}.  <br><br>
                    Sekian. Terimakasih <br><br><br>
                    Dinas Pajak Kota Bandung
                    </h4>                    
                @endif
            </div>
        </div>
    </div>
@endsection