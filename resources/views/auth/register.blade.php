@extends('master')

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

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">Nama</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Nomor KTP</label>
            <div class="col-md-6">
                <input class="form-control" name="no_ktp" value="{{ old('no_ktp') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Sandi</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Ulangi Sandi</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>

@endsection
