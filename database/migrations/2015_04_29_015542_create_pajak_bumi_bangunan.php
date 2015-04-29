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
		Schema::create('ppl_pajak_pajak_bumi_bangunan', function(Blueprint $table)
		{
			//$table->increments('id');
			//$table->timestamps();
            $table->integer('id');
            $table->integer('panjang_tanah');
            $table->integer('lebar_tanah');
            $table->integer('panjang_bangunan');
            $table->integer('lebar_bangunan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_pajak_bumi_bangunan');
	}

}
