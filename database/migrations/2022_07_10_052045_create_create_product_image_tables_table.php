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
        Schema::create('create_product_image_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('product_main_img');
            $table->string('product_sub_img1');
            $table->string('product_sub_img2');
            $table->string('product_sub_img3');
            $table->string('product_sub_img4');
            $table->timestamps();

            $table->foreign('product_id')
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
        Schema::dropIfExists('create_product_image_tables');
    }
};
