<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;

class QueryController extends Controller
{
    /**
     * Question 1(c): Eloquent query to retrieve a student's registered courses.
     */
    public function studentCourses()
    {
        $student = Student::with('courses')->first();

        return response()->json([
            'student' => $student ? $student->full_name : null,
            'reg_no' => $student ? $student->reg_no : null,
            'courses' => $student ? $student->courses : [],
        ]);
    }

    /**
     * Question 1(c): Eloquent query to retrieve students registered for a course.
     */
    public function courseStudents()
    {
        $course = Course::with('students')->first();

        return response()->json([
            'course' => $course ? $course->course_name : null,
            'course_code' => $course ? $course->course_code : null,
            'students' => $course ? $course->students : [],
        ]);
    }
}
