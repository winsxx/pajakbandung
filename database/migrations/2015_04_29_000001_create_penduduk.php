<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenduduk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_penduduk', function(Blueprint $table)
		{
			//$table->increments('id');
            $table->string('no_ktp', 16);
            $table->string('nama, 50');
            $table->string('alamat', 100);
            $table->string('no_tlp', 18);
            $table->string('password',60);
            $table->boolean('admin');
            $table->string('email', 40);
            $table->timestamps();
            $table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_penduduk');
	}

}
