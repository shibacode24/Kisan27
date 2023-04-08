<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = "leave";
    protected $fillable = [
		'user_id',
        'role',
        'leave_type',
        'from_date',
        'to_date',
        'reason'
    ];
}
