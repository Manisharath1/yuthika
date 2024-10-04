<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_new extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'project_new';

    // Disable the auto-incrementing key as project_id is manually set
    public $incrementing = false;

    // Specify the primary key
    protected $primaryKey = 'project_id';

    // Disable timestamps as the table doesn't have created_at and updated_at fields
    public $timestamps = false;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'project_id',
        'name_of_project',
        'file_no',
        'funding_agency',
        'sanction_date',
        'close_date',
        'cost_of_project',
        'status',
        'active_flag',
    ];
}
