<?php
namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;


class LecturerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $lecturer = Lecturer::with('courses.students')->first();

        $courses = $lecturer ? $lecturer->courses : collect();

        $selectedCourse = $courses->firstWhere(
            'id',
            (int) $request->query('course_id')
        );

        if (!$selectedCourse) {
            $selectedCourse = $courses->first();
        }

        $students = $selectedCourse
            ? $selectedCourse->students
            : collect();

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
