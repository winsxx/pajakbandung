@extends('master')
@section('title')
Pengaturan Pajak
@endsection
@section('breadcrumb')
<li><a href="{{url('/home')}}">Beranda</a></li>
<li><a href="{{url('/setting')}}">Pengaturan</a></li>
<li class="active"> Pajak </a></li>
@endsection
@section('content')
<div class="company_ad">
	<h2> Pengaturan </h2>
</div>
<div class="row details setting">
	<ul class="col-md-4 nav nav-pills nav-stacked">
	  <li role="presentation" class="active"><a href="{{url('/setting')}}"><h4>Pajak</h4></a></li>
	  <li role="presentation"><a href="{{url('/tutupnpwpd')}}"><h4>NPWPD</h4></a></li>
	</ul>
	<div class="col-md-8">
		<div class="panel panel-default panel-setting">
			<div class="panel-heading">
				<h2> Pajak {{$pajak->jenis_pajak}} </h2>
			</div>
			<div class="panel-body">
				<h3> Pengelola pajak anda saat ini : <h3>
                @if (count($kolaborator) == 0)
                    <h3 class="text-center">Tidak ada kolaborator.</h3>
                @else
				<ul class="list-group col-md-offset-1">
                    @foreach($kolaborator as $penduduk)
				    <li class="list-group-item">{{$penduduk->nama}} ( {{$penduduk->no_ktp}} )</li>
                    @endforeach
			  	</ul>
                @endif
			  	<a href ="{{url('/settingpajak/'.$pajak->id.'/tambahpengelola')}}"><button class="btn btn-default btn-crud">Tambah Pengelola</button></a>
				<a href ="{{url('/settingpajak/'.$pajak->id.'/tutup')}}"><button class="btn btn-default btn-crud">Tutup Pajak</button></a>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@endsection