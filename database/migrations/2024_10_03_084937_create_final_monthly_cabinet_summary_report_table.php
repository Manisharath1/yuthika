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
        Schema::create('final_monthly_cabinet_summary_report', function (Blueprint $table) {
            $table->integer('report_id')->primary(); // Primary key
            $table->string('report_month_year', 15)->nullable(); // Report month and year
            $table->dateTime('io_submitted_time')->nullable(); // IO submitted time
            $table->enum('io_submitted_flag', ['0', '1'])->default('0'); // IO submitted flag
            $table->dateTime('do_submitted_time')->nullable(); // DO submitted time
            $table->enum('do_submitted_flag', ['0', '1'])->default('0'); // DO submitted flag
            $table->string('io_submitted_pdf', 255)->nullable(); // IO submitted PDF path
            $table->string('do_submitted_pdf', 255)->nullable(); // DO submitted PDF path

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
        Schema::dropIfExists('final_monthly_cabinet_summary_report');
    }
};
