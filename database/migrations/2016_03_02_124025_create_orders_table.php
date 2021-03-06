<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number');
            $table->integer('product_id')->unsigned();
             $table->foreign('product_id')->references('id')->on('products');
             $table->string('email');
             $table->string('billing_name');
             $table->string('billing_address');
             $table->string('billing_city');
             $table->string('billing_state');
             $table->string('billing_zip')->nullable();
             $table->string('billing_country');
             $table->string('shipping_name')->nullable();
             $table->string('shipping_address')->nullable();
             $table->string('shipping_city')->nullable();
             $table->string('shipping_state')->nullable();
             $table->string('shipping_zip')->nullable();
             $table->string('shipping_country')->nullable();
             $table->string('onetimeurl')->nullable();
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
        Schema::drop('orders');
    }
}
