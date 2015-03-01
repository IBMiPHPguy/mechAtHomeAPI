<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->string('short_name',15)->nullable();
			$table->integer('year')->unsigned();
			$table->string('make');
			$table->string('model');
			$table->string('style');
			$table->integer('style_id')->unsigned();
			$table->string('vin',17)->nullable();
			$table->string('vehicle_note')->nullable();
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
		Schema::drop('vehicles');
	}

}
