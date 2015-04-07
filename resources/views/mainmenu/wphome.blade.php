@extends('master')
@section('title')
Beranda
@endsection
@section('content')
	<div class="company_ad">
		<h2> Daftar pajak anda </h2>
	</div>
	<div class="row pajak-container">
		<div class="col-md-5 list-pajak">
			<div class="grid_list_pajak">
				<div class="images_pajak">
					<p>H</p>
				</div>
				<div class="grid_pajak">
				  	<h3><a href = "#.php">Pajak Hotel </a></h3>	   
	 			</div>
			 	<div class="clearfix"></div>
			</div>
			<div class="grid_list_pajak">
				<div class="images_pajak">
					<p>R</p>
				</div>
				<div class="grid_pajak">
				  	<h3><a href = "#.php">Pajak Restoran </a></h3>	   
	 			</div>
	 			<div class="clearfix"></div>
			</div>
			<div class="grid_list_pajak">
				<div class="images_pajak">
					<p>H</p>
				</div>
				<div class="grid_pajak">
				  	<h3><a href = "#.php">Pajak Hotel </a></h3>	   
	 			</div>
			 	<div class="clearfix"></div>
			</div>
			<div class="grid_list_pajak">
				<div class="images_pajak">
					<p>R</p>
				</div>
				<div class="grid_pajak">
				  	<h3><a href = "#.php">Pajak Restoran </a></h3>	   
	 			</div>
			 	<div class="clearfix"></div>
			</div>
		</div>
		
		<div class="col-md-5">
			<div class="btn-add-pajak"> 
				<p>Anda memiliki usaha baru? Daftarkan pajak usaha anda pada link berikut </p>
			</div>
			<button class="btn btn-default btn-add-pajak" href="#">Daftar Pajak Baru</button>
		</div>
	</div>
@endsection