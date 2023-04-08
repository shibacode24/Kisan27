<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sp_tracking extends Model
{
    use HasFactory;
    protected $table="sp_tracking";
    protected $fillable=[
    
     'sp_id',
     'datetime',
     'latitude',
    'longitude'
    ];
}
