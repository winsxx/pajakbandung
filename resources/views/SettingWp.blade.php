@extends('master')
@section('title')
Pengaturan Akun
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
				<h2> Pajak anda saat  ini </h2>
			</div>
			<div class="panel-body">
				<ol>
					<h3><a href = "#" > <li>Pajak Hotel </a></h3>
					<h3><a href = "#" > <li>Pajak Restoran </a></h3>
				</ol>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@endsection