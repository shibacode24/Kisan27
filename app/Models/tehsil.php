<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\tehsilcontroller;

class tehsil extends Model
{
    use HasFactory;

    protected $table="tehsil";
    protected $filllable=['State_id','District_id','Tehsil'];
}
