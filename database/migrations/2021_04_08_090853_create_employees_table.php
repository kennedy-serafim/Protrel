<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateEmployeesTable.
 */
class CreateEmployeesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id')->nullable();
			$table->unsignedBigInteger('company_id');
			$table->unsignedBigInteger('job_role_id');

			$table->string('firstname');
			$table->string('lastname');
			$table->string('phone')->unique();
			$table->string('email')->unique();
			$table->text('address')->nullable();

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
			$table->foreign('job_role_id')->references('id')->on('job_roles')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employees', function (Blueprint $table) {
			$table->dropForeign('employees_user_id_foreign');
			$table->dropForeign('employees_company_id_foreign');
			$table->dropForeign('employees_job_role_id_foreign');
		});
		Schema::dropIfExists('employees');
	}
}
