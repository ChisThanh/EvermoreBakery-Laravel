<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->float('discount_amount')->nullable();
            $table->float('discount_percentage')->nullable();
            $table->tinyInteger('quantity')->default(1);
            $table->date('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('event', function (Blueprint $table) {
            $table->foreignId('coupon_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->date('used_at')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->primary(['coupon_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('coupon_user');
    }
};