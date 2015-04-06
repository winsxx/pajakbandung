@extends('master')
@section('title')
	Sptpd View
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

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/sptpdview') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">Nama Objek Usaha</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="nama_objek_usaha" value="{{ old('nama_objek_usaha') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Alamat Objek Usaha</label>
            <div class="col-md-6">
                <input class="form-control" name="alamat_objek_usaha" value="{{ old('alamat_objek_usaha') }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>

@endsection