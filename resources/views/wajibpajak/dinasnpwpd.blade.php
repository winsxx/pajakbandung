@extends('master')
@section('title')
    Kelola NPWPD
@endsection
@section('breadcrumb')
    <li><a href="/admin/home">Beranda</a></li>
    <li class="active">Kelola NPWPD</li>
@endsection
@section('content')
    <div class="row details"><!-- start details -->
        <h4> Daftar NPWPD yang terdaftar </h4>
        <br>

        <div class="col-md-12">
            <table class="table table-hover table-condensed mytable">
                <thead>
                <tr>
                    <th style="width: 15%">NPWPD</th>
                    <th style="width: 15%">Nama Usaha</th>
                    <th style="widht: 20%">Status</th>
                    <th style="width: 30%"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($listnpwpd as $wajibpajak)
                    <tr>
                        <td>{{$wajibpajak->npwpd}}</td>
                        <td>{{$wajibpajak->izinUsaha->nama_usaha}}</td>
                        <td>{{$wajibpajak->status}} </td>
                        <td class="vcenter" style="text-align:right;">
                            <a href="#">lihat berkas</a> | <a href="pajak/{{$wajibpajak->npwpd}}/tutupnpwpd">tutup</a> |
                            <a href="pajak/{{$wajibpajak->npwpd}}/hapusnpwpd">hapus</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection