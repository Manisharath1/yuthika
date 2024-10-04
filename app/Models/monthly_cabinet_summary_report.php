<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monthly_cabinet_summary_report extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'monthly_cabinet_summary_report';

    // Disable the auto-incrementing key as report_id is manually set
    public $incrementing = false;

    // Specify the primary key
    protected $primaryKey = 'report_id';

    // Disable timestamps as the table doesn't have created_at and updated_at fields
    public $timestamps = false;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'report_id',
        'fac_id',
        'report_month_year',
        'pi_submitted_time',
        'maj_policy',
        'maj_policy_desc',
        'maj_agree_nat',
        'maj_agree_nat_desc',
        'maj_agree_int',
        'maj_agree_int_desc',
        'publications',
        'publications_desc',
        'publications_doi',
        'patents',
        'patents_desc',
        'awards',
        'awards_desc',
        'copyrights',
        'copyrights_desc',
        'tech_developed',
        'tech_developed_desc',
        'tech_transferred',
        'tech_transferred_desc',
        'tech_commer',
        'tech_commer_desc',
        'maj_events',
        'maj_events_desc',
        'sci_talks',
        'sci_talks_desc',
        'sahaj_no_of_users',
        'sahaj_rev_gen',
        'maj_research_highlights',
        'maj_research_highlights_desc',
        'pro_under_skill_dev',
        'pro_under_skill_dev_desc',
        'acti_under_swach_bharat',
        'acti_under_swach_bharat_desc',
        'acti_under_amrit_mahotsava',
        'acti_under_amrit_mahotsava_desc',
        'others',
        'others_desc',
        'emr_projects',
        'emr_projects_desc',
        'no_of_awarded_students',
        'no_of_new_students',
        'part_in_nat_int_conf',
        'report_pdf',
    ];
}
