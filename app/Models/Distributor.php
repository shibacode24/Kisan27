<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $table="distributor";
    protected $filllable=[
        'Name',
        'father_name',
        'firm_name',
        'Mobile_Number',
        'aadhar_card',
        'pan_card',
        'Address',
        'zip_code',
        'front_pic',
        'Username',
        'Password',
    ];

    
}
