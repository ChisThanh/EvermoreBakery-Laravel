<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('total')->default(0);
            $table->timestamps();
        });

        Schema::create('cart_details', function (Blueprint $table) {
            $table->foreignId('cart_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity')->default(1);
            $table->float('price')->default(0);
            $table->primary(['cart_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_details');
    }
};