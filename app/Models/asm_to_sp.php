<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asm_to_sp extends Model
{
    use HasFactory;

    protected $table='asm_to_sp';
    protected $fillable=['asm_id','sp_id'];


    public function setsp($value)
    {
        $this->attributes['sp']= json_encode($value);
    }

    public function getsp($value)
    {
        return $this->attributes['sp'] = json_decode($value);
      }
}
