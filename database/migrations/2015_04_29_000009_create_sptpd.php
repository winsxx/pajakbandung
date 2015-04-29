<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSptpd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_sptpd', function(Blueprint $table)
		{
			$table->increments('no_sptpd');
            $table->integer('no_pajak')->unsigned();
            $table->index('no_pajak');
            $table->foreign('no_pajak')
                ->references('id')->on('ppl_pajak_pajak')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('terbit_skpd')->default(false);
            $table->float('nilai_skpd')->default(0);
            $table->boolean('terbit_skpdkb')->default(false);
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
		Schema::drop('ppl_pajak_sptpd');
	}

}
