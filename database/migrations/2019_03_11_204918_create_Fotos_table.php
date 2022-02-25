<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Fotos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('foto_src', 300);
			$table->integer('tamanho');
			$table->integer('tipo');
			$table->integer('altura');
			$table->integer('largura');
			$table->string('nome', 300);
			$table->integer('fk_galeria');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Fotos');
	}

}
