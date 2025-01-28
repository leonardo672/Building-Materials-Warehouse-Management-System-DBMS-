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
        // Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name', 100); // Name with length 100
            $table->string('email', 100)->unique(); // Unique email
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->string('password'); // Password
            $table->enum('role', ['admin', 'manager', 'staff'])->default('staff'); // Role with enum values
            $table->rememberToken(); // Token for "Remember Me" functionality
            $table->timestamps(); // Created_at and updated_at timestamps
        });

        // Password Reset Tokens Table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Primary email
            $table->string('token'); // Reset token
            $table->timestamp('created_at')->nullable(); // Timestamp for token creation
        });

        // Sessions Table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary session ID
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->index(); // User foreign key
            $table->string('ip_address', 45)->nullable(); // IP address
            $table->text('user_agent')->nullable(); // User agent details
            $table->longText('payload'); // Session data
            $table->integer('last_activity')->index(); // Timestamp of last activity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
