@extends('master')
@section('title')
SKPD
@endsection
@section('breadcrumb')
<li><a href="/home">Beranda</a></li>
<li><a href="/pajak/id">Pajak {{$pajak->jenis_pajak}}</a></li>
@if ($pajak->jenis_pajak == 'pbb')
    <li class ="active"> SKPDKB- {{$skpd->id}} </li>
@elseif ($pajak->jenis_pajak != 'pbb')
    <li class ="active"> SKPDKB- {{$skpd->no_sptpd}} </li>
@endif
@endsection
@section('content')
    <div class="company_ad">
        <h2>Pajak {{$pajak->jenis_pajak}}</h2>
    </div>
    <div class="row">
        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-body">
                <center><h2>Surat Ketetapan Pajak Daerah</h2>
                @if ($pajak->jenis_pajak == 'pbb')
                    <h3>No : {{$skpd->id}}</h3></center>
                @elseif ($pajak->jenis_pajak != 'pbb')
                    <h3>No : {{$skpd->no_sptpd}}</h3></center>
                @endif                
                <br><br>
                @if ($pajak->jenis_pajak == 'pbb')
                    <h4>Besarnya Pajak Bumi dan Bangunan yang harus dibayar oleh NPWPD {{Auth::user()->wajibpajak->npwpd}} adalah sebesar
                    Rp. {{$skpd->biaya}} <br><br>
                    Sekian. Terimakasih <br><br><br>
                    Dinas Pajak Kota Bandung
                @elseif ($pajak->jenis_pajak != 'pbb')
                <h4> Berdasarkan Surat Pemberitahuan Pajak Daerah yang telah dikirimkan pada tanggal
                    {{$skpd->created_at->format('Y-m-d')}} maka ditetapkan besarnya pajak yang harus dibayar oleh NPWPD {{Auth::user()->wajibpajak->npwpd}} adalah sebesar
                    Rp. {{$skpd->nilai_skpd}} <br><br>
                    Sekian. Terimakasih <br><br><br>
                    Dinas Pajak Kota Bandung
                </h4>
                @endif
            </div>
        </div>
    </div>
@endsection