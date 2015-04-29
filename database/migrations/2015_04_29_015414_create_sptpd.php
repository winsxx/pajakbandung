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
		Schema::create('ppl_pajak_sptpd', function(Blueprint $table)
		{
			$table->increments('no_sptpd');
			$table->timestamps();
            $table->integer('no_pajak');
            $table->boolean('terbit_skpd');
            $table->float('nilai_skpd');
            $table->boolean('terbit_skpdkb');
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
		Schema::drop('ppl_pajak_sptpd');
	}

}
