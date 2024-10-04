<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consumables_master extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'consumables_master';

    // Disable the auto-incrementing key as con_id is manually set
    public $incrementing = false;

    // Specify the primary key
    protected $primaryKey = 'con_id';

    // Disable timestamps as the table doesn't have created_at and updated_at fields
    public $timestamps = false;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'con_id',
        'supplier',
        'cat_no',
        'product_name',
        'make',
        'unit_discounted_price',
        'gst_percentage',
        'active_flag'
    ];
}
