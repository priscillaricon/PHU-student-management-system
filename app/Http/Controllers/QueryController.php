<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class QueryController extends Controller
{
    public function studentCourses()
    {
        $student = Student::with('courses')->where('reg_no', '2200701234')->first();
        $courses = $student->courses;

        return $courses;
    }

    public function courseStudents()
    {
        $course = Course::with('students')->where('course_code', 'BUC3131')->first();
        $students = $course->students;

        return $students;
    }

}
