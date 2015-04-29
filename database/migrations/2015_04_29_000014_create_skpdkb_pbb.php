<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkpdkbPbb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_skpdkb_pbb', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('no_pajak_pbb')->unsigned();
            $table->index('no_pajak_pbb');
            $table->foreign('no_pajak_pbb')
                ->references('id')->on('ppl_pajak_pajak_bumi_bangunan')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tahun');
            $table->integer('hutang');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_skpdkb_pbb');
	}

}
