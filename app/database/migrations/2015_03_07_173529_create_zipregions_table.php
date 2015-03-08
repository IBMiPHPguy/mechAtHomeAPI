<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipregionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zipregions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('region_id')->unsigned();
			$table->foreign('region_id')->references('id')
				->on('regions')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->integer('zip')->unsigned();
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
		Schema::drop('zipregions');
	}

}
