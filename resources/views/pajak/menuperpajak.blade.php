@extends('master')
@section('title')
Pajak Hotel
@endsection
@section('breadcrumb')
<li><a href="/home">Beranda</a></li>
<li class="active">Pajak {{$pajak->jenis_pajak}}</li>
@endsection
@section('content')
	<div class="company_ad">
		<h2>Pajak {{$pajak->jenis_pajak}} </h2>
	</div>
	<div class="row">
		<div class="panel panel-default col-md-6 col-md-offset-3">
			<div class="panel-body" style="text-align:center;">
				<h3>Status pajak anda saat ini: {{$pajak->status}}.</h3>
			</div>
		</div>
		<div class="menuperpajak">
			<div class="col-md-4">
                @if($pajak->jenis_pajak != "pbb")
				    <a href="/pajak/{{$pajak->id}}/sptpd"><button class="btn btn-default btn-add-pajak">Ajukan SPTPD</button></a>
                @endif
				<a href="/pajak/{{$pajak->id}}/sspd"><button class="btn btn-default btn-add-pajak">Ajukan SSPD</button></a>
			</div>
			<div class="col-md-4 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4> Daftar surat anda </h4>
					</div>	
					<div class="panel-body" style="font-size:14px;">
						<ol>
							<li><a href="viewskpd">SKPD-XX</a></li>
							<li><a href="viewskpd">SKPD-XX</a></li>
							<li><a href="viewskpd">SKPDKB-XX</a></li>
						</ol>
						<div class="col-md-offset-8">
							<a href="seeallskpd">lainnya...</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection