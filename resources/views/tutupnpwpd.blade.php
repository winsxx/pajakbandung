@extends('master')
@section('title')
Menutup NPWPD
@endsection
@section('breadcrumb')
<li><a href="/homewp">Beranda</a></li>
<li><a href="/setting">Pengaturan</a></li>
<li class="active"> NPWPD </a></li>
@endsection
@section('content')
<div class="company_ad">
	<h2> Pengaturan </h2>
</div>
<div class="row details setting">
	<ul class="col-md-4 nav nav-pills nav-stacked">
	  <li role="presentation"><a href="setting"><h4>Pajak</h4></a></li>
	  <li role="presentation" class="active"><a href="tutupnpwpd"><h4>NPWPD</h4></a></li>
	</ul>
	<div class="col-md-8">
		<div class="panel panel-default panel-setting">
			<div class="panel-heading">
				<h2>Menutup NPWPD</h2>
			</div>
			<div class="panel-body">
			  	<div class="col-md-offset-1 form-group">
					<div class="panel panel-default">
						<div class="panel-body">
							<p> Laman ini berfungsi untuk mengajukan permohonan penutupan NPDPD Anda.
								Untuk menutup NPWPD anda harus mengunggah beberapa dokumen, antara lain : </p>
							<ol class="label-dok">
								<li> Surat Penutupan Usaha </li>
								<li> Fotocopy KTP </li>
		  					</ol>
		  				</div>
		  			</div>
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