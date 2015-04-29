@extends('master')
@section('title')
Pajak {{$pajak->jenis_pajak}}
@endsection
@section('breadcrumb')
<li><a href="{{url('/home')}}">Beranda</a></li>
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
				    <a href="{{url('/pajak/'.$pajak->id.'/sptpd')}}"><button class="btn btn-default btn-add-pajak">Ajukan SPTPD</button></a>
                @endif
				<a href="{{url('/pajak/'.$pajak->id.'/sspd')}}/sspd"><button class="btn btn-default btn-add-pajak">Ajukan SSPD</button></a>
			</div>
			<div class="col-md-4 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4> Daftar surat anda </h4>
					</div>	
					
						@if ($pajak->jenis_pajak == "pbb")							
								<div class="panel-body" style="font-size:14px;">
									<ol>
										@if ($skpd != null)
											<li><a href="{{url('/pajak/'.$pajak->id.'/skpd/'.$skpd->id)}}">SKPD- {{ $skpd->id }}</a></li>
										@endif
										@if ($skpdkb != null)							
											<li><a href="{{url('/pajak/'.$pajak->id.'/skpdkb/'.$skpdkb-id)}}">SKPDKB- {{ $skpdkb->id }}</a></li>
										@endif
									</ol>
									@if ($skpd != null || $skpdkb != null)
										<div class="col-md-offset-8">
											<a href="{{url('/pajak/'.$pajak->id.'/skpdall')}}">lainnya...</a>
										</div>
									@endif
								</div>							
						@elseif ($pajak->jenis_pajak != "pbb")
							<div class="panel-body" style="font-size:14px;">
								<ol>
									@if ($skpd != null)
										<li><a href="{{url('/pajak/'.$pajak->id.'/skpd/'.$skpd->no_sptpd)}}">SKPD- {{$skpd->no_sptpd}}</a></li>
									@endif					
									@if ($skpdkb != null)	
										<li><a href="{{url('/pajak/'.$pajak->id.'/skpdkb/'.$skpdkb->no_sptpd)}}">SKPDKB- {{$skpdkb->no_sptpd}}</a></li>
									@endif
								</ol>
								@if ($skpd != null || $skpdkb != null)
									<div class="col-md-offset-8">
										<a href="{{url('/pajak/'.$pajak->id.'/skpdall')}}">lainnya...</a>
									</div>
								@endif
							</div>
						@endif					
				</div>
			</div>
		</div>

	</div>
@endsection