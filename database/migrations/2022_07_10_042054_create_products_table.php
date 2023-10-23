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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('subcat_id');
            $table->string('product_name');
            $table->integer('stock');
            $table->string('description');
            $table->float('price', 8, 2);
            $table->float('discount', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('cat_id')
            ->references('id')->on('category')->onDelete('cascade');

            $table->foreign('subcat_id')
            ->references('id')->on('subcategory')->onDelete('cascade');
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
};
