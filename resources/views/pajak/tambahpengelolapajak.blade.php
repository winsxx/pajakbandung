@extends('master')
@section('title')
Tambah Pengelola Pajak
@endsection
@section('breadcrumb')
<li><a href="{{url('/home')}}">Beranda</a></li>
<li><a href="{{url('/setting')}}">Pengaturan</a></li>
<li><a href="{{url('/settingpajak')}}"> Pajak </a></li>
<li class="active"> Tambah Pengelola </li>
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
				<h2>Tambah Pengelola Pajak {{$pajak->jenis_pajak}}</h2>
			</div>
			<div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Penambahan kolaborator gagal!<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                    </div>
                @endif
			  	<form class="form-horizontal" role="form" method="POST" action="{{url('/settingpajak/'.$pajak->id.'/tambahpengelola')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<label class="col-md-4 control-label">No KTP Pengelola</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="no_ktp" value="{{ old('no_ktp') }}">
						</div>
					</div>
			  		<div class="col-md-offset-7">
			  			<button type="submit" class="btn btn-default btn-crud">Tambah Pengelola</button>
			  		</div>
			  	</form>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@endsection