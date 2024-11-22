<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    use HasFactory;
    // Specify the table name
    protected $table = 'faculty';

    // Disable the auto-incrementing key as faculty_id is manually set
    public $incrementing = false;

    // Specify the primary key
    protected $primaryKey = 'faculty_id';

    // Disable timestamps as the table doesn't have created_at and updated_at fields
    public $timestamps = false;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'faculty_id',
        'fac_name',
        'email',
        'fac_name2',
        'photo',
        'service_book',
        'username',
        'password',
        'designation',
        'empid',
        'EPF_PPRN_No',
        'cl_alloted',
        'cl_count',
        'casual_leave',
        'sl_alloted',
        'sl_count',
        'sl_comment',
        'el_alloted',
        'el_count',
        'el_comment',
        'rh_alloted',
        'rh_count',
        'rh_comment',
        'ccl_alloted',
        'ccl_count',
        'ccl_comment',
        'ml_alloted',
        'ml_count',
        'ml_comment',
        'pl_alloted',
        'pl_count',
        'pl_comment',
        'earned_leave_available',
        'ltc_availed',
        'pay_level',
        'basic_pay',
        'position_held',
        'filename',
        'type',
        'post_type',
        'reporting_authority',
        'archive_flag',
        'cab_flag',
        'cab_edit_flag',
        'can_evaluate',
        'consumable_manager_flag',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' is the foreign key
    }
}
