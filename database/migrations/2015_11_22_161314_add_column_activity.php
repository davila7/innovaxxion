<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnActivity extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('activity_project', function($table)
		{	
			$table->dateTime('date_start');
			$table->dateTime('date_end');
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
		Schema::table('activity_project', function($table)
		{
 			$table->dropColumn('date_start');
 			$table->dropColumn('date_end');
		});
	}

}
