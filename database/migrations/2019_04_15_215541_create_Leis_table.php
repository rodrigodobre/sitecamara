<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Leis', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('palavra_chave', 100);
			$table->date('data_sancao');
			$table->date('data_publicacao');
			$table->integer('numero');
			$table->text('ementa', 65535);
			$table->string('autor', 50);
			$table->integer('tipo');
			$table->integer('status');
			$table->string('lei_source', 150);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Leis');
	}

}
