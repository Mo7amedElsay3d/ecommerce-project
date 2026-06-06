<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('imagepath')->nullable();
            $table->decimal('price',10,2);
            $table->integer('quantity')->default(0);
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
