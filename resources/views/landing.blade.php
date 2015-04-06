@extends('master')
@section('title')
Dinas Pelayanan Pajak Kota Bandung
@endsection
@section('slider')
<div class="col-md-8">
		<div class="col-md-10 slider_text">
			<h2> Website Resmi Dinas Pelayanan Pajak Kota Bandung</h2>
			<h3>Ayo Bayar Pajak Tepat Waktu</h3>
		</div>
	</div>
	<div class="col-md-4">
		<div class="slider_img">
			<img src="images/pic1.png" alt="" class="img-responsive"/>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="row grids_of_3">
	<div class="col-md-6 grid1_of_3">
		  <h2>Tentang Pajak Bandung</h2>
		  <img src="images/info.png" class="img-responsive"/>
		  <p>Informasi lebih lanjut mengenai perpajakan di kota Bandung.</p>
	     <div class="rd_more1">
			<a href="single-page.html"><button class="btn_style">Baca</button></a>
		</div>
	</div>
	<div class="col-md-6 grid1_of_3">
		<h2>Daftar NPWPD</h2>
		  <img src="images/akun.png" class="img-responsive"/>
		  <p>Daftarkan NPWPD untuk usaha anda dengan cepat dan mudah</p>
	      <div class="rd_more1">
			<a href="single-page.html"><button class="btn_style">daftar</button></a>
		</div>
	</div>
	    <div class="clearfix"></div>
</div>
@endsection