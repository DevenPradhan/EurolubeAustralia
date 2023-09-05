<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('part_no')->nullable();
            $table->string('weight')->nullable();
            $table->string('manual')->nullable();
            $table->string('dimensions')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });

        // Schema::create('product_features', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('product_id');
        //     $table->string('feature');
        //     $table->string('additional')->nullable();
        //     $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        //     $table->timestamps();
        // });

        // Schema::create('product_images', function ( Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('product_id');
        //     $table->string('image_url');
        //     $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('product_details');
        // Schema::dropIfExists('product_features');
        // Schema::dropIfExists('product_images');

    }
};
