@extends('master')
@section('title')
Kelola NPWPD
@endsection
@section('breadcrumb')
<li><a href="/admin/home">Beranda</a></li>
<li class="active">Kelola NPWPD</li>
@endsection
@section('content')
<div class="row details"><!-- start details -->
	<div class="col-md-12">
		<table class="table table-hover table-condensed mytable">
	        <thead>
	            <tr>
	                <th style="width: 5%;">No</th>
	                <th style="width: 15%">NPWPD</th>
	                <th style="width: 15%">Jenis Pajak</th>
	                <th style="width: 15%">Nama Usaha</th>
	                <th style="widht: 20%">Status</th>
	                <th style="width: 30%"></th>
	            </tr>
	        </thead>
	        
	        <tbody>
	        	<?php 
		        	$i = 1;
		        	foreach($listnpwpd as $npwpd) {
		        		//echo $npwpd;
		        		foreach($npwpd->kolaborator as $kolab) {
		        			$wp = $kolab->wajibpajak;
		        			foreach($wp->izinUsaha as $izin) {

		        ?>

		        <tr>
	                <td><?php echo $i ?></td>
	                <td><?php echo $npwpd->npwpd_pemilik ?></td>
	                <td><?php echo $npwpd->jenis_pajak ?></td>
	                <td><?php echo $izin->nama_usaha ?></td>
	                <td>Aktif</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">tutup</a> | <a href="#">hapus</a>
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