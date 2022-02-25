<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVereadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Vereadores', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 150);
			$table->string('partido', 50);
			$table->string('telefone', 14);
			$table->string('email', 100);
			$table->string('naturalidade', 150);
			$table->string('data_nasc', 10);
			$table->string('profissao', 150);
			$table->integer('mesa_diretora');
			$table->integer('fk_indicacoes');
			$table->integer('fk_foto');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Vereadores');
	}

}
