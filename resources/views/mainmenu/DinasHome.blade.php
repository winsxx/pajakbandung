@extends('master')
@section('title')
Beranda
@endsection
@section('content')
<div class="row grids_btm top">
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>1</p>
				</div>
				<div class="grid_1_of_1">
				  	<h3><a href = "/kelolapajak">Kelola Pajak </a></h3>
					<p>Lihat daftar pajak, tutup pajak, kirim SKPDKB</p>	   
	 			</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>2</p>
				</div>
				<div class="grid_1_of_1">
				  	<h3><a href = "/kelolanpwpd">Kelola NPWPD </a></h3>
					<p>Lihat daftar NPWPD, Menutup NPWPD</p>   
 				</div>
			</div>
			 	<div class="clearfix"></div>
		</div>
	</div>
	<div class="row grids_btm top">
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>3</p>
				</div>
				<div class="grid_1_of_1">
				  	<h3><a href = "/kelolasptpd">Kelola SPTPD </a></h3>
					<p>Lihat semua SPTPD, kirim SKPD</p>
 				</div>
			 	<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>4</p>
				</div>
				<div class="grid_1_of_1">
					<h3><a href = "/kelolasspd">Kelola SSPD </a></h3>
					<p>Lihat semua SSPD</p>	 			
				</div>
			 	<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@endsection