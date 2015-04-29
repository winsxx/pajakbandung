@extends('master')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
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

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <div class="form-group">
                <label class="col-md-4 control-label">Nomor KTP</label>

                <div class="col-md-6">
                    <input class="form-control" name="nik" value="{{ old('nik') }}">
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label">Sandi</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Login</button>

                </div>
            </div>
        </form>
    </div>
@endsection
