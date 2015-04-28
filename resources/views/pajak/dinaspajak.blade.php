@extends('master')
@section('title')
Kelola Pajak
@endsection
@section('breadcrumb')
<li><a href="/admin/home">Beranda</a></li>
<li class="active">Kelola Pajak</li>
@endsection
@section('content')
<div class="row details"><!-- start details -->
    <h4> Daftar Pajak yang terdaftar </h4>
    <br>
	<div class="col-md-12">
		<table class="table table-hover table-condensed mytable">
	        <thead>
	            <tr>
	                <th style="width: 5%;">No</th>
	                <th style="width: 14%;">NPWPD</th>
	                <th style="width: 13%">Jenis Pajak</th>
	                <th style="width: 15%">Nama Usaha</th>
	                <th style="widht: 15%">Status Pajak</th>
	                <th style="widht: 15%">Keterangan</th>
	                <th style="width: 25%"></th>
	            </tr>
	        </thead>
	        <tbody>
                @foreach($daftarpajak as $pajak)
                    <tr>
                        <td>{{$pajak->id}}</td>
                        <td>{{$pajak->npwpd_pemilik}}</td>
                        <td>Pajak {{$pajak->jenis_pajak}}</td>
                        <td>kasjhdka</td>
                        @if($pajak->statusPembayaranSspd())
                            <td>Sudah bayar</td>
                        @else
                            <td>Belum bayar</td>
                        @endif

                        <td>
                            @if($pajak->status == "nonaktif")
                                [Sudah Ditutup]
                            @elseif($pajak->status == "proses_nonaktif")
                                [Mengajukan Penutupan]
                            @endif
                        </td>
                        <td class="vcenter" style="text-align:right;">
                            @if($pajak->status == "nonaktif")
                                <a href="#">hapus</a>
                            @else
                                <a href="{{url("admin/pajak/".$pajak->id."/tutuppajak")}}">tutup</a>
                                | <a href="#">hapus</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

	        </tbody>
	    </table>
	</div>
</div>	
@endsection