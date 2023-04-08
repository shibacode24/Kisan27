<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignteam extends Model
{
    use HasFactory;
    protected $table='assign_team';
    protected $fillable=['Select_SM','Region'];


    public function setasm($value)
    {
        $this->attributes['region']= json_encode($value);
    }

    public function getasm($value)
    {
        return $this->attributes['region'] = json_decode($value);
      }
}
