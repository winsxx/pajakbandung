@extends('master')
@section('title')
	Tambah Pajak
@endsection
@section('breadcrumb')
<li><a href="/home"> Beranda </a></li>
<li class="active"> Tambah Pajak </li>
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
    <script type="text/javascript">

    function showHotel(){   
        var hotelForm = document.getElementById('hotel-form');
        var restoranForm = document.getElementById('restoran-form');
        var pbbForm = document.getElementById('pbb-form');

        hotelForm.style.display = 'block';
        restoranForm.style.display = 'none';
        pbbForm.style.display = 'none';
    }

    function showRestoran(){
        var hotelForm = document.getElementById('hotel-form');
        var restoranForm = document.getElementById('restoran-form');
        var pbbForm = document.getElementById('pbb-form');
        
        hotelForm.style.display = 'none';
        restoranForm.style.display = 'block';
        pbbForm.style.display = 'none';
    }

    function showPbb(){
        var hotelForm = document.getElementById('hotel-form');
        var restoranForm = document.getElementById('restoran-form');
        var pbbForm = document.getElementById('pbb-form');
        
        hotelForm.style.display = 'none';
        restoranForm.style.display = 'none';
        pbbForm.style.display = 'block';
    }

    </script>

    <div class="company_ad">
        <h2> Tambah Pajak </h2>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-md-4 control-label">Bidang Usaha</label>
            <div class="col-md-6 label-dok">
                <label class="radio-inline">
                  <input type="radio" name="bidang-usaha" id="radio-hotel" value="hotel" onclick="javascript:showHotel()"> Hotel
                </label>
                <label class="radio-inline">
                  <input type="radio" name="bidang-usaha" id="radio-restoran" value="restoran" onclick="javascript:showRestoran()"> Restoran
                </label>
                <label class="radio-inline">
                  <input type="radio" name="bidang-usaha" id="radio-restoran" value="bumi-bangunan" onclick="javascript:showPbb()"> Bumi Bangunan
                </label>
            </div>            
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">TMT Operasional</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="tmt-operasional" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Nama Usaha</label>
            <div class="col-md-6">
                <input class="form-control" name="nama-usaha" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Alamat Usaha</label>
            <div class="col-md-6">
                <input class="form-control" name="alamat-usaha" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">No Telepon Usaha</label>
            <div class="col-md-6">
                <input class="form-control" name="no-telp-usaha" value="">
            </div>
        </div>

        <div id="hotel-form" style="display:none">
            <div class="form-group">
                <label class="col-md-4 control-label">Jenis Kamar</label><br>
            </div>
            <div class="row col-md-offset-3">
                <div class="form-group">
                    <label class="col-md-2 control-label">Suite</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> kamar </label>
                </div>
                <div class="form-group col-md-offset-2">
                    <label class="col-md-4 control-label">Rate High Season : Rp</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> per hari</label>
                </div>
                <div class="form-group col-md-offset-2">
                    <label class="col-md-4 control-label">Rate Low Season : Rp</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> per hari</label>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Deluxe</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> kamar </label>
                </div>
                <div class="form-group col-md-offset-2">
                    <label class="col-md-4 control-label">Rate High Season : Rp</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> per hari</label>
                </div>
                <div class="form-group col-md-offset-2">
                    <label class="col-md-4 control-label">Rate Low Season : Rp</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> per hari</label>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Standar</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> kamar </label>
                </div>
                <div class="form-group col-md-offset-2">
                    <label class="col-md-4 control-label">Rate High Season : Rp</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> per hari</label>
                </div>
                <div class="form-group col-md-offset-2">
                    <label class="col-md-4 control-label">Rate Low Season : Rp</label>
                    <div class="col-md-2">
                        <input class="form-control" name="num-kamar" value=""> </input>
                    </div>
                    <label class="control-label"> per hari</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Fasilitas Pendukung</label>
            </div>
            <div class="row col-md-offset-3">
                <div class="checkbox">
                  <label class="control-label">
                    <input type="checkbox" value="restoran">
                        Restoran
                    </input>
                 </label>
                </div>
                <div class="checkbox ">
                  <label class="control-label">
                    <input type="checkbox" value="hiburan">
                    Hiburan
                  </label>
                </div>
                <div class="checkbox ">
                  <label class="control-label">
                    <input type="checkbox" value="laundry">
                    Laundry
                  </label>
                </div>
                <div class="checkbox ">
                  <label class="control-label">
                    <input type="checkbox" value="telpon">
                    Telpon
                  </label>
                </div>
                <div class="checkbox ">
                  <label class="control-label">
                    <input type="checkbox" value="parkir">
                    Parkir
                  </label>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-md-4 control-label">Jumlah Karyawan</label>
                <div class="col-md-2">
                    <input class="form-control" name="num-karyawan" value="">
                </div>
                <label class="control-label">orang</label>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Alat/mesin pembayaran</label>
                <div class="col-md-6 label-dok">
                    <label class="radio-inline">
                      <input type="radio" name="alat-bayar" id="radio-manual" value="manual"> Manual/Bill
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="alat-bayar" id="radio-komputer" value="komputer"> Komputer
                    </label>
                </div>   
            </div>
        </div>

        <div id="restoran-form" style="display:none">
            <div class="form-group">
                <label class="col-md-4 control-label">Jam Operasional</label>
                <div class="col-md-2">
                    <input class="form-control" name="jam-buka" value=""> </input>
                </div>
                <label class="col-md-1 control-label"> s/d </label>
                <div class="col-md-2">
                    <input class="form-control" name="jam-tutup" value=""> </input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Jumlah Meja</label>
                <div class="col-md-2">
                    <input class="form-control" name="jam-buka" value=""> </input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Jumlah Kursi</label>
                <div class="col-md-2">
                    <input class="form-control" name="jam-kursi" value=""> </input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Harga Makanan</label>
            </div>
            <div class="form-group col-md-offset-4">
                <label class="col-md-4 control-label">Termahal : Rp</label>
                <div class="col-md-2">
                    <input class="form-control" name="makanan-mahal" value=""> </input>
                </div>
            </div>
            <div class="form-group col-md-offset-4">
                <label class="col-md-4 control-label">Termurah : Rp</label>
                <div class="col-md-2">
                    <input class="form-control" name="makanan-murah" value=""> </input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Harga Minuman</label>
            </div>
            <div class="form-group col-md-offset-4">
                <label class="col-md-4 control-label">Termahal : Rp</label>
                <div class="col-md-2">
                    <input class="form-control" name="minuman-mahal" value=""> </input>
                </div>
            </div>
            <div class="form-group col-md-offset-4">
                <label class="col-md-4 control-label">Termurah : Rp</label>
                <div class="col-md-2">
                    <input class="form-control" name="minuman-murah" value=""> </input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Rata-rata penjualan per hari : Rp</label>
                <div class="col-md-2">
                    <input class="form-control" name="rata-penjualan" value=""> </input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Jumlah Karyawan</label>
                <div class="col-md-2">
                    <input class="form-control" name="num-karyawan" value="">
                </div>
                <label class="control-label">orang</label>
            </div>
        </div>

        <div id="pbb-form" style="display:none">
            <div class="form-group">
                <label class="col-md-4 control-label">Ukuran tanah (m) </label>
                <div class="col-md-2">
                    <label class="col-md-1 control-label"> panjang </label>
                    <input class="form-control" name="tanah-panjang" value=""> </input>
                </div>
                <div class="col-md-2">
                    <label class="col-md-1 control-label"> lebar </label>
                    <input class="form-control" name="tanah-lebar" value=""> </input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Ukuran bangunan (m) </label>
                <div class="col-md-2">
                    <label class="col-md-1 control-label"> panjang </label>
                    <input class="form-control" name="bangunan-panjang" value=""> </input>
                </div>
                <div class="col-md-2">
                    <label class="col-md-1 control-label"> lebar </label>
                    <input class="form-control" name="bangunan-lebar" value=""> </input>
                </div>

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