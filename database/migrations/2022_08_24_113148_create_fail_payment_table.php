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
        Schema::create('fail_payment', function (Blueprint $table) {
            $table->id();
            $table->float('amount', 8, 2);
            $table->string('billing_address1');
            $table->string('billing_address2');
            $table->string('billing_address3');
            $table->string('billing_address4');
            $table->string('country_name');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('reason');
            $table->string('zipcode');
            
            
            
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
        Schema::dropIfExists('fail_payment');
    }
};
