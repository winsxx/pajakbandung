@extends('master')
@section('title')
Kelola SSPD
@endsection
@section('breadcrumb')
<li><a href="{{url('/admin/home')}}">Beranda</a></li>
<li class="active">Kelola SKPDKB</li>
@endsection
@section('content')
<div class="row details"><!-- start details -->
    <div class="row grids_btm top">
    <a href="#">
        <button class="btn btn-default">Terbitkan SKPDKB untuk PBB</button>
    </a>
    </div>
    <div class="row grids_btm top">
		<div class="col-md-12">
			<table class="table table-hover table-condensed mytable">
		        <thead>
		            <tr>
		                <th style="width: 5%;">No</th>
		                <th style="width: 15%">No SKPDKB</th>
		                <th style="width: 15%">Jenis Pajak</th>
		                <th style="width: 15%">Nama Usaha</th>
		                <th style="width: 30%"></th>
		            </tr>
		        </thead>
		        <tbody>
		            <tr>
		                <td>1</td>
		                <td>12345</td>
		                <td>Pajak Hotel</td>
		                <td>Hotel lalal</td>
		                <td class="vcenter" style="text-align:right;">
		                	<a href="#">lihat berkas</a> | <a href="#">hapus</a>
		                </td>
		            </tr>
		            <tr>
		                <td>1</td>
		                <td>12345</td>
		                <td>Pajak Hotel</td>
		                <td>Hotel lalal</td>
		                <td class="vcenter" style="text-align:right;">
		                	<a href="#">lihat berkas</a> | <a href="#">hapus</a>
		                </td>
		            </tr>
		            <tr>
		                <td>1</td>
		                <td>12345</td>
		                <td>Pajak Hotel</td>
		                <td>Hotel lalal</td>
		                <td class="vcenter" style="text-align:right;">
		                	<a href="#">lihat berkas</a> | <a href="#">hapus</a>
		                </td>
	            	</tr>
		        </tbody>
		    </table>
		</div>
	</div>
</div>
@endsection
