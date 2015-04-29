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
		Schema::create('ppl_pajak_wajib_pajak', function(Blueprint $table)
		{
			$table->increments('npwpd');
            $table->string('no_ktp_pemilik',16);
            $table->foreign('no_ktp_pemilik')
                ->references('nik')->on('ppl_dukcapil_ktp')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_izin_usaha',30);
            $table->foreign('no_izin_usaha')
                ->references('no_izin')->on('ppl_pajak_izin_usaha')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status',['aktif','proses_nonaktif','nonaktif']);
            $table->string('lokasi_file',100)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_wajib_pajak');
	}

}
