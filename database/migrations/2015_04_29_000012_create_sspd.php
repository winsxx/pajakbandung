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
		Schema::create('ppl_pajak_sspd', function(Blueprint $table)
		{
			$table->increments('no_sspd');
            $table->integer('no_pajak');
            $table->index('no_pajak');
            $table->integer('besar_setoran');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_sspd');
	}

}
