<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave_changes extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'leave_changes';

    // Disable the auto-incrementing key as change_id is manually set
    public $incrementing = false;

    // Specify the primary key
    protected $primaryKey = 'change_id';

    // Disable timestamps as the table doesn't have created_at and updated_at fields
    public $timestamps = false;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'change_id',
        'section',
        'time_st',
    ];
}
