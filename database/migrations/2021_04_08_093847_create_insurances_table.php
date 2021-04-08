<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateInsurancesTable.
 */
class CreateInsurancesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insurances', function(Blueprint $table) {
            $table->id();

			$table->string('name')->unique();
			$table->string('phone')->unique();
			$table->string('email')->unique();
			$table->text('address')->nullable();
			$table->string('link')->nullable();

            $table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('insurances');
	}
}
