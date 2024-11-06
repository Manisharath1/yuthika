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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('student_id')->primary(); // Primary key
            $table->string('name', 100)->nullable(); // Student name
            $table->string('username', 30)->nullable(); // Username
            $table->string('email', 50)->nullable(); // Email
            $table->string('password', 250)->nullable(); // Password
            $table->string('filename', 50)->nullable(); // Filename
            $table->string('photo', 255)->nullable(); // Photo path
            $table->string('correspondence', 255)->nullable(); // Correspondence address
            $table->string('document', 255)->nullable(); // Document path
            $table->string('designation', 50)->nullable(); // Designation
            $table->string('phone', 50)->nullable(); // Phone number
            $table->string('sex', 10)->nullable(); // Gender
            $table->date('dob')->nullable(); // Date of birth
            $table->string('caste', 100)->nullable(); // Caste
            $table->string('perm_address', 450)->nullable(); // Permanent address
            $table->string('res_address', 450)->nullable(); // Residential address
            $table->date('hostel_joined_on')->nullable(); // Hostel joined date
            $table->date('hostel_vaccated_on')->nullable(); // Hostel vacated date
            $table->string('caution_money', 100)->nullable(); // Caution money
            $table->string('funding_agency', 500)->nullable(); // Funding agency
            $table->string('ILS_ID_no', 20)->nullable(); // ILS ID number
            $table->string('emergency_contact_no', 15)->nullable(); // Emergency contact number
            $table->string('student_file_no', 100)->nullable(); // Student file number
            $table->date('joining_date')->nullable(); // Joining date
            $table->date('tenure_upto')->nullable(); // Tenure up to
            $table->string('SRF_wef', 100)->nullable(); // SRF with effect from
            $table->float('leave_alloted', 8, 2)->default(30); // Leave allotted
            $table->float('cl_count', 8, 2)->default(0); // Casual leave count
            $table->longText('leave_utilised')->nullable(); // Leave utilised
            $table->string('document_link', 100)->nullable(); // Document link
            $table->string('no_of_publication', 5)->nullable(); // Number of publications
            $table->string('no_of_conf_attended', 5)->nullable(); // Number of conferences attended
            $table->string('per_email', 70)->nullable(); // Personal email
            $table->string('fellowship', 100)->nullable(); // Fellowship details
            $table->integer('pi_id'); // Principal investigator ID
            $table->integer('co_pi_id'); // Co-principal investigator ID
            $table->string('registration_no', 100)->nullable(); // Registration number
            $table->string('registration_date', 100)->nullable(); // Registration date
            $table->string('topic', 255)->nullable(); // Research topic
            $table->string('extension_date', 100)->nullable(); // Extension date
            $table->string('submission_date', 100)->nullable(); // Submission date
            $table->string('award_date', 100)->nullable(); // Award date
            $table->string('thesis_availability', 100)->nullable(); // Thesis availability
            $table->string('completion_date', 100)->nullable(); // Completion date
            $table->string('display_fund', 3)->nullable(); // Display fund flag
            $table->string('type', 3)->nullable(); // Type
            $table->string('redg_no', 30)->nullable(); // Registration number
            $table->string('date_of_registration', 20)->nullable(); // Date of registration
            $table->string('academic_year', 7)->nullable(); // Academic year
            $table->string('co_guide', 100)->nullable(); // Co-guide
            $table->string('external_expert', 100)->nullable(); // External expert
            $table->string('internal_expert', 100)->nullable(); // Internal expert
            $table->string('additional_member', 100)->nullable(); // Additional member
            $table->string('f1_student_info', 10)->nullable(); // Student information form
            $table->string('f1a_reg_form', 10)->nullable(); // Registration form
            $table->string('f2_cert_of_reg', 10)->nullable(); // Certificate of registration
            $table->string('f3_course_work', 10)->nullable(); // Course work
            $table->string('f4_grade_statement', 10)->nullable(); // Grade statement
            $table->string('f5_std_adv_committee', 10)->nullable(); // Student advisory committee
            $table->string('f6_academic_transcript', 10)->nullable(); // Academic transcript
            $table->string('f7_research_proposal', 10)->nullable(); // Research proposal
            $table->string('f8_progress_report', 10)->nullable(); // Progress report
            $table->string('f9_phd_synopsis', 10)->nullable(); // PhD synopsis
            $table->string('f10_reco_of_SAC', 10)->nullable(); // Recommendation of SAC
            $table->string('f11_examiners_panel', 10)->nullable(); // Examiners panel
            $table->string('f12_thesis_title_page', 10)->nullable(); // Thesis title page
            $table->string('f13_student_declaration', 10)->nullable(); // Student declaration
            $table->string('f14_originality_cert', 10)->nullable(); // Originality certificate
            $table->string('f15_plagiarism_cert', 10)->nullable(); // Plagiarism certificate
            $table->string('f16_thesis_submission', 10)->nullable(); // Thesis submission
            $table->string('f17_inv_letter_ext_examiner', 10)->nullable(); // Invitation letter external examiner
            $table->string('f18_lett_to_EE_conf_rept_format', 10)->nullable(); // Letter to external examiner confirmation report format
            $table->string('f19_eval_remun_form', 10)->nullable(); // Evaluation remuneration form
            $table->string('f20_let_to_head_with_eval_repts', 10)->nullable(); // Letter to head with evaluation reports
            $table->string('f21_vivavoce_joint_rept', 10)->nullable(); // Viva voce joint report
            $table->string('f23_appl_for_degree', 10)->nullable(); // Application for degree
            $table->string('docu_link', 255)->nullable(); // Document link
            $table->string('year', 7)->nullable(); // Year
            $table->integer('attendance')->nullable(); // Attendance
            $table->string('mark401', 10)->nullable(); // Mark for 401
            $table->string('mark402', 10)->nullable(); // Mark for 402
            $table->string('mark403', 10)->nullable(); // Mark for 403
            $table->string('mark404', 10)->nullable(); // Mark for 404
            $table->string('cgpa', 10)->nullable(); // CGPA
            $table->decimal('Fdfr1', 12, 2)->nullable(); // Financial details 1
            $table->decimal('Fexp1', 12, 2)->nullable(); // Financial expenditure 1
            $table->string('Fseuc1', 100)->nullable(); // Financial security 1
            $table->decimal('Cdfr1', 12, 2)->nullable(); // Course details 1
            $table->decimal('Cexp1', 12, 2)->nullable(); // Course expenditure 1
            $table->string('Cseuc1', 100)->nullable(); // Course security 1
            $table->decimal('Odfr1', 12, 2)->nullable(); // Other details 1
            $table->decimal('Oexp1', 12, 2)->nullable(); // Other expenditure 1
            $table->string('Oseuc1', 100)->nullable(); // Other security 1
            // Additional fields continue...

            $table->enum('archive_flag', ['0', '1'])->default('0'); // Archive flag
            $table->enum('final_archive_flag', ['0', '1'])->default('0'); // Final archive flag
            $table->string('category', 255)->default(''); // Category
            $table->enum('lab_manage_flag', ['0', '1'])->default('0'); // Lab management flag
            $table->enum('data_compiler', ['0', '1'])->default('0'); // Data compiler flag
            $table->enum('cab_report_flag', ['0', '1'])->default('0'); // CAB report flag

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
        Schema::dropIfExists('students');
    }
};
