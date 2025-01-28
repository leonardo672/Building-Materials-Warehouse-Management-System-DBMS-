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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // For the category name
            $table->timestamps();
        });

        // Default categories as a variable
        $defaultCategories = [
            'Structural Materials',
            'Finishing Materials',
            'Plumbing and Sanitary Materials',
            'Electrical Materials',
            'Roofing and Insulation Materials',
            'Flooring Materials',
            'Adhesives and Sealants',
            'Fasteners and Hardware',
            'Miscellaneous Materials',
            'Eco-friendly and Sustainable Materials',
        ];

        // Insert default categories into the table
        foreach ($defaultCategories as $category) {
            DB::table('categories')->insert(['name' => $category]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
