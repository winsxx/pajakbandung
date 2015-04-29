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
            $table->string('no_izin_usaha',30);
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
