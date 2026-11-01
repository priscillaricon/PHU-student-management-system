<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;

class QueryController extends Controller
{
    /**
     * Question 1(c):
     * Retrieve a student's registered courses using Eloquent.
     */
    public function studentCourses()
    {
        $student = Student::with('courses')->first();

        return response()->json([
            'student' => $student?->full_name,
            'reg_no' => $student?->reg_no,
            'courses' => $student?->courses ?? [],
        ]);
    }

    /**
     * Question 1(c):
     * Retrieve students registered for a course using Eloquent.
     */
    public function courseStudents()
    {
        $course = Course::with('students')->first();

        return response()->json([
            'course' => $course?->course_name,
            'course_code' => $course?->course_code,
            'students' => $course?->students ?? [],
        ]);
    }
}
