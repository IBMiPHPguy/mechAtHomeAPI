<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->string('address_type',10);
			$table->string('short_name',15)->nullable();
			$table->string('addr1',60);
			$table->string('addr2',60)->nullable();
			$table->string('addr3',60)->nullable();
			$table->string('city',30);
			$table->string('state',2);
			$table->integer('zip')->unsigned();
			$table->string('cross_street',60)->nullable();
			$table->boolean('billing_flag');
			$table->decimal('lng', 10, 6);
			$table->decimal('lat', 10, 6);
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
		Schema::drop('user_addresses');
	}

}
