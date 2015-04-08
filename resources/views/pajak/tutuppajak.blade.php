@extends('master')
@section('title')
    Menutup Pajak
@endsection
@section('breadcrumb')
    <li><a href="/homewp">Beranda</a></li>
    <li><a href="/setting">Pengaturan</a></li>
    <li><a href="/settingpajak"> Pajak </a></li>
    <li class="active"> Tutup Pajak</li>
@endsection
@section('content')
    <div class="company_ad">
        <h2> Pengaturan </h2>
    </div>
    <div class="row details setting">
        <ul class="col-md-4 nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="/setting"><h4>Pajak</h4></a></li>
            <li role="presentation"><a href="/tutupnpwpd"><h4>NPWPD</h4></a></li>
        </ul>
        <div class="col-md-8">
            <div class="panel panel-default panel-setting">
                <div class="panel-heading">
                    <h2>Menutup Pajak </h2>
                </div>
                <form role="form" method="POST" action="/settingpajak/{{$id}}/tutup">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Permohonan penutupan pajak gagal!<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif
                        <div class="col-md-offset-1 form-group">
                            <div class="row">
                                <h4><label class="col-md-4"><b>Alasan penutupan : </b></label></h4>

                                <div class="col-md-6">
                                    <textarea rows="4" cols="50" name="alasan"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-offset-6">
                            <button type="submit" class="btn btn-default btn-crud">Ajukan Penutupan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection