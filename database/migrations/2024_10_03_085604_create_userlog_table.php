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
        Schema::create('userlog', function (Blueprint $table) {
            $table->integer('log_id')->primary(); // Primary key
            $table->integer('user_id'); // User ID
            $table->string('user_name', 50)->nullable(); // User name
            $table->string('user_ip', 50)->nullable(); // User IP address
            $table->timestamp('log_time')->useCurrent(); // Log time with default to current timestamp

            // Set engine, charset, and collation
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userlog');
    }
};
