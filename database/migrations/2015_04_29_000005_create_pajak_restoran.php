<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePajakRestoran extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_pajak_restoran', function(Blueprint $table)
		{
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->foreign('id')
                ->references('id')->on('ppl_pajak_pajak')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('jumlah_meja');
            $table->integer('jumlah_kursi');
            $table->integer('harga_makanan_termahal');
            $table->integer('harga_makanan_termurah');
            $table->integer('harga_minuman_termahal');
            $table->integer('harga_minuman_termurah');
            $table->integer('penjualan_per_hari');
            $table->integer('jumlah_pegawai');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_pajak_restoran');
	}

}
