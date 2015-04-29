@extends('master')
@section('title')
    Menutup NPWPD
@endsection
@section('breadcrumb')
    <li><a href="{{url('/home')}}">Beranda</a></li>
    <li><a href="{{url('/setting')}}">Pengaturan</a></li>
    <li class="active"> NPWPD </a></li>
@endsection
@section('content')
    @if(isset($success))
        <div class="bg-success alert-success text-center"><h4>{{$success}}</h4></div>
    @endif
    <div class="company_ad">
        <h2> Pengaturan </h2>
    </div>
    <div class="row details setting">
        <ul class="col-md-4 nav nav-pills nav-stacked">
            <li role="presentation"><a href="{{url('/setting')}}"><h4>Pajak</h4></a></li>
            <li role="presentation" class="active"><a href="{{url('/tutupnpwpd')}}"><h4>NPWPD</h4></a></li>
        </ul>
        <div class="col-md-8">
            <div class="panel panel-default panel-setting">
                <div class="panel-heading">
                    <h2>Menutup NPWPD</h2>
                </div>
                <form role="form" method="POST" action="{{ url('tutupnpwpd') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Permohonan penutupan NPWPD gagal!<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif
                        <div class="col-md-offset-1 form-group">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p> Laman ini berfungsi untuk mengajukan permohonan penutupan NPDPD Anda.
                                        Untuk menutup NPWPD anda harus mengunggah beberapa dokumen, antara lain : </p>
                                    <ol class="label-dok">
                                        <li> Surat Penutupan Usaha</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dok_daftar">File input (.pdf)</label>
                                <input type="file" id="dok_daftar" name="dokumen">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-6">
                        <button type="submit" class="btn btn-default btn-crud">Ajukan Penutupan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    </div>
@endsection