@extends('master')
@section('title')
Kelola Pajak
@endsection
@section('breadcrumb')
<li><a href="/homedinas">Beranda</a></li>
<li class="active">Kelola Pajak</li>
@endsection
@section('content')
<div class="row details"><!-- start details -->
	<div class="col-md-12">
		<table class="table table-hover table-condensed mytable">
	        <thead>
	            <tr>
	                <th style="width: 5%;">No</th>
	                <th style="width: 14%;">NPWPD</th>
	                <th style="width: 13%">Jenis Pajak</th>
	                <th style="width: 15%">Nama Usaha</th>
	                <th style="widht: 15%">Status SSPD</th>
	                <th style="widht: 15%">Keterangan</th>
	                <th style="width: 25%"></th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>Sudah</td>
	                <td> - </td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">tutup</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>2</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>Belum</td>
	                <td> - </td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">kirim skpdkb</a> | <a href="#">tutup</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>3</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>Belum</td>
	                <td>Mengajukan Penutupan</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">kirim skpdkb</a> | <a href="#">tutup</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>3</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td>-</td>
	                <td>Sudah ditutup</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">hapus</a>
	                </td>
	            </tr>
	        </tbody>
	    </table>
	</div>
</div>	
@endsection