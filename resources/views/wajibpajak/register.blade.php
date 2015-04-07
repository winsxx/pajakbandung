@extends('master')
@section('title')
    Daftar NPWPD
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Pendaftaran NPWPD Badan Usaha</div>
                    <div class="panel-body">
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/wajibpajak/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Nama Pemilik</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="text" class="form-control" name="name" value="{{ old('name') }}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">E-Mail Pemilik</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="email" class="form-control" name="email" value="{{ old('email') }}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">No KTP Pemilik</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="text" class="form-control" name="no_KTP">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Nama Usaha</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="text" class="form-control" name="nama_usaha">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Alamat Usaha</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="text" class="form-control" name="alamat_usaha">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Telepon Usaha</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="text" class="form-control" name="tel_usaha">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Email Usaha</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="text" class="form-control" name="tel_usaha">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Operasional Mulai</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="text" class="form-control" name="tel_usaha">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <label class="col-md-4 control-label">No Ijin Usaha</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="no_ijin_usaha">
                                </div>
                                {{--<label class="col-md-1 control-label" style="margin-left:0%;">Tgl</label>--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<input type="text" class="form-control" name="no_ijin_usaha">--}}
                                {{--</div>--}}
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Bidang Usaha</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="checkbox check-usaha">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="check_hotel"> Hotel--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="checkbox check-usaha">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="check_restoran"> Restoran--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Password</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="password" class="form-control" name="password">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Confirm Password</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="password" class="form-control" name="password_confirmation">--}}
                                {{--</div>--}}
                            {{--</div>--}}



                    </div>
                </div>
            </div>
            <div class="col-md-4 dokumen">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dokumen yang diperlukan</div>
                        <div class="panel-body">
                            <ol class="control-label">
                                <li> Surat Ijin Usaha </li>
                                <li> Fotocopy KTP </li>
                            </ol>
                            <div class="col-md-offset-1 form-group">
                                <label for="dok_daftar">File input</label>
                                <input type="file" id="dok_daftar">
                            </div>
                        </div>
                    </div>
                    <div class ="finalize-regis col-md-offset-1">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Saya setuju dengan <a href="#"> syarat dan ketentuan </a> berlaku
                            </label>
                        </div>
                    </div>
                    <div class="col-md-offset-1">
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection