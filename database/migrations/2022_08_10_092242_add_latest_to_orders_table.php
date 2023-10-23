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
        Schema::table('orders', function (Blueprint $table) {
            
                $table->string('first_name_b');
                $table->string('last_name_b');
                $table->string('street_address_line_1_b');
                $table->string('street_address_line_2_b');
                $table->string('town_b');
                $table->string('country_b');
                $table->string('company_name_b');
                $table->string('email_b');
                $table->string('zip_b');
                $table->string('phone_b');
                
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            
                $table->dropColumn('first_name_b');
                $table->dropColumn('last_name_b');
                $table->dropColumn('street_address_line_1_b');
                $table->dropColumn('street_address_line_2_b');
                $table->dropColumn('town_b');
                $table->dropColumn('country_b');
                $table->dropColumn('company_name_b');
                $table->dropColumn('email_b');
                $table->dropColumn('zip_b');
                $table->dropColumn('phone_b');
            
            
        });
    }
};
