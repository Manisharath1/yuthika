<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consumables_archive extends Model
{
    use HasFactory;
    protected $table = 'consumables_archive';
    public $incrementing = false;
    protected $primaryKey = 'archive_id';
    public $timestamps = false;
    protected $fillable = [
        'archive_id',
        'archive_name',
        'archive_date'
    ];

}
