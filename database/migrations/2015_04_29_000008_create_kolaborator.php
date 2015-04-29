<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKolaborator extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_kolaborator', function(Blueprint $table)
		{
            $table->integer('no_pajak')->unsigned();
            $table->string('no_ktp_kolab',16);
            $table->primary(['no_pajak','no_ktp_kolab']);
            $table->foreign('no_pajak')
                ->references('id')->on('ppl_pajak_pajak')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('no_ktp_kolab')
                ->references('nik')->on('ppl_dukcapil_ktp')
                ->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_kolaborator');
	}

}
