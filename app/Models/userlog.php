<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userlog extends Model
{
    use HasFactory;
    
     // Specify the table name
     protected $table = 'userlog';

     // Disable the auto-incrementing key as log_id is manually set
     public $incrementing = false;

     // Specify the primary key
     protected $primaryKey = 'log_id';

     // Disable timestamps as the table doesn't have created_at and updated_at fields
     public $timestamps = false;

     // Define fillable fields for mass assignment
     protected $fillable = [
         'log_id',
         'user_id',
         'user_name',
         'user_ip',
         'log_time',
     ];
}
