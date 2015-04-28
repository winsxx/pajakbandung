@extends('master')
@section('title')
    Kelola Pembayaran PBB
@endsection
@section('breadcrumb')
    <li><a href="/admin/home">Beranda</a></li>
    <li class="active">Kelola Pembayaran PBB</li>
@endsection
@section('content')
    <div class="row details"><!-- start details -->
        <div class="row grids_btm top">
        <a href="{{url("admin/skpd/pbb")}}">
            <button class="btn btn-default">Terbitkan SKPD baru</button>
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
                        <th style="width: 15">Tanggal SSPD terakhir</th>
                        <th style="width: 50%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @foreach($daftarpbb as $pajak)
                            <tr>
                                <td><?php echo $i?></td>
                                <td>PT alalal</td>
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
                                        <a href="#">Kirim SKPDKB</a>
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
