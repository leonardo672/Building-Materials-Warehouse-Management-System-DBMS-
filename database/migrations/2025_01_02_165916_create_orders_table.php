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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('order_type', ['purchase', 'sales'])->nullable(false);
            $table->unsignedBigInteger('material_id')->nullable(false);
            $table->unsignedInteger('quantity')->nullable(false);
            $table->decimal('total_price', 10, 2)->nullable(false);
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending')->nullable(false);
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('materials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
