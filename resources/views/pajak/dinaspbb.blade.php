@extends('master')
@section('title')
    Kelola Pembayaran PBB
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin/home')}}">Beranda</a></li>
    <li class="active">Kelola Pembayaran PBB</li>
@endsection
@section('content')
    <div class="row details"><!-- start details -->
        <div class="row grids_btm top">
        <a href="{{url("admin/skpd/pbb")}}">
            <button class="btn btn-default"
                    onclick="return confirm('Apakah yakin untuk menerbitkan SKPD?')">
                Terbitkan SKPD baru
            </button>
        </a>
        <a href="{{url("admin/skpdkb/pbb")}}">
            <button class="btn btn-default"
                    onclick="return confirm('Apakah yakin untuk menerbitkan SKPDKB?')">
                Terbitkan SKPDKB baru
            </button>
        </a>
        </div>
        <div class="row grids_btm top">
            <h4> Daftar PBB yang terdaftar </h4>
            <br>
            <div class="col-md-12">
                <table class="table table-hover table-condensed mytable">
                    <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 15%">Nama Usaha</th>
                        <th style="width: 15">Status SSPD</th>
                        <th style="width: 15">Tahun  SSPD terakhir</th>
                        <th style="width: 50%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @foreach($daftarpbb as $pajak)
                            <tr>
                                <td><?php echo $i?></td>
                                <td>{{$pajak->wajibPajak->izinUsaha->nama_usaha}}</td>
                                @if($pajak->statusPembayaranSspd())
                                    <td>Sudah bayar</td>
                                @else
                                    <td>Belum bayar</td>
                                @endif

                                <td>
                                    {{$pajak->sspdTerakhir()}}
                                </td>
                                <td class="vcenter" style="text-align:right;">
                                    @if(!$pajak->statusPembayaranSspd())
                                        <a href="{{url('/admin/pajak/'.$pajak->id.'/kirimskpdkbpbb')}}">Kirim SKPDKB</a>
                                    @endif
                                </td>
                            </tr>
                            <?php $i++;?>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
