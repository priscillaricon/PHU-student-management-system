<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecturers = Lecturer::all();
        $lecturer1 = $lecturers->get(0)?->id ?? 1;
        $lecturer2 = $lecturers->get(1)?->id ?? 2;
        $lecturer3 = $lecturers->get(2)?->id ?? 3;
        $lecturer4 = $lecturers->get(3)?->id ?? 4;

        Course::firstOrCreate(
            ['course_code' => 'BUC3131'],
            [
                'course_name' => 'Business Computing Systems',
                'credit_units' => 4,
                'description' => 'Core computing and systems analysis for business applications.',
                'lecturer_id' => $lecturer1,
            ]
        );

        Course::firstOrCreate(
            ['course_code' => 'BIT2105'],
            [
                'course_name' => 'Database Management Systems',
                'credit_units' => 3,
                'description' => 'Relational database design, SQL querying, and normalization.',
                'lecturer_id' => $lecturer2,
            ]
        );

        Course::firstOrCreate(
            ['course_code' => 'BUC3124'],
            [
                'course_name' => 'Web App Development',
                'credit_units' => 5,
                'description' => 'Developing modern Web Applications using MVC frameworks.',
                'lecturer_id' => $lecturer3,
            ]
        );

        Course::firstOrCreate(
            ['course_code' => 'BUC3458'],
            [
                'course_name' => 'Business Application Programming',
                'credit_units' => 5,
                'description' => 'Enterprise application development and object-oriented programming.',
                'lecturer_id' => $lecturer4,
            ]
        );
    }
}
