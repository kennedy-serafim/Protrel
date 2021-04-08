<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateContestsTable.
 */
class CreateContestsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contests', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('company_id');
			$table->unsignedBigInteger('manager_id')->nullable();

			$table->string('title');
			$table->string('contractor');
			$table->date('opening');
			$table->boolean('warranty')->default(false);
			$table->string('type')->default('Público');
			$table->date('published_in')->default(now());
			$table->string('status')->default('Em Progresso');

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
			$table->foreign('manager_id')->references('id')->on('employees')->onDelete('CASCADE');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contests', function(Blueprint $table){
			$table->dropForeign('contests_company_id_foreign');
			$table->dropForeign('contests_manager_id_foreign');
		});
		Schema::dropIfExists('contests');
	}
}
