<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tag_suppliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('product_tag_id');

            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('CASCADE');
            $table->foreign('product_tag_id')->references('id')->on('product_tags')->onDelete('CASCADE');

       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_tag_suppliers', function(Blueprint $table){
            $table->dropForeign('product_tag_suppliers_supplier_id_foreign');
            $table->dropForeign('product_tag_suppliers_product_tag_id_foreign');
        });
        Schema::dropIfExists('product_tag_suppliers');
    }
}
