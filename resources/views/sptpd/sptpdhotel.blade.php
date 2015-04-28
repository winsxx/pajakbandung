@extends('master')
@section('title')
	Mengajukan SPTPD Hotel
@endsection
@section('breadcrumb')
<li><a href="/home"> Beranda </a></li>
<li ><a href="/pajak/{{$pajak->id}}">Pajak {{$pajak->jenis_pajak}}</a></li>
<li class="active"> SPTPD Hotel </li>
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
    <form class="form-horizontal" role="form" method="POST" action="/pajak/{{$pajak->id}}/sptpdHotel">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-md-4 control-label">Pajak yang dilaporkan</label>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Periode</label>
            <div class="col-md-6">
                <select name="bulan">
                    @for($i=1; $i<=12; $i++)
                        @if($month == $i)
                            <option value="{{$i}}" selected="selected">{{date('F', mktime(0, 0, 0, $i, 10))}}</option>
                        @else
                            <option value="{{$i}}">{{date('F', mktime(0, 0, 0, $i, 10))}}</option>
                        @endif
                    @endfor
                </select>
                <select name="tahun">
                    @for($i=2000; $i<2200; $i++)
                        @if($year == $i)
                            <option value="{{$i}}" selected="selected">{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Penjualan kamar</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="penjualan_kamar" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Penjualan makanan</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="penjualan_makanan" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Laundry</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="laundry" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Sewa Ruangan</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="sewa_ruangan" value="">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-4 control-label">Service</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="service" value="">
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