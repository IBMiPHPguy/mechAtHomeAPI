<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_phones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->string('phone_type',10);
			$table->string('short_name',15)->nullable();
			$table->boolean('text_flag');
			$table->boolean('primary_nbr');
			$table->bigInteger('phone_nbr')->unsigned();
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
		Schema::drop('user_phones');
	}

}
