@extends('master')
@section('title')
SKPD
@endsection
@section('breadcrumb')
<li><a href="/home">Beranda</a></li>
<li><a href="/pajak/id">Pajak Hotel</a></li>
<li class ="active"> SKPDKB-XX </li>
@endsection
@section('content')
    <div class="company_ad">
        <h2>Pajak Hotel </h2>
    </div>
    <div class="row">
        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-body">
                <center><h2>Surat Ketetapan Pajak Daerah</h2>
                <h3>No : XXXXXXX</h3></center>
                <br><br>
                <h4> Berdasarkan Surat Pemberitahuan Pajak Daerah yang telah dikirimkan pada tanggal
                    XX-XX-XXXX maka ditetapkan besarnya pajak yang harus dibayar oleh NPWPD XXXXX adalah sebesar
                    Rp. XXXXXXXXXX <br><br>
                    Sekian. Terimakasih <br><br><br>
                    Dinas Pajak Kota Bandung
                </h4>
            </div>
        </div>
    </div>
@endsection