<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_details extends Model
{
    use HasFactory;

        // Specify the table name
        protected $table = 'project_details';

        // Disable the auto-incrementing key as pid is manually set
        public $incrementing = false;

        // Specify the primary key
        protected $primaryKey = 'pid';

        // Disable timestamps as the table doesn't have created_at and updated_at fields
        public $timestamps = false;

        public function principalInvestigator()
        {
            return $this->belongsTo(User::class, 'pi_id')->where('role', 3);
        }

        public function coInvestigator()
        {
            return $this->belongsTo(User::class, 'pi2_id')->where('role', 3);
        }
        

        // Define fillable fields for mass assignment
        protected $fillable = [
            'pid',
            'name',
            'pi_id',
            'pi2_id',
            'project_file_no',
            'sanction_no_date',
            'funding_agency',
            'start_date',
            'end_date',
            'extension_if_any',
            'sanctioned_outlay',
            'project_cost',
            'additional_cost',
            'rev_project_cost',
            'equipment_r',
            'manpower_r',
            'consumable_r',
            'travel_r',
            'contigency_r',
            'overhead_r',
            'interest_r',
            'others_r',
            'total_r',
            'equipment_e',
            'manpower_e',
            'consumable_e',
            'travel_e',
            'contingency_e',
            'overhead_e',
            'others_e',
            'total_e',
            'remarks',
            'active',
            'from_tally',
            'from_tally_updated_date',
            'balance',
        ];
}
