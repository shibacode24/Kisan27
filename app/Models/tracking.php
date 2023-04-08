<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    use HasFactory;
    protected $table="tracking";
    protected $fillable=[
    'user_id',
	'role',
    'latitude',
    'longitude'
];
}
