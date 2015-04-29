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
		Schema::create('ppl_pajak_skpd_pbb', function(Blueprint $table)
		{
			$table->increments('id');
			//$table->timestamps();
            $table->integer('no_pajak_pbb');
            $table->integer('tahun');
            $table->float('biaya');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_skpd_pbb');
	}

}
