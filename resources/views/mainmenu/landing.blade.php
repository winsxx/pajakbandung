@extends('master')
@section('title')
Dinas Pelayanan Pajak Kota Bandung
@endsection
@section('slider')
<div class="col-md-8">
	<div class="col-md-10 slider_text">
		<h3> Website Dinas Pajak </h3>
		<h2> Pelayanan Pajak Restoran, Pajak Hotel, dan Pajak Bumi Bangunan </h2>
	</div>
</div>
<div class="col-md-4">
	<div class="slider_img">
		<img src="{{url('/images/pic1.png')}}" alt="" class="img-responsive"/>
	</div>
</div>
@endsection
@section('content')
<script type="text/javascript">
    $.ajax({
        type: 'get',
        url: 'http://e-gov-bandung.tk/dukcapil/api/public/check/authenticated',
        success: function(data) {
            console.log(data)
            if (data != 'false') { //redirect ke alamat login kalian
                var url = "{{url()}}/home?id="+data;
                window.location.href = url;
            } else {
                var url = "{{url()}}/login" //redirect ke home page kalian, tp kalian juga harus login sendiri juga
                window.location.href = url
            }
        },
        error: function(data) {
            alert(data);
        }
    });
</script>
<div class="row grids_of_3">
	<div class="col-md-6 grid1_of_3">
		  <h2>Tentang Pajak Bandung</h2>
		  <img src="{{url('/images/info.png')}}" class="img-responsive"/>
		  <p>Informasi lebih lanjut mengenai perpajakan di kota Bandung.</p>
	     <div class="rd_more1">
			<a href="{{url('/about')}}"><button class="btn_style">Baca</button></a>
		</div>
	</div>
	<div class="col-md-6 grid1_of_3">
		<h2>Daftar NPWPD</h2>
		  <img src="{{url('/images/akun.png')}}" class="img-responsive"/>
		  <p>Daftarkan NPWPD untuk usaha anda dengan cepat dan mudah</p>
	      <div class="rd_more1">
			<a href="{{url('/daftar')}}"><button class="btn_style">daftar</button></a>
		</div>
	</div>
	    <div class="clearfix"></div>
</div>
@endsection