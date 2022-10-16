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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_by')->unsigned()->nullable();
            $table->string('checkout_first');
            $table->string('checkout_last');
            $table->string('checkout_company')->nullable();
            $table->string('checkout_street');
            $table->string('checkout_city');
            $table->string('checkout_country');
            $table->string('checkout_post_code');
            $table->string('checkout_phone');
            $table->string('checkout_email');
            $table->text('notes')->nullable();
            $table->string('amount');
            $table->integer('quantity');
            $table->string('order_number');
            $table->string('payment_method');
            $table->enum('status', ['pending', 'approved','dispatched', 'cancelled','delivered'])->default('pending');
            $table->timestamps();
            $table->foreign('order_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
