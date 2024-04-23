<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ds_to_sm extends Model
{
    use HasFactory; protected $table='ds_to_sm';
    protected $fillable=['ds_id','sm_id'];


    public function setsm($value)
    {
        $this->attributes['sm']= json_encode($value);
    }

    public function getasm($value)
    {
        return $this->attributes['sm'] = json_decode($value);
      }
}
