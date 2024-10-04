<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    public $incrementing = false;
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'name',
        'fac_id',
        'scholar_id',
        'modules'
    ];
}
