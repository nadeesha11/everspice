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
        Schema::create('customer_names', function (Blueprint $table) {
            $table->id();
            $table->string('cus_firstname');
            $table->string('cus_lastname');
            $table->unsignedBigInteger('cus_id');
            $table->timestamps();

            $table->foreign('cus_id')
            ->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_names');
    }
};
