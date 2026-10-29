<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'reg_no',
        'full_name',
        'email',
        'program',

    ];
    function registrations() { 

    return $this->hasMany(Registration::class);//hasMany relationship 

    }  
    public function courses() { 
    return $this->belongsToMany(Course::class, 'registrations') 
                ->withTimestamps(); //belongsToMany relationship 
} 

}
