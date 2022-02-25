<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlteraçõesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Alterações', function(Blueprint $table)
		{
			$table->integer('fk_usuario');
			$table->integer('tabela');
			$table->timestamps();
			$table->integer('operacao');
			$table->integer('idtabelaalterada');
			$table->integer('id', true);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Alterações');
	}

}
