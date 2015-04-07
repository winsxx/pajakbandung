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
            <label class="col-md-4 control-label">No SPTPD</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="no_sptpd" value="{{ old('no_sptpd') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">No Pajak</label>
            <div class="col-md-6">
                <input class="form-control" name="no_pajak" value="{{ old('no_pajak') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Tahun</label>
            <div class="col-md-6">
                <input class="form-control" name="tahun" value="{{ old('tahun') }}">
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