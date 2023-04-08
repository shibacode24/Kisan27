<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areamanager extends Model
{
    use HasFactory;
    protected $table="area_manager";
    protected $filllable=['Emp_Id','Designation','Photo','Name','Mobile_Number','Email-Id','Age','Gender','Address','Sup_Name','Sup_Con','HR_Name','HR_Email','HR_Number','City','State','District','Tahsil','Region','Username','Password'];
}
