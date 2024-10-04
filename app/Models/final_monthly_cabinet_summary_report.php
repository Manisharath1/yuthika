<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class final_monthly_cabinet_summary_report extends Model
{
    use HasFactory;
    
     // Specify the table name
     protected $table = 'final_monthly_cabinet_summary_report';

     // Disable the auto-incrementing key as report_id is manually set
     public $incrementing = false;

     // Specify the primary key
     protected $primaryKey = 'report_id';

     // Disable timestamps as the table doesn't have created_at and updated_at fields
     public $timestamps = false;

     // Define fillable fields for mass assignment
     protected $fillable = [
         'report_id',
         'report_month_year',
         'io_submitted_time',
         'io_submitted_flag',
         'do_submitted_time',
         'do_submitted_flag',
         'io_submitted_pdf',
         'do_submitted_pdf'
     ];
}
