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
				  	<h3><a href = "/admin/kelolapajak">Kelola Pajak </a></h3>
					<p>Lihat daftar pajak, tutup pajak, hapus pajak</p>	   
	 			</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>2</p>
				</div>
				<div class="grid_1_of_1">
				  	<h3><a href = "/admin/kelolanpwpd">Kelola NPWPD </a></h3>
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
				  	<h3><a href = "/admin/kelolasptpd">Kelola Pembayaran Pajak</a></h3>
					<p>Lihat semua SPTPD, kirim SKPD dan SKPDKB Hotel dan Restoran</p>
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
					<h3><a href = "/admin/kelolasspd">Kelola SSPD</a></h3>
					<p>Lihat semua SSPD</p>	 			
				</div>
			 	<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row grids_btm top">
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>5</p>
				</div>
				<div class="grid_1_of_1">
					<h3><a href = "#">Terbitkan SKPD PBB </a></h3>
					<p>Mengirimkan SKPD kepada semua wajib pajak yang terdaftar di PBB</p>	 			
				</div>
			 	<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>6</p>
				</div>
				<div class="grid_1_of_1">
					<h3><a href = "#">Terbitkan SKPDKB PBB</a></h3>
					<p>Mengirimkan SKPDKB kepada semua wajib pajak PBB yang belum bayar pajak</p>	 			
				</div>
			 	<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@endsection