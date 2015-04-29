<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSspd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_sspd', function(Blueprint $table)
		{
			$table->increments('no_sspd');
            $table->integer('no_pajak')->unsigned();
            $table->index('no_pajak');
            $table->foreign('no_pajak')
                ->references('id')->on('ppl_pajak_pajak')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('besar_setoran');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_sspd');
	}

}
