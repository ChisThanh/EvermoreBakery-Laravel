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

        Schema::table('bills', function (Blueprint $table) {
            $table->foreignId('coupon_id')->nullable()
                ->constrained('coupons')
                ->onDelete('set null');
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
        });

        Schema::create('event_products', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->primary(['event_id', 'product_id']);
            $table->float('percentage' )->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            $table->dropColumn('coupon_id');
        });
        Schema::dropIfExists('event_products');
        Schema::dropIfExists('events');
        Schema::dropIfExists('coupons');
    }
};