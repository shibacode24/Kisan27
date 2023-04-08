<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $table = "visit";
    protected $fillable = [
'journey_id',
'user_id',
'role',
'name',
'visitdetails',
'image'
    ];
}
