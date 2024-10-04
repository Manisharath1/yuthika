<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vview extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'vview';

    // Disable the auto-incrementing key as v_id is manually set
    public $incrementing = false;

    // Specify the primary key
    protected $primaryKey = 'v_id';

    // Disable timestamps as the table doesn't have created_at and updated_at fields
    public $timestamps = false;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'v_id',
        'v_username',
        'v_password',
        'v_name',
    ];
}
