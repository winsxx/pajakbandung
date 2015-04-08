@extends('master')
@section('title')
Pengaturan Akun
@endsection
@section('breadcrumb')
<li><a href="/home">Beranda</a></li>
<li class="active">Pengaturan</li>
@endsection
@section('content')

<div class="company_ad">
	<h2> Pengaturan </h2>
</div>
<div class="row details setting">
	<ul class="col-md-4 nav nav-pills nav-stacked">
	  <li role="presentation" class="active"><a href="setting"><h4>Pajak</h4></a></li>
	  <li role="presentation"><a href="tutupnpwpd"><h4>NPWPD</h4></a></li>
	</ul>
	<div class="col-md-8">
		<div class="panel panel-default panel-setting">
			<div class="panel-heading">
				<h2> Pajak anda saat ini </h2>
			</div>
			<div class="panel-body">
                @if (count($daftarPajak) == 0)
                <h3 class="text-center">Saat ini Anda tidak memiliki pajak untuk dikelola.</h3>
                @else
                <ol>
                    @foreach($daftarPajak as $pajak)
                        @if($pajak->status!= 'nonaktif')
                        <h3><a href = "settingpajak/{{$pajak->id}}" > <li>Pajak {{$pajak->jenis_pajak}} </a></h3>
                        @endif
                    @endforeach
                </ol>
                @endif
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@endsection