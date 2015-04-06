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
	<div class="col-md-6">
		<table class="table table-hover table-condensed mytable">
	        <thead>
	            <tr>
	                <th style="width: 25%;">No</th>
	                <th style="width: 40%">Jenis Pajak</th>
	                <th style="width: 35%">Nama Usaha</th>
	                <th style="width: 35%"></th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	                <td>1</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td class="vcenter"><input type="checkbox" id="blahA" value="1"/></td>
	            </tr>
	            <tr>
	                <td>2</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td class="vcenter"><input type="checkbox" id="blahA" value="1"/></td>
	            </tr>
	            <tr>
	                <td>3</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td class="vcenter"><input type="checkbox" id="blahA" value="1"/></td>
	            </tr>
	        </tbody>
	    </table>
	</div>
	<div class="col-md-6">
		<button class="btn btn-default btn-crud">Ubah</button>
		<button class="btn btn-default btn-crud">Hapus</button>
		<button class="btn btn-default btn-crud">Tambah</button>
		
	</div>
</div>	
@endsection