<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContservicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contservices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->integer('servicetype_id')->unsigned();
			$table->foreign('servicetype_id')->references('id')
				->on('servicetypes')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->integer('region_id')->unsigned();
			$table->foreign('region_id')->references('id')
				->on('regions')
				->onDelete('cascade')
				->onUpdate('cascade');
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
		Schema::drop('contservices');
	}

}
