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
        Schema::create('project_details', function (Blueprint $table) {
            $table->integer('pid')->primary(); // Primary key
            $table->string('name', 255); // Project name
            $table->integer('pi_id'); // Principal Investigator ID
            $table->integer('pi2_id')->default(0); // Secondary PI ID, default 0
            $table->string('project_file_no', 50); // Project file number
            $table->string('sanction_no_date', 50); // Sanction number and date
            $table->string('funding_agency', 50); // Funding agency
            $table->string('start_date', 15)->nullable(); // Start date, nullable
            $table->string('end_date', 15)->nullable(); // End date, nullable
            $table->string('extension_if_any', 50)->nullable(); // Extension details
            $table->string('sanctioned_outlay', 50)->nullable(); // Sanctioned outlay
            $table->string('project_cost', 50)->nullable(); // Project cost
            $table->decimal('additional_cost', 15, 0)->nullable(); // Additional cost
            $table->decimal('rev_project_cost', 15, 0)->nullable(); // Revised project cost
            $table->decimal('equipment_r', 15, 0)->nullable(); // Equipment received
            $table->decimal('manpower_r', 15, 0)->nullable(); // Manpower received
            $table->decimal('consumable_r', 15, 0)->nullable(); // Consumable received
            $table->decimal('travel_r', 15, 0)->nullable(); // Travel received
            $table->decimal('contigency_r', 15, 0)->nullable(); // Contingency received
            $table->decimal('overhead_r', 15, 0)->nullable(); // Overhead received
            $table->decimal('interest_r', 15, 0)->nullable(); // Interest received
            $table->decimal('others_r', 15, 0)->nullable(); // Others received
            $table->decimal('total_r', 15, 0)->nullable(); // Total received
            $table->decimal('equipment_e', 15, 0)->nullable(); // Equipment expense
            $table->decimal('manpower_e', 15, 0)->nullable(); // Manpower expense
            $table->decimal('consumable_e', 15, 0)->nullable(); // Consumable expense
            $table->decimal('travel_e', 15, 0)->nullable(); // Travel expense
            $table->decimal('contingency_e', 15, 0)->nullable(); // Contingency expense
            $table->decimal('overhead_e', 15, 0)->nullable(); // Overhead expense
            $table->decimal('others_e', 15, 0)->nullable(); // Others expense
            $table->decimal('total_e', 15, 0)->nullable(); // Total expense
            $table->string('remarks', 255)->nullable(); // Remarks
            $table->string('active', 1)->nullable(); // Active status
            $table->longText('from_tally')->nullable(); // Data from tally
            $table->dateTime('from_tally_updated_date')->nullable(); // Tally update date
            $table->string('balance', 255)->nullable(); // Balance

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
        Schema::dropIfExists('project_details');
    }
};
