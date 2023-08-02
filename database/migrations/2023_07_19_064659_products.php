<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('brandname');
            $table->string('price');
            $table->string('defaultimg');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('details');
            $table->string('trending');
            $table->string('topitem');
            $table->string('hotproduct');
            $table->string('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
