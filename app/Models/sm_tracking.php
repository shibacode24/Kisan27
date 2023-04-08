<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sm_tracking extends Model
{
    protected $table="sm_tracking";
    protected $fillable=[
    
     'sm_id',
     'datetime',
     'latitude',
    'longitude'
    ];
}
