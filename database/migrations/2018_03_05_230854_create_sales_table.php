<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->default(sysdate);
            $table->double('priceSale');
            $table->boolean('paid');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('employee_id');
            $table->foreign('client_id')->references('id')->on('Client')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('Employee')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}
