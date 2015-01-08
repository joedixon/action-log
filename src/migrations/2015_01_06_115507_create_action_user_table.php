<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActionUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('action_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index();
			$table->integer('action_id')->index()->unsigned();
			$table->integer('actionable_id')->unsigned()->nullable()->index();
			$table->string('actionable_type')->nullable();
			$table->text('content')->nullable();
			$table->string('ip', '50')->nullable();
			$table->string('ua')->nullable();
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
		Schema::drop('action_user');
	}

}
