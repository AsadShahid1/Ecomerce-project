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
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->decimal('standard');
            $table->decimal('premium')->nullable();
            $table->decimal('gold')->nullable();
            $table->string('product_image')->nullable();
            $table->string('weight')->nullable();
            $table->string('size')->nullable();
            $table->string('measuring_unit')->nullable();
            $table->text('color')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->boolean('in_stock')->default(1);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
};
