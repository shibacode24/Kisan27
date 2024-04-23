<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailers extends Model
{
    use HasFactory;
    protected $table="retailers";
    protected $filllable=
    [
        'user_id',
        'role',
        'Name', 
        'firm_name',
        'Mobile_Number',
        'aadhar_card', 
        'Address',
        'front_shop_pic',
        'Username',
        'Password',
    ]
    ;
}
