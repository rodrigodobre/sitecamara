<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIndicacoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Indicacoes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo_ind', 300);
			$table->text('texto_ind', 65535);
			$table->date('sessao');
			$table->integer('fk_vereador');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Indicacoes');
	}

}
