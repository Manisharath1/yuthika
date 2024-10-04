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
        Schema::create('faculty', function (Blueprint $table) {
            $table->integer('faculty_id')->primary(); // Primary key
            $table->string('fac_name', 100)->nullable(); // Faculty name
            $table->string('fac_name2', 100)->nullable(); // Second name
            $table->string('photo', 255)->nullable(); // Photo path
            $table->string('service_book', 255)->nullable(); // Service book path
            $table->string('username', 50)->nullable(); // Username
            $table->string('password', 50)->nullable(); // Password
            $table->string('designation', 100)->nullable(); // Designation
            $table->string('empid', 20)->nullable(); // Employee ID
            $table->string('EPF_PPRN_No', 50)->nullable(); // EPF/PPRN number
            $table->float('cl_alloted', 8, 2)->default(8); // Casual Leave allotted
            $table->float('cl_count', 8, 2)->default(0); // Casual Leave count
            $table->string('casual_leave', 200)->nullable(); // Casual Leave details
            $table->float('sl_alloted', 8, 2)->default(10); // Sick Leave allotted
            $table->float('sl_count', 8, 2)->default(0); // Sick Leave count
            $table->longText('sl_comment')->nullable(); // Sick Leave comments
            $table->float('el_alloted', 8, 2)->default(10); // Earned Leave allotted
            $table->float('el_count', 8, 2)->default(0); // Earned Leave count
            $table->longText('el_comment')->nullable(); // Earned Leave comments
            $table->float('rh_alloted', 8, 2)->default(2); // Restricted Holiday allotted
            $table->float('rh_count', 8, 2)->default(0); // Restricted Holiday count
            $table->longText('rh_comment')->nullable(); // Restricted Holiday comments
            $table->float('ccl_alloted', 8, 2)->default(730); // Child Care Leave allotted
            $table->float('ccl_count', 8, 2)->default(0); // Child Care Leave count
            $table->longText('ccl_comment')->nullable(); // Child Care Leave comments
            $table->float('ml_alloted', 8, 2)->default(180); // Maternity Leave allotted
            $table->float('ml_count', 8, 2)->default(0); // Maternity Leave count
            $table->longText('ml_comment')->nullable(); // Maternity Leave comments
            $table->float('pl_alloted', 8, 2)->default(15); // Paternity Leave allotted
            $table->float('pl_count', 8, 2)->default(0); // Paternity Leave count
            $table->longText('pl_comment')->nullable(); // Paternity Leave comments
            $table->string('earned_leave_available', 500)->nullable(); // Earned leave availability
            $table->text('ltc_availed')->nullable(); // Leave Travel Concession availed
            $table->string('pay_level', 100)->nullable(); // Pay level
            $table->string('basic_pay', 20)->nullable(); // Basic pay
            $table->string('position_held', 255)->nullable(); // Position held
            $table->string('filename', 20)->nullable(); // File name
            $table->string('type', 3)->nullable(); // Type
            $table->string('post_type', 15)->nullable(); // Post type
            $table->integer('reporting_authority')->default(0); // Reporting authority
            $table->enum('archive_flag', ['0', '1'])->default('0'); // Archive flag
            $table->enum('cab_flag', ['0', '1'])->default('0'); // Cab flag
            $table->enum('cab_edit_flag', ['0', '1', '2'])->default('0'); // Cab edit flag
            $table->enum('can_evaluate', ['0', '1'])->default('0'); // Can evaluate flag
            $table->enum('consumable_manager_flag', ['0', '1'])->default('0'); // Consumable manager flag

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
        Schema::dropIfExists('faculty');
    }
};
