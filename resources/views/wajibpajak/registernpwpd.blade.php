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
                                <strong>Pendaftaran NPWPD gagal!<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('daftar') }}">
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

                                <div class="col-md-8">
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
                            <div class="col-md-offset-6">
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
    </div>
@endsection