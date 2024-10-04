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
        Schema::create('consumables_book_child', function (Blueprint $table) {
            $table->integer('book_child_id')->primary(); // Primary key
            $table->integer('book_master_id'); // Foreign key or related key
            $table->integer('fac_id'); // Facility id
            $table->integer('con_id'); // Consumable id
            $table->string('make', 255)->nullable(); // Make is nullable
            $table->string('supplier', 255)->nullable(); // Supplier is nullable
            $table->integer('qty'); // Quantity, not null
            $table->decimal('negotiated_price', 10, 2)->nullable(); // Nullable decimal price
            $table->integer('project_id')->nullable(); // Nullable project id

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
        Schema::dropIfExists('consumables_book_child');
    }
};
