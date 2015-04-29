<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePajak extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_pajak', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('npwpd_pemilik',30);
            $table->index('npwpd_pemilik');
            $table->foreign('npwpd_pemilik')
                ->references('npwpd')->on('ppl_pajak_wajib_pajak')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status',['aktif','proses_nonaktif','nonaktif']);
            $table->enum('jenis_pajak',['restoran','hotel','pbb']);
            $table->string('alasan_penutupan',200);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_pajak');
	}

}
