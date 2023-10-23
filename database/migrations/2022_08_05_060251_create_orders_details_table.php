<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->integer('qty');
             $table->unsignedBigInteger('product');
             $table->float('subtotal', 8, 2);
             $table->float('discount', 8, 2);
            $table->timestamps();
            
            
               $table->foreign('order_id')
            ->references('id')->on('orders')->onDelete('cascade');
            
               $table->foreign('product')
            ->references('id')->on('products')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_details');
    }
};
