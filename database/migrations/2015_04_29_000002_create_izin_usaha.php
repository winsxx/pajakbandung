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
            $table->string('no_izin', 30);
            $table->primary('no_izin');
            $table->string('nama_usaha', 50);
            $table->string('no_ktp_pemilik', 16);
            $table->foreign('no_ktp_pemilik')
                ->references('no_ktp')->on('ppl_pajak_penduduk')
                ->onDelete('cascade')->onUpdate('cascade');
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
