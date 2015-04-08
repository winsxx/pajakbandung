@extends('master')
@section('title')
Pajak Hotel
@endsection
@section('breadcrumb')
<li><a href="/home">Beranda</a></li>
<li class="active">Pajak Hotel XXX</li>
@endsection
@section('content')
	<div class="company_ad">
		<h2>Pajak Hotel XXX </h2>
	</div>
	<div class="row">
		<div class="panel panel-default col-md-6 col-md-offset-3">
			<div class="panel-body" style="text-align:center;">
				<h3>Status pajak anda saat ini aktif.<br> Anda telah mengajukan SPTPD.</h3>
			</div>
		</div>
		<div class="menuperpajak">
			<div class="col-md-4">
				<a href="formsptpd"><button class="btn btn-default btn-add-pajak">Ajukan SPTPD</button></a>
				<a href="formsspd"><button class="btn btn-default btn-add-pajak">Ajukan SSPD</button></a>
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