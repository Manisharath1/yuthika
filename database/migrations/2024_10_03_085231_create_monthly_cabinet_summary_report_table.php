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
        Schema::create('monthly_cabinet_summary_report', function (Blueprint $table) {
            $table->integer('report_id')->primary(); // Primary key
            $table->integer('fac_id'); // Facility ID
            $table->string('report_month_year', 15)->nullable(); // Report month and year
            $table->dateTime('pi_submitted_time')->nullable(); // PI submitted time
            $table->integer('maj_policy')->default(0); // Major policy
            $table->longText('maj_policy_desc')->nullable(); // Major policy description
            $table->integer('maj_agree_nat')->default(0); // Major agreement national
            $table->longText('maj_agree_nat_desc')->nullable(); // Major agreement national description
            $table->integer('maj_agree_int')->default(0); // Major agreement international
            $table->longText('maj_agree_int_desc')->nullable(); // Major agreement international description
            $table->integer('publications')->default(0); // Publications count
            $table->longText('publications_desc')->nullable(); // Publications description
            $table->longText('publications_doi')->nullable(); // Publications DOI
            $table->integer('patents')->default(0); // Patents count
            $table->longText('patents_desc')->nullable(); // Patents description
            $table->integer('awards')->default(0); // Awards count
            $table->longText('awards_desc')->nullable(); // Awards description
            $table->integer('copyrights')->default(0); // Copyrights count
            $table->longText('copyrights_desc')->nullable(); // Copyrights description
            $table->integer('tech_developed')->default(0); // Technology developed count
            $table->longText('tech_developed_desc')->nullable(); // Technology developed description
            $table->integer('tech_transferred')->default(0); // Technology transferred count
            $table->longText('tech_transferred_desc')->nullable(); // Technology transferred description
            $table->integer('tech_commer')->default(0); // Technology commercialized count
            $table->longText('tech_commer_desc')->nullable(); // Technology commercialized description
            $table->integer('maj_events')->default(0); // Major events count
            $table->longText('maj_events_desc')->nullable(); // Major events description
            $table->integer('sci_talks')->default(0); // Scientific talks count
            $table->longText('sci_talks_desc')->nullable(); // Scientific talks description
            $table->longText('sahaj_no_of_users')->nullable(); // SAHAJ number of users
            $table->longText('sahaj_rev_gen')->nullable(); // SAHAJ revenue generated
            $table->integer('maj_research_highlights')->default(0); // Major research highlights count
            $table->longText('maj_research_highlights_desc')->nullable(); // Major research highlights description
            $table->integer('pro_under_skill_dev')->default(0); // Projects under skill development count
            $table->longText('pro_under_skill_dev_desc')->nullable(); // Projects under skill development description
            $table->integer('acti_under_swach_bharat')->default(0); // Activities under Swachh Bharat
            $table->longText('acti_under_swach_bharat_desc')->nullable(); // Activities under Swachh Bharat description
            $table->integer('acti_under_amrit_mahotsava')->default(0); // Activities under Amrit Mahotsava
            $table->longText('acti_under_amrit_mahotsava_desc')->nullable(); // Activities under Amrit Mahotsava description
            $table->integer('others')->default(0); // Others count
            $table->longText('others_desc')->nullable(); // Others description
            $table->integer('emr_projects')->default(0); // EMR projects count
            $table->longText('emr_projects_desc')->nullable(); // EMR projects description
            $table->integer('no_of_awarded_students')->default(0); // Number of awarded students
            $table->integer('no_of_new_students')->default(0); // Number of new students
            $table->longText('part_in_nat_int_conf')->nullable(); // Participation in national/international conferences
            $table->string('report_pdf', 255)->nullable(); // Report PDF path

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
        Schema::dropIfExists('monthly_cabinet_summary_report');
    }
};
