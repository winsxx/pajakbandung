<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenduduk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_pajak_penduduk', function(Blueprint $table)
		{
            $table->string('no_ktp', 16);
            $table->primary('no_ktp');
            $table->string('nama, 50');
            $table->string('alamat', 100)->nullable();
            $table->string('no_tlp', 18)->nullable();
            $table->string('password',60);
            $table->boolean('admin')->default(false);
            $table->string('email', 40)->nullable();
            $table->timestamps();
            $table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_pajak_penduduk');
	}

}
