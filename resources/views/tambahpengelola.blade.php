@extends('master')
@section('title')
Tambah Pengelola Pajak
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
				<h2>Tambah Pengelola Pajak Hotel </h2>
			</div>
			<div class="panel-body">
			  	<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<label class="col-md-4 control-label">Nama Pengelola</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="nama" value="{{ old('name') }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">No KTP Pengelola</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="no_ktp" value="{{ old('email') }}">
						</div>
					</div>
			  		<div class="col-md-offset-6">
			  			<button type="submit" class="btn btn-default btn-crud">Tambah Pengelola</button>
			  		</div>
			  	</form>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@endsection