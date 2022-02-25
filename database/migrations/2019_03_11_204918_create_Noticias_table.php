<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoticiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Noticias', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo', 300);
			$table->text('texto', 65535);
			$table->string('credito', 150);
			$table->string('fotografo', 150);
			$table->date('data_n');
			$table->boolean('publicado');
			$table->integer('tipo');
			$table->integer('fk_foto');
			$table->integer('fk_banner');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Noticias');
	}

}
