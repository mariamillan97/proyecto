<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('sale_id');
            $table->foreign('product_id')->references('id')->on('Product')->onDelete('cascade');
            $table->foreign('sale_id')->references('id')->on('Sale')->onDelete('cascade');
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
        Schema::dropIfExists('product_sales');
    }
}
