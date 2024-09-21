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
        Schema::create('product_interactions', function (Blueprint $table) {
            $table->id();
            $table->string("ip_address", 20);
            $table->foreignId('product_id')->constrained();
            $table->string('type', 10)->default('view');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_interactions');
    }
};
