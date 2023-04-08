<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\citycontroller;

class city extends Model
{
    use HasFactory;

    protected $table="city";
    protected $filllable=['State_id','District_id','Tehsil_id','City'];
}
