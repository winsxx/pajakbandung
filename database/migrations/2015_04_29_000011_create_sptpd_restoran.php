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
		Schema::create('ppl_pajak_sptpd_restoran', function(Blueprint $table)
		{
            $table->integer('id');
            $table->primary('id');
            $table->integer('penjualan');
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
		Schema::drop('ppl_pajak_sptpd_restoran');
	}

}
