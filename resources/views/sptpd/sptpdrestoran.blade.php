@extends('master')
@section('title')
	Mengajukan SPTPD Restoran
@endsection
@section('breadcrumb')
<li><a href="/homewp"> Beranda </a></li>
<li class="active"> SPTPD Restoran </li>
@endsection
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="company_ad">
        <h2> Pengajuan SPTPD </h2>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-md-4 control-label">Pajak yang dilaporkan</label>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Bulan</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="bulan-sptpd" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Penjualan makanan</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="penjualan-makanan" value="">
            </div>
        </div>

        <div class="form-group" style="margin-top:10%;">
            <div class="col-md-6 col-md-offset-8">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
@endsection