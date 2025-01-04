<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funding_agency extends Model
{
    use HasFactory;

    protected $table = 'funding_agency';
    protected $primaryKey = 'fund_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
