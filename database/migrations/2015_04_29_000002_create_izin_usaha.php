<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIzinUsaha extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_izin_usaha', function(Blueprint $table)
		{
			//$table->increments('id');
			//$table->timestamps();
            $table->string('no_izin', 30);
            $table->string('nama_usaha', 50);
            $table->string('no_ktp_pemilik', 16);
            $table->string('bidang_usaha', 20);
            $table->enum('status',['aktif','kadarluasa']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_izin_usaha');
	}

}
