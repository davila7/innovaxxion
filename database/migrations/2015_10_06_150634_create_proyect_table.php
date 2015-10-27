<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('proyect', function(Blueprint $table)
		{
			$table->engine = 'MyISAM';
			$table->string('id_evaluation');
			$table->increments('id');
			$table->string('name');
			$table->datetime('strat_date');
			$table->datetime('end_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('proyect');
	}

}
