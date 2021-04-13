<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id','emp_name','p_email','o_email','phone','dob','doj','experiance','address','designation'
    ];
}
