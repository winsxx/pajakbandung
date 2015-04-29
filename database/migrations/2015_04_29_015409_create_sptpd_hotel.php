<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWajibPajak extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_sptpd_hotel', function(Blueprint $table)
		{
			//$table->increments('id');
			$table->integer('id');
            //$table->timestamps();
            $table->integer('penjualan_kamar');
            $table->integer('penjualan_konsumsi');
            $table->integer('penjualan_laundry');
            $table->integer('penerimaan_sewa_ruangan');
            $table->integer('penerimaan_service');
            $table->integer('bulan');
            $table->integer('tahun');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_sptpd_hotel');
	}

}
