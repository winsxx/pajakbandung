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
				  	<h3><a href = "{{url('/admin/kelolapajak')}}">Kelola Pajak </a></h3>
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
				  	<h3><a href = "{{url('/admin/kelolanpwpd')}}">Kelola NPWPD </a></h3>
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
				<div class="grid_1_of_1" style="padding:1.5%;">
				  	<h3><a href = "{{url('/admin/kelolasptpd')}}">Kelola Pembayaran Pajak Hotel dan Restoran</a></h3>
					<p>Lihat semua SPTPD, kirim SKPD dan SKPDKB</p>
 				</div>
			 	<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>4</p>
				</div>
				<div class="grid_1_of_1" style="padding:1.5%%;">
					<h3><a href = "{{url('/admin/kelolapbb')}}">Kelola Pembayaran Pajak Bumi dan Bangunan</a></h3>
					<p>Menerbitkan SKPD, menerbitkan SKPDKB</p>	 			
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
					<h3><a href = "{{url('/admin/kelolasspd')}}">Lihat Daftar SSPD</a></h3>
					<p>Melihat semua SSPD yang dikirim</p>	 			
				</div>
			 	<div class="clearfix"></div>
			</div>
		</div>
		
	</div>
</div>
@endsection