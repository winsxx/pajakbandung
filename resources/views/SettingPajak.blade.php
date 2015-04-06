@extends('master')
@section('title')
Pengaturan Pajak
@endsection
@section('breadcrumb')
<li><a href="/homedinas">Beranda</a></li>
<li class="active">Pengaturan</li>
@endsection
@section('content')
<div class="company_ad">
	<h2> Pengaturan </h2>
</div>
<div class="row details setting">
	<ul class="col-md-4 nav nav-pills nav-stacked">
	  <li role="presentation" class="active"><a href="#"><h4>Pajak</h4></a></li>
	  <li role="presentation"><a href="#"><h4>NPWPD</h4></a></li>
	</ul>
	<div class="col-md-8">
		<div class="panel panel-default panel-setting">
			<div class="panel-heading">
				<h2> Pajak Hotel </h2>
			</div>
			<div class="panel-body">
				<h3> Pengelola pajak anda saat ini : <h3>
				<ul class="list-group col-md-offset-1">
				    <li class="list-group-item">
				    	<div> Mr. Lalala </div>
				    	<div> 
				    </li>
				    <li class="list-group-item">Mr. BBBBBBB</li>
				    <li class="list-group-item">Mr. asdadsadsa</li>
				    <li class="list-group-item">Mr. jsbdadbas</li>
			  	</ul>
			  	<a href ="/tambahpengelola"><button class="btn btn-default btn-crud">Tambah Pengelola</button></a>
				<a href ="/tutuppajak"><button class="btn btn-default btn-crud">Tutup Pajak</button></a>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@endsection