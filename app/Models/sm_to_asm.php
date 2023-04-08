<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sm_to_asm extends Model
{
    use HasFactory; protected $table='sm_to_asm';
    protected $fillable=['sm_id','asm_id'];


    public function setasm($value)
    {
        $this->attributes['asm']= json_encode($value);
    }

    public function getasm($value)
    {
        return $this->attributes['asm'] = json_decode($value);
      }
}
