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
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable(false);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id')->nullable(false); // Foreign key for categories
            $table->unsignedInteger('stock_quantity')->default(0)->nullable(false);
            $table->unsignedInteger('stock_threshold')->default(10)->nullable(false);
            $table->decimal('price_per_unit', 10, 2)->nullable(false);
            $table->unsignedBigInteger('location_id')->nullable(false);
            $table->timestamps();

            // Foreign key for location
            $table->foreign('location_id')->references('id')->on('locations');

            // Foreign key for category
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
