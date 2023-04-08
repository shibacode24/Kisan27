<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Journeyplan extends Model
{
	use SoftDeletes;
    use HasFactory;
    protected $table = "journeyplan";
    protected $fillable = [
        'user_id',
		'role',
        'project_type',
        'journey_plan_type',
        'visit_type',
        'traveling_date',
        'from_time',
        'to_time', 
        'State_id',
        'District_id',
        'Tehsil_id',
        'form_location',
        'to_location',
        'mode_of_travel',
        'meter_reading',
        'task',
        'photo',
    ];
}
