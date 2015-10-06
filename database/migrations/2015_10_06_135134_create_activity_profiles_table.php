<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('activity_profiles', function(Blueprint $table)
		{
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->integer('id_activity');
			$table->integer('id_profile');

			$table->foreign('id_activity')->references('id')->on('activity')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_profile')->references('id')->on('profiles')
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
		//
		Schema::drop('activity_profiles');
	}

}
