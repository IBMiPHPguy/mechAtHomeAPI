<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('service_name',15);
			$table->integer('servicetype_id')->unsigned();
			$table->foreign('servicetype_id')->references('id')
				->on('servicetypes')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->string('service_desc');
			$table->decimal('amount', 5, 2);
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
		Schema::drop('services');
	}

}
