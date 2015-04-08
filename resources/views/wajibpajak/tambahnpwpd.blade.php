@extends('master')
@section('title')
	Tambah NPWPD
@endsection
<li><a href="/homewp"> Beranda </a></li>
<li class="active"> Tambah NPWPD </li>
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
            <label class="col-md-4 control-label">No NPWPD</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="no_npwpd" value="{{ old('no_npwpd') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">No KTP Pemilik</label>
            <div class="col-md-6">
                <input class="form-control" name="no_ktp_pemilik" value="{{ old('no_ktp_pemilik') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">No Izin Usaha</label>
            <div class="col-md-6">
                <input class="form-control" name="no_izin_usaha" value="{{ old('no_izin_usaha') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Status</label>
            <div class="col-md-6">
                <input class="form-control" name="status" value="{{ old('status') }}">
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