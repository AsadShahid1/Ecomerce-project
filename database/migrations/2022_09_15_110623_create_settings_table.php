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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('mobile_number');
            $table->string('instagram');
            $table->string('email')->unique();
            $table->string('twitter');
            $table->string('facebook');
            $table->string('policy');
            $table->string('terms');
            $table->string('pay_mode');
            $table->string('paypal_user');
            $table->string('paypal_password');
            $table->string('paypal_secret');
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
        Schema::dropIfExists('settings');
    }
};
