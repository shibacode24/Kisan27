<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table="attendance";
    protected $fillable = [
        'user_id',
		'role',	
		'time',
		'date',
		'in_out'
    ];

    public function user_name($request)
    {
        if ($request->role == "asm") {
            return $this->hasOne(Areamanager::class, 'id', 'user_id');
        } elseif ($request->role == "sp") {
            return $this->hasOne(SalePerson::class, 'id', 'user_id');
        }
      elseif ($request->role == "sm") {
        return $this->hasOne(Salemanager::class, 'id', 'user_id');
    } else {
            // Handle other roles or return null if no match
            return null;
        }
    }
}
