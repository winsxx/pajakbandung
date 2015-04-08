@extends('master')
@section('title')
Kelola NPWPD
@endsection
@section('breadcrumb')
<li><a href="/homedinas">Beranda</a></li>
<li class="active">Kelola NPWPD</li>
@endsection
@section('content')
<div class="row details"><!-- start details -->
	<div class="col-md-12">
		<table class="table table-hover table-condensed mytable">
	        <thead>
	            <tr>
	                <th style="width: 5%;">No</th>
	                <th style="width: 15%">NPWPD</th>
	                <th style="width: 15%">Jenis Pajak</th>
	                <th style="width: 15%">Nama Usaha</th>
	                <th style="widht: 20%">Status</th>
	                <th style="width: 30%"></th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>Aktif</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">tutup</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>2</td>
	                <td>12345</td>
	                <td>Pajak Restoran</td>
	                <td>Hotel lalal</td>
	                <td>Mengajukan penutupan</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">tutup</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>3</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>Ditutup</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">tutup</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	        </tbody>
	    </table>
	</div>
</div>
@endsection