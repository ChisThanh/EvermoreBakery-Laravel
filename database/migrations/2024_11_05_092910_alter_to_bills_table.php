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
        Schema::table('bills', function (Blueprint $table) {
            $table->text('note')->nullable();
        });
        Schema::create('bill_address', function (Blueprint $table) {
            $table->foreignId('bill_id')->constrained();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('ward')->nullable();
            $table->string('street')->nullable();
            $table->primary('bill_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('note');
        });
        Schema::dropIfExists('bill_address');
    }
};
