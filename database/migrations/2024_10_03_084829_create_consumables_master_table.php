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
        Schema::create('consumables_master', function (Blueprint $table) {
            $table->integer('con_id')->primary(); // Primary key
            $table->string('supplier', 255)->nullable(); // Supplier name
            $table->string('cat_no', 255)->nullable(); // Catalog number
            $table->string('product_name', 255)->charset('utf8')->collation('utf8_general_ci')->nullable(); // Product name
            $table->string('make', 255)->nullable(); // Manufacturer or brand
            $table->decimal('unit_discounted_price', 10, 2)->default(0.00); // Unit discounted price
            $table->integer('gst_percentage')->default(0); // GST percentage
            $table->enum('active_flag', ['0', '1', '2'])->default('1'); // Active flag with default value

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
        Schema::dropIfExists('consumables_master');
    }
};
