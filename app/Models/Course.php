<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    'course_code',
    'course_name',
    'description',
    'credit_units',
    'lecturer_id',
    ];

    public function lecturer() { 
        return $this->belongsTo(Lecturer::class); //[belongsTo relationship 
    }  

    public function registrations() { 

    return $this->hasMany(Registration::class); // hasMany relationship 
     
    }  

    public function students() { 
    return $this->belongsToMany(Student::class, 'registrations') 
                ->withTimestamps(); //belongsToMany relationship 

    } 

}
