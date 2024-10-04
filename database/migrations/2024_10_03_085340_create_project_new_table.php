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
        Schema::create('project_new', function (Blueprint $table) {
            $table->integer('project_id')->primary(); // Primary key
            $table->text('name_of_project')->nullable(); // Name of project
            $table->string('file_no', 255)->nullable(); // File number
            $table->string('funding_agency', 255)->nullable(); // Funding agency
            $table->string('sanction_date', 15)->nullable(); // Sanction date
            $table->string('close_date', 15)->nullable(); // Close date
            $table->string('cost_of_project', 255)->nullable(); // Cost of the project
            $table->string('status', 255)->nullable(); // Status of the project
            $table->enum('active_flag', ['0', '1'])->default('1'); // Active flag with default '1'

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
        Schema::dropIfExists('project_new');
    }
};
