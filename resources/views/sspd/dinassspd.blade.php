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

	        <?php //var_dump($listsspd); 
	        	  echo count($listsspd);
	        ?>
	        <tbody>
<!-- 	        	
 -->	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>1</td>
	                <td>12345</td>
	                <td>Pajak Hotel</td>
	                <td>Hotel lalal</td>
	                <td class="vcenter" style="text-align:right;">
	                	<a href="#">lihat berkas</a> | <a href="#">hapus</a>
	                </td>
            	</tr>
	        </tbody>
	    </table>
	</div>
</div>
@endsection
