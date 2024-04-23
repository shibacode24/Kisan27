<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salemanager extends Model
{
    use HasFactory;
    protected $table="sales_manager";
    protected $filllable=['Emp_Id','Name','Mobile_Number','Email-Id','Address','City_id','Region_id','State_id','Pincode','District_id','Tahsil_id','Username','Password'];
}