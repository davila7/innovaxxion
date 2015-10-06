<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapasEvaluacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('etapas_evaluations', function(Blueprint $table)
		{
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->integer('id_evaluation');
			$table->string('etapa');

			$table->foreign('id_evaluation')->references('id')->on('evaluations')
                ->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('id_etapa')->references('id')->on('etapas')
            //    ->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('etapas_evaluations');
	}

}
