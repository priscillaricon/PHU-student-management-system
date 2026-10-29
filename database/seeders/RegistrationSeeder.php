<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Registration;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Register Student ID 1 for Course ID 1 (e.g., BUC3131)
        Registration::create([
            'student_id' => 1,
            'course_id' => 1,
            'semester' => 'Semester 1',

        ]);

        // Register Student ID 1 for Course ID 2
        Registration::create([
            'student_id' => 1,
            'course_id' => 2,
            'semester' => 'Semester 1',
            
        ]);

        // Register Student ID 2 for Course ID 1
        Registration::create([
            'student_id' => 2,
            'course_id' => 1,
            'semester' => 'Semester 1',
            
        ]);
        
    }
}
