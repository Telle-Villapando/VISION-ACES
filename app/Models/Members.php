<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    //
      protected $fillable =[
        'firstName',
        'lastName',
        'middleName',
        'studentNumber',
        'course',
        'gender',     
        'contactNumber',   
        'yearLevel',
        'address',
        'age',
        'studentStatus',
        'birthDate'
       
        

        

    ];

    public function user() 
    {
        return $this->hasOne(User::class, 'member_id');
    }
    
    
}
