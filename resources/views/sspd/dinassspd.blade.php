@extends('master')
@section('title')
Kelola SSPD
@endsection
@section('breadcrumb')
<li><a href="{{url('/admin/home')}}">Beranda</a></li>
<li class="active">Kelola SSPD</li>
@endsection
@section('content')
<div class="row details"><!-- start details -->
	<div class="col-md-12">
		<table class="table table-hover table-condensed mytable">
	        <thead>
	            <tr>
	                <th style="width: 5%;">No</th>
	                <th style="width: 15%">No SSPD</th>
	                <th style="width: 15%">Jenis Pajak</th>
	                <th style="width: 15%">Nama Usaha</th>
	                <th style="width: 15%">Masa Pajak</th
	                <th style="width: 30%"></th>
	            </tr>
	        </thead>

	        <tbody>
	        <?php $i = 1;?>
	        @foreach($listsspd as $sspd)
	        	<tr>
	 	        	<td><?php echo $i ?></td>
	 	        	<td>{{$sspd->no_sspd}}</td>
	 	        	<td>{{$sspd->pajak->jenis_pajak}}</td>
	 	        	<td>{{$sspd->pajak->wajibPajak->izinUsaha->nama_usaha}}</td>
	 	        	<td>{{$sspd->bulan}} - {{$sspd->tahun}}</td>
	 	        	<td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="{{url('/pajak/'.$sspd->no_sspd.'/hapussspd')}}">hapus</a>
	                </td>
	 	        </tr>
	 	        <?php $i++;?>	
	 	    @endforeach
	        </tbody>
	    </table>
	</div>
</div>
@endsection
