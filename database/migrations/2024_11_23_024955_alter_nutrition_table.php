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
        Schema::table('nutrition_product', function (Blueprint $table) {
            $table->tinyInteger('quantity')->nullable()->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nutrition_product', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};




