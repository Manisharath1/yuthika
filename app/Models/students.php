<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class students extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'students';

    // Disable the auto-incrementing key as student_id is manually set
    public $incrementing = false;

    // Specify the primary key
    protected $primaryKey = 'student_id';

    // Disable timestamps as the table doesn't have created_at and updated_at fields
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class); // Student belongs to a user
    }

    public function pi()
    {
        return $this->belongsTo(User::class, 'pi_id');
    }

    public function coPi()
    {
        return $this->belongsTo(User::class, 'co_pi_id');
    }
    public function faculty()
    {
        return $this->belongsTo(User::class, 'pi_id, co_pi_id')->where('role', 3);
    }
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Update pi_id and co_pi_id columns to be unsigned integers and nullable
            $table->unsignedBigInteger('pi_id')->nullable()->change();
            $table->unsignedBigInteger('co_pi_id')->nullable()->change();
        });
    }


    // Define fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'student_id',
        'name',
        'username',
        'password',
        'type',
        'category',
        'designation',
        'email',
        'phone',
        'sex',
        'dob',
        'caste',
        'perm_address',
        'res_address',
        'hostel_joined_on',
        'hostel_vaccated_on',
        'caution_money',
        'funding_agency',
        'ILS_ID_no',
        'emergency_contact_no',
        'student_file_no',
        'joining_date',
        'tenure_upto',
        'SRF_wef',
        'document_link',
        'no_of_publication',
        'no_of_conf_attended',
        'per_email',
        'fellowship',
        'pi_id',
        'co_pi_id',
        // 'project_name',
        'project_id',
        'registration_no',
        'registration_date',
        'topic',
        'extension_date',
        'submission_date',
        'award_date',
        'thesis_availability',
        'completion_date',
        'photo',
        'correspondence',
        'document',
        'filename',
        'leave_alloted',
        'cl_count',
        'leave_utilised',
        'display_fund',
        'redg_no',
        'date_of_registration',
        'academic_year',
        'co_guide',
        'external_expert',
        'internal_expert',
        'additional_member',
        'f1_student_info',
        'f1a_reg_form',
        'f2_cert_of_reg',
        'f3_course_work',
        'f4_grade_statement',
        'f5_std_adv_committee',
        'f6_academic_transcript',
        'f7_research_proposal',
        'f8_progress_report',
        'f9_phd_synopsis',
        'f10_reco_of_SAC',
        'f11_examiners_panel',
        'f12_thesis_title_page',
        'f13_student_declaration',
        'f14_originality_cert',
        'f15_plagiarism_cert',
        'f16_thesis_submission',
        'f17_inv_letter_ext_examiner',
        'f18_lett_to_EE_conf_rept_format',
        'f19_eval_remun_form',
        'f20_let_to_head_with_eval_repts',
        'f21_vivavoce_joint_rept',
        'f23_appl_for_degree',
        'docu_link',
        'year',
        'attendance',
        'mark401',
        'mark402',
        'mark403',
        'mark404',
        'cgpa',
        'Fdfr1',
        'Fexp1',
        'Fseuc1',
        'Cdfr1',
        'Cexp1',
        'Cseuc1',
        'Odfr1',
        'Oexp1',
        'Oseuc1',
        'Fdfr2',
        'Fexp2',
        'Fseuc2',
        'Cdfr2',
        'Cexp2',
        'Cseuc2',
        'Odfr2',
        'Oexp2',
        'Oseuc2',
        'Fdfr3',
        'Fexp3',
        'Fseuc3',
        'Cdfr3',
        'Cexp3',
        'Cseuc3',
        'Odfr3',
        'Oexp3',
        'Oseuc3',
        'Fdfr4',
        'Fexp4',
        'Fseuc4',
        'Cdfr4',
        'Cexp4',
        'Cseuc4',
        'Odfr4',
        'Oexp4',
        'Oseuc4',
        'Fdfr5',
        'Fexp5',
        'Fseuc5',
        'Cdfr5',
        'Cexp5',
        'Cseuc5',
        'Odfr5',
        'Oexp5',
        'Oseuc5',
        'archive_flag',
        'final_archive_flag',
        'lab_manage_flag',
        'data_compiler',
        'cab_report_flag',

    ];


}
