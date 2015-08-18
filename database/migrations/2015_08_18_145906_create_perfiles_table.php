<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('categorias', function(Blueprint $table)
		{
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('nombre');
		});

		Schema::create('perfiles', function(Blueprint $table)
		{
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('nombre');
			$table->string('codigo');
			$table->integer('consto_mensual');
			$table->double('costo_hr_uf');
			$table->integer('categoria_id');

			$table->foreign('categoria_id')->references('id')->on('categorias')
                ->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('perfiles');
		Schema::drop('categorias');
	}

}
