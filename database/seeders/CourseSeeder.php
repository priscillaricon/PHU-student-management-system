<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Course::create([
            'course_code' => 'BUC3131',
            'course_name' => 'Business Computing Systems',
            'credit_units' => 4,
            'description' => 'Core computing and systems analysis for business applications.',
            'lecturer_id' => 1,
        ]);

        Course::create([
            'course_code' => 'BIT2105',
            'course_name' => 'Database Management Systems',
            'credit_units' => 3,
            'description' => 'Relational database design, SQL querying, and normalization.',
            'lecturer_id' => 2,
        ]);


        
         Course::create([
            'course_code' => 'BUC3124',
            'course_name' => 'Web App Development',
            'credit_units' => 5,
            'description' => 'Developing Websites.',
            'lecturer_id' => 3,
        ]);


        
         Course::create([
            'course_code' => 'BUC3458',
            'course_name' => 'Business Application Programming',
            'credit_units' => 5,
            'description' => 'Developing Applications.',
            'lecturer_id' => 4,
        ]);

    }
}
