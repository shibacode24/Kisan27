<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class save_totalkilometer extends Model
{
    use HasFactory;
    protected $table = "save_totalkilometer";
    protected $fillable = [
        'user_id',
        'role',
        'date',
        'totalkilometer',
    ];
}
