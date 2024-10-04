<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consumables_book_master extends Model
{
    use HasFactory;
    
     // Specify the table name
     protected $table = 'consumables_book_master';

     // Disable the auto-incrementing key as book_master_id is manually set
     public $incrementing = false;

     // Specify the primary key
     protected $primaryKey = 'book_master_id';

     // Disable timestamps as the table doesn't have created_at and updated_at fields
     public $timestamps = false;

     // Define fillable fields for mass assignment
     protected $fillable = [
         'book_master_id',
         'indent_name',
         'book_month_year',
         'fac_id',
         'status',
         'draft_date',
         'published_date',
         'archive_flag',
         'archive_id'
     ];
}
