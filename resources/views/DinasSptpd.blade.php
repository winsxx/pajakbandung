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
	<div class="col-md-7">
		<table class="table table-hover table-condensed mytable">
	        <thead>
	            <tr>
	                <th style="width: 10%;">No</th>
	                <th style="width: 35%">No SPTPD</th>
	                <th style="width: 30%">Nama Usaha</th>
	                <th style="width: 35%">Jenis Pajak</th>
	                <th style="width: 25%"></th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Hotel lalal</td>
	                <td>Pajak hotel</td>
	                <td class="vcenter"><input type="checkbox" id="blahA" value="1"/></td>
	            </tr>
	            <tr>
	                <td>2</td>
	                <td>12345</td>
	                <td>Hotel lalal</td>
	                <td>Pajak hotel</td>
	                <td class="vcenter"><input type="checkbox" id="blahA" value="1"/></td>
	            </tr>
	            <tr>
	                <td>3</td>
	                <td>12345</td>
	                <td>Hotel lalal</td>
	                <td>Pajak hotel</td>
	                <td class="vcenter"><input type="checkbox" id="blahA" value="1"/></td>
	            </tr>
	        </tbody>
	    </table>
	</div>
	<div class="col-md-5">
		<button class="btn btn-default btn-crud">Ubah</button>
		<button class="btn btn-default btn-crud">Hapus</button>
		<button class="btn btn-default btn-crud">Tambah</button>
		
	</div>
</div>
@endsection
