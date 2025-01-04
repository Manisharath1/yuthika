<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fellowship extends Model
{
    use HasFactory;
    protected $table = 'fellowship';
    protected $primaryKey = 'fellowship_id';
    public $timestamps = false;

    protected $fillable = [
        'fellowship_name',
    ];
}
