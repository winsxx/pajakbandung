@extends('master')
@section('title')
Kelola SSPD
@endsection
@section('breadcrumb')
<li><a href="/admin/home">Beranda</a></li>
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
	                <th style="width: 30%"></th>
	            </tr>
	        </thead>

	        <tbody>
	        	<?php 
	        		$i = 1;
	        	  	foreach($listsspd as $sspd) {
	        	  	$pajak =  $sspd->pajak;
	        	  		foreach($pajak->kolaborator as $kolab) {
	        	  			foreach($kolab->IzinUsaha as $izin) {
		        	  			//echo $sspd->no_sspd;
		        	  			//echo $pajak->jenis_pajak;
		        	  			//echo $izin->nama_usaha;
	        	?>
	 	        <tr>
	 	        	<td><?php echo $i ?></td>
	 	        	<td><?php echo $sspd->no_sspd ?></td>
	 	        	<td><?php echo $pajak->jenis_pajak ?></td>
	 	        	<td><?php echo $izin->nama_usaha ?></td>
	 	        	<td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">hapus</a>
	                </td>
	 	        </tr>	

            	<?php 
            				$i++;
            				}
	        	  		}
	        	   	}
            	 ?>
	        </tbody>
	    </table>
	</div>
</div>
@endsection
