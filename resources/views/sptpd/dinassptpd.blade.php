@extends('master')
@section('title')
Kelola SPTPD
@endsection
@section('breadcrumb')
<li><a href="/homedinas">Beranda</a></li>
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
	                <th style="widht: 20%">Status SKPD</th>
	                <th style="width: 30%"></th>
	            </tr>
	        </thead>
	        <tbody>
<!-- 	        	@foreach($listSptpd as $sptpd)
        		<tr>
	                <td>1</td>
	                <td>{{$sptpd->no_sptpd}}</td>
	                <td>{{$sptpd->jenis_pajak}}</td>
	                <td>Hotel lalal</td>
	                <td>Sudah Dikirim</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">kirim SKPD</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	        	@endforeach
 -->	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>Sudah Dikirim</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">kirim SKPD</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>Sudah Dikirim</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">kirim SKPD</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>Sudah Dikirim</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">kirim SKPD</a> | <a href="#">hapus</a>
	                </td>
            	</tr>
	        </tbody>
	    </table>
	</div>
</div>
@endsection
