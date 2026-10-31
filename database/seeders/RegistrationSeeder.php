<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student1 = Student::where('reg_no', '23/U/1234/EVE')->first();
        $student2 = Student::where('reg_no', '24/U/18757/EVE')->first();
        $course1 = Course::where('course_code', 'BUC3131')->first();
        $course2 = Course::where('course_code', 'BIT2105')->first();

        if ($student1 && $course1) {
            Registration::firstOrCreate(
                ['student_id' => $student1->id, 'course_id' => $course1->id],
                ['semester' => 'Semester I']
            );
        }

        if ($student1 && $course2) {
            Registration::firstOrCreate(
                ['student_id' => $student1->id, 'course_id' => $course2->id],
                ['semester' => 'Semester I']
            );
        }

        if ($student2 && $course1) {
            Registration::firstOrCreate(
                ['student_id' => $student2->id, 'course_id' => $course1->id],
                ['semester' => 'Semester I']
            );
        }
    }
}
