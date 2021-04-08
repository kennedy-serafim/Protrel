<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateFinancialProposalsTable.
 */
class CreateFinancialProposalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('financial_proposals', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('contest_id')->unique();

			$table->decimal('with_iva');
			$table->decimal('without_iva');
			$table->decimal('iva_amount');

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('contest_id')->references('id')->on('contests')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('financial_proposals', function (Blueprint $table) {
			$table->dropForeign('financial_proposals_contest_id_foreign');
		});
		Schema::dropIfExists('financial_proposals');
	}
}
