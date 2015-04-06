@extends('master')
@section('title')
Menutup Pajak
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
				<h2>Menutup Pajak </h2>
			</div>
			<div class="panel-body">
			  	<div class="col-md-offset-1 form-group">
					<div class="row">
					    <h4><label class="col-md-4"><b>Alasan penutupan : </b></label></h4>
						<div class="col-md-6">
							<textarea rows="4" cols="50"></textarea>
						</div>
					</div>
					<div class="row col-md-offset-1">
						<h4><b>Dokumen yang diperlukan</b></h4>
						<ol class="label-dok">
							<li> Surat Ijin Usaha </li>
							<li> Fotocopy KTP </li>
	  					</ol>
	  					<div class="form-group">
						    <label for="dok_daftar">File input</label>
					    	<input type="file" id="dok_daftar">
						 </div>
					</div>
				</div>
			  		<div class="col-md-offset-6">
			  			<button type="submit" class="btn btn-default btn-crud">Ajukan Penutupan</button>
			  		</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@endsection