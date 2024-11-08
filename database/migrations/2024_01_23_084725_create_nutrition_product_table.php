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
        Schema::create('nutrition_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutrition_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->timestamps();
            $table->primary(['nutrition_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_product');
    }
};
