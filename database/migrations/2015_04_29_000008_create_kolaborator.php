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
            $table->integer('no_pajak');
            $table->string('no_ktp_kolab',16);
            $table->primary(['no_pajak','no_ktp_kolab']);
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
