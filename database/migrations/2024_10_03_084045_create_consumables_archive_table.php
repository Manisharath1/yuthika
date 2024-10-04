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
        Schema::create('consumables_archive', function (Blueprint $table) {
            $table->integer('archive_id')->primary();  // Primary key
            $table->string('archive_name', 255)->nullable();  // Nullable varchar
            $table->date('archive_date')->nullable();  // Nullable date field

            // Set engine and charset
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
        Schema::dropIfExists('consumables_archive');
    }
};
