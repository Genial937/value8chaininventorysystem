<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('product_name');
            $table->float('price')->default(0);
            $table->bigInteger('stock_quantity');
            $table->bigInteger('store_quantity');
            $table->bigInteger('stock_alert_quantity');
            $table->bigInteger('store_alert_quantity');
            $table->enum('alert_status', array(0,1,2,3))->default(0);
            $table->enum('stock_status', array(0,1,2,3))->default(0);
            $table->enum('store_status', array(0,1,2,3))->default(0);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('products');
    }
}
