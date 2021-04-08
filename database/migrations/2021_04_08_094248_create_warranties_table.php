<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateWarrantiesTable.
 */
class CreateWarrantiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('warranties', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('contest_id');
			$table->unsignedBigInteger('insurance_id');

			$table->string('type')->default('Provisória');
			$table->string('method')->default('Monetário');
			$table->unsignedDecimal('amount');

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('contest_id')->references('id')->on('contests')->onDelete('CASCADE');
			$table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('warranties', function (Blueprint $table) {
			$table->dropForeign('warranties_contest_id_foreign');
			$table->dropForeign('warranties_insurance_id_foreign');
		});
		Schema::dropIfExists('warranties');
	}
}
