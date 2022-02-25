<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGaleriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Galerias', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('data_g');
			$table->string('nome', 50);
			$table->integer('categoria');
			$table->string('descricao', 150);
			$table->string('fotografo', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Galerias');
	}

}
