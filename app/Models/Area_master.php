<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_master extends Model
{
    use HasFactory;
    protected $table="area_master";
    protected $filllable=['area','city_id','State_id'];
}
