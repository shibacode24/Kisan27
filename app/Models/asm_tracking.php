<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asm_tracking extends Model
{
    use HasFactory;

    protected $table="asm_tracking";
    protected $fillable=[
    
     'asm_id',
     'datetime',
     'latitude',
    'longitude'
    ];
}
