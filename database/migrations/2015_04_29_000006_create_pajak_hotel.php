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
		Schema::create('ppl_pajak_pajak_hotel', function(Blueprint $table)
		{
            $table->integer('id');
            $table->primary('id');
            $table->integer('num_kamar_suite');
            $table->integer('rate_high_suite');
            $table->integer('rate_low_suite');
            $table->integer('num_kamar_deluxe');
            $table->integer('rate_high_deluxe');
            $table->integer('rate_low_deluxe');
            $table->integer('num_kamar_standar');
            $table->integer('rate_high_standar');
            $table->integer('rate_low_standar');
            $table->enum('alat_pembayaran',['manual','auto']);
            $table->integer('num_karyawan');
            $table->boolean('fasilitas_restoran');
            $table->boolean('fasilitas_hiburan');
            $table->boolean('fasilitas_laundry');
            $table->boolean('fasilitas_telpon');
            $table->boolean('fasilitas_parkir');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_pajak_hotel');
	}

}
