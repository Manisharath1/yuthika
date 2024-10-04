<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_progress_report extends Model
{
    use HasFactory;
    
    // Specify the table name
    protected $table = 'student_progress_report';

    // Disable the auto-incrementing key as report_id is manually set
    public $incrementing = false;

    // Specify the primary key
    protected $primaryKey = 'report_id';

    // Disable timestamps as the table doesn't have created_at and updated_at fields
    public $timestamps = false;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'report_id',
        'student_id',
        'pi_id',
        'report_month_year',
        'research_area',
        'highlights_for_month',
        'contraints',
        'part_in_seminars',
        'working_days',
        'personal_leave',
        'duty_leave',
        'duty_leave_purpose',
        'progress_by_pi',
        'remarks_by_pi',
        'fellowship_flag',
        'progress_by_pi2',
        'remarks_by_pi2',
        'fellowship_flag2',
        'student_submitted_time',
        'pi_submitted_time',
        'pi_submitted_time2',
    ];
}
