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
            $table->integer('id');
            $table->primary('id');
            $table->foreign('id')
                ->references('id')->on('ppl_pajak_pajak')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('panjang_tanah')->unsigned();
            $table->integer('lebar_tanah')->unsigned();
            $table->integer('panjang_bangunan')->unsigned();
            $table->integer('lebar_bangunan')->unsigned();
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
