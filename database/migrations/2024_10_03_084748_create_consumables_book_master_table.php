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
        Schema::create('consumables_book_master', function (Blueprint $table) {
            $table->integer('book_master_id')->primary(); // Primary key
            $table->string('indent_name', 255)->nullable(); // Indent name is nullable
            $table->string('book_month_year', 20)->nullable(); // Month-Year string, nullable
            $table->integer('fac_id'); // Facility ID
            $table->enum('status', ['draft', 'publish'])->default('draft'); // Status enum with default value
            $table->date('draft_date')->nullable(); // Draft date, nullable
            $table->date('published_date')->nullable(); // Published date, nullable
            $table->enum('archive_flag', ['0', '1'])->default('0'); // Archive flag enum with default value
            $table->integer('archive_id')->default(0); // Archive ID with default value of 0

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
        Schema::dropIfExists('consumables_book_master');
    }
};
