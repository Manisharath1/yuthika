<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consumables_book_child extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'book_child_id';
    public $timestamps = false;
    protected $fillable = [
        'book_child_id',
        'book_master_id',
        'fac_id',
        'con_id',
        'make',
        'supplier',
        'qty',
        'negotiated_price',
        'project_id'
    ];
}
