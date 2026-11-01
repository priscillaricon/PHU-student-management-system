<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the currently logged-in lecturer.
        $lecturer = Lecturer::where('email', Auth::user()->email)
            ->first();

        // Retrieve only courses assigned to this lecturer.
        $courses = $lecturer
            ? $lecturer->courses()
                ->with('students')
                ->orderBy('course_code')
                ->get()
            : collect();

        // Select the requested course or the first assigned course.
        $selectedCourse = $courses->firstWhere(
            'id',
            (int) $request->query('course_id')
        );

        if (!$selectedCourse) {
            $selectedCourse = $courses->first();
        }

        // Get students registered for the selected course.
        $students = $selectedCourse
            ? $selectedCourse->students
            : collect();

        // Search students by name or registration number.
        if ($request->filled('search')) {
            $search = strtolower(trim($request->query('search')));

            $students = $students->filter(function ($student) use ($search) {
                return str_contains(
                    strtolower($student->full_name),
                    $search
                ) || str_contains(
                    strtolower($student->reg_no),
                    $search
                );
            });
        }

        // Count unique students across assigned courses.
        $totalStudents = $courses
            ->flatMap(fn ($course) => $course->students)
            ->unique('id')
            ->count();

        return view('lecturer-dashboard', compact(
            'lecturer',
            'courses',
            'selectedCourse',
            'students',
            'totalStudents'
        ));
    }
}
