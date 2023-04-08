<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\rolemastercontroller;

class rolemaster extends Model
{
    use HasFactory;

    protected $table="role_master";
    protected $filllable=['Slect_SM','Select_ASM','Role'];
}

