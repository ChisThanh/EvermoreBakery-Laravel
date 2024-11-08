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

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('discount_percentage', );
            $table->float('max_discount', )->nullable();
            $table->float('min_purchase', )->nullable();
            $table->timestamps();
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->foreignId('coupon_id')->nullable()
                ->constrained('coupons')
                ->onDelete('set null');
        });

        Schema::create('event_discounts', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained();
            $table->foreignId('discount_id')->constrained();
            $table->primary(['event_id', 'discount_id']);
        });

        Schema::create('discount_products', function (Blueprint $table) {
            $table->foreignId('discount_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->primary(['discount_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            $table->dropColumn('coupon_id');
        });
        Schema::dropIfExists('event_discounts');
        Schema::dropIfExists('discount_products');
        Schema::dropIfExists('bill_coupon');
        Schema::dropIfExists('events');
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('discounts');
    }
};