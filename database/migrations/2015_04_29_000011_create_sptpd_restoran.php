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
            $table->foreign('id')
                ->references('no_sptpd')->on('ppl_pajak_sptpd')
                ->onDelete('cascade')->onUpdate('cascade');
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
