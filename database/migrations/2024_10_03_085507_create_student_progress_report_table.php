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
        Schema::create('student_progress_report', function (Blueprint $table) {
            $table->integer('report_id')->primary(); // Primary key
            $table->integer('student_id'); // Student ID
            $table->integer('pi_id'); // Principal Investigator ID
            $table->string('report_month_year', 15)->nullable(); // Report month and year
            $table->text('research_area')->nullable(); // Research area
            $table->binary('highlights_for_month')->nullable(); // Highlights for the month
            $table->text('contraints')->nullable(); // Constraints
            $table->text('part_in_seminars')->nullable(); // Participation in seminars
            $table->integer('working_days')->nullable(); // Working days
            $table->integer('personal_leave')->nullable(); // Personal leave days
            $table->integer('duty_leave')->nullable(); // Duty leave days
            $table->text('duty_leave_purpose')->nullable(); // Duty leave purpose
            $table->text('progress_by_pi')->nullable(); // Progress by PI
            $table->binary('remarks_by_pi')->nullable(); // Remarks by PI
            $table->enum('fellowship_flag', ['Yes', 'No'])->default('Yes'); // Fellowship flag for PI
            $table->text('progress_by_pi2')->nullable(); // Progress by secondary PI
            $table->binary('remarks_by_pi2')->nullable(); // Remarks by secondary PI
            $table->enum('fellowship_flag2', ['Yes', 'No'])->default('Yes'); // Fellowship flag for secondary PI
            $table->dateTime('student_submitted_time')->nullable(); // Student submission time
            $table->dateTime('pi_submitted_time')->nullable(); // PI submission time
            $table->dateTime('pi_submitted_time2')->nullable(); // Secondary PI submission time

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
        Schema::dropIfExists('student_progress_report');
    }
};
