<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePerson extends Model
{
    use HasFactory;
    protected $table="sales_person";
    protected $filllable=['role_id','Emp_Id','Photo','Name','Mobile_Number','Email','Address','ASM_Name','SM_No','HR_Name','HR_Email','HR_Number','City','District','Tahsil','Region','State','Location','Username','Password'];
}
