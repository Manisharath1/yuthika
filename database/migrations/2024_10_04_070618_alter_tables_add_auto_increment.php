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
        // Auto-increment for 'admin'
        Schema::table('admin', function (Blueprint $table) {
            $table->integer('user_id')->autoIncrement()->change();
        });

        // Auto-increment for 'consumables_archive'
        Schema::table('consumables_archive', function (Blueprint $table) {
            $table->integer('archive_id')->autoIncrement()->change();
        });

        // Auto-increment for 'consumables_book_child'
        Schema::table('consumables_book_child', function (Blueprint $table) {
            $table->integer('book_child_id')->autoIncrement()->change();
        });

        // Auto-increment for 'consumables_book_master'
        Schema::table('consumables_book_master', function (Blueprint $table) {
            $table->integer('book_master_id')->autoIncrement()->change();
        });

        // Auto-increment for 'consumables_master'
        Schema::table('consumables_master', function (Blueprint $table) {
            $table->integer('con_id')->autoIncrement()->change();
        });

        // Auto-increment for 'faculty'
        Schema::table('faculty', function (Blueprint $table) {
            $table->integer('faculty_id')->autoIncrement()->change();
        });

        // Auto-increment for 'final_monthly_cabinet_summary_report'
        Schema::table('final_monthly_cabinet_summary_report', function (Blueprint $table) {
            $table->integer('report_id')->autoIncrement()->change();
        });

        // Auto-increment for 'leave_changes'
        Schema::table('leave_changes', function (Blueprint $table) {
            $table->integer('change_id')->autoIncrement()->change();
        });

        // Auto-increment for 'monthly_cabinet_summary_report'
        Schema::table('monthly_cabinet_summary_report', function (Blueprint $table) {
            $table->integer('report_id')->autoIncrement()->change();
        });

        // Auto-increment for 'project_details'
        Schema::table('project_details', function (Blueprint $table) {
            $table->integer('pid')->autoIncrement()->change();
        });

        // Auto-increment for 'project_new'
        Schema::table('project_new', function (Blueprint $table) {
            $table->integer('project_id')->autoIncrement()->change();
        });

        // Auto-increment for 'students'
        Schema::table('students', function (Blueprint $table) {
            $table->integer('student_id')->autoIncrement()->change();
        });

        // Auto-increment for 'student_progress_report'
        Schema::table('student_progress_report', function (Blueprint $table) {
            $table->integer('report_id')->autoIncrement()->change();
        });

        // Auto-increment for 'userlog'
        Schema::table('userlog', function (Blueprint $table) {
            $table->integer('log_id')->autoIncrement()->change();
        });

        // Auto-increment for 'vview'
        Schema::table('vview', function (Blueprint $table) {
            $table->integer('v_id')->autoIncrement()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback the changes by reverting to the previous state (non-auto-increment fields)

        Schema::table('admin', function (Blueprint $table) {
            $table->integer('user_id')->change();
        });

        Schema::table('consumables_archive', function (Blueprint $table) {
            $table->integer('archive_id')->change();
        });

        Schema::table('consumables_book_child', function (Blueprint $table) {
            $table->integer('book_child_id')->change();
        });

        Schema::table('consumables_book_master', function (Blueprint $table) {
            $table->integer('book_master_id')->change();
        });

        Schema::table('consumables_master', function (Blueprint $table) {
            $table->integer('con_id')->change();
        });

        Schema::table('faculty', function (Blueprint $table) {
            $table->integer('faculty_id')->change();
        });

        Schema::table('final_monthly_cabinet_summary_report', function (Blueprint $table) {
            $table->integer('report_id')->change();
        });

        Schema::table('leave_changes', function (Blueprint $table) {
            $table->integer('change_id')->change();
        });

        Schema::table('monthly_cabinet_summary_report', function (Blueprint $table) {
            $table->integer('report_id')->change();
        });

        Schema::table('project_details', function (Blueprint $table) {
            $table->integer('pid')->change();
        });

        Schema::table('project_new', function (Blueprint $table) {
            $table->integer('project_id')->change();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->integer('student_id')->change();
        });

        Schema::table('student_progress_report', function (Blueprint $table) {
            $table->integer('report_id')->change();
        });

        Schema::table('userlog', function (Blueprint $table) {
            $table->integer('log_id')->change();
        });

        Schema::table('vview', function (Blueprint $table) {
            $table->integer('v_id')->change();
        });
    }
};
