<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable =[
        'full_name',
        'email',
        'department',
    ];

    public function courses() { 
        
    return $this->hasMany(Course::class); //hasMany relationship 
} 

}
