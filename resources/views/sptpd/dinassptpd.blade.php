@extends('master')
@section('title')
    Kelola SPTPD
@endsection
@section('breadcrumb')
    <li><a href="/admin/home">Beranda</a></li>
    <li class="active">Kelola SPTPD</li>
@endsection
@section('content')
    <div class="row details"><!-- start details -->
        <div class="col-md-12">
            <table class="table table-hover table-condensed mytable">
                <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 15%">No SPTPD</th>
                    <th style="width: 15%">Jenis Pajak</th>
                    <th style="width: 15%">Nama Usaha</th>
                    <th style="widht: 10%">Status SKPD</th>
                    <th style="widht: 10%">Status SSPD</th>
                    <th style="width: 30%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($daftarSptpd as $sptpd)
                    <tr>
                        <td>{{$sptpd->no_pajak}}</td>
                        <td>{{$sptpd->no_sptpd}}</td>
                        <td>Pajak {{$sptpd->pajak->jenis_pajak}}</td>
                        <td>{{$sptpd->pajak->wajibPajak->izinUsaha->nama_usaha}}</td>
                        @if($sptpd->terbit_skpd)
                            <td>Sudah Dikirim</td>
                        @else
                            <td>Belum Dikirim</td>
                        @endif
                        @if($sptpd->statusSspdPerSptpd())
                            <td>Sudah</td>
                        @else
                            <td>Belum</td>
                        @endif




                        <td class="vcenter" style="text-align:right;">
                            <a href="#">lihat berkas</a>
                            @if(! $sptpd->terbit_skpd)
                                | <a href="/admin/pajak/{{$sptpd->no_sptpd}}/kirimskpd">kirim SKPD</a>
                            @endif
                            @if(! $sptpd->statusSspdPerSptpd() && $sptpd->terbit_skpdkb == false)
                                | <a href="/admin/pajak/{{$sptpd->no_sptpd}}/kirimskpdkb">kirim SKPDKB</a>
                            @endif
                            | <a href="#">hapus</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
