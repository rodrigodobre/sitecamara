<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Usuarios', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 150);
			$table->string('senha', 50);
			$table->integer('tipo');
			$table->integer('permissao');
			$table->string('login', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Usuarios');
	}

}
