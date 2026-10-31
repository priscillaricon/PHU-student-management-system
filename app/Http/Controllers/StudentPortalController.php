<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentPortalController extends Controller
{
    /**
     * Display the student dashboard with registered and available courses.
     */
    public function index()
    {
        // Get the student record matching logged-in user email
        $student = Student::where('email', Auth::user()->email)->first();

        // Fallback for demonstration
        if (! $student) {
            $student = Student::first();
        }

        // Get student's registrations with course and lecturer
        $registrations = $student ? $student->registrations()->with('course.lecturer')->get() : collect();

        // Get IDs of courses the student already registered
        $registeredIds = $registrations->pluck('course_id');

        // Available courses that are not yet registered
        $availableCourses = Course::with('lecturer')->whereNotIn('id', $registeredIds)->get();

        // Calculate total credit units
        $totalCreditUnits = 0;
        foreach ($registrations as $reg) {
            if ($reg->course) {
                $totalCreditUnits += $reg->course->credit_units;
            }
        }

        return view('student.dashboard', compact(
            'student',
            'registrations',
            'availableCourses',
            'totalCreditUnits'
        ));
    }

    /**
     * Student self-registration for a course.
     */
    public function registerCourse(Request $request)
    {
        $student = Student::where('email', Auth::user()->email)->first() ?? Student::first();

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'semester' => 'required|string',
        ]);

        // Check for duplicate registration
        $alreadyRegistered = Registration::where('student_id', $student->id)
            ->where('course_id', $request->course_id)
            ->exists();

        if ($alreadyRegistered) {
            return back()->with('error', 'You are already registered for this course.');
        }

        Registration::create([
            'student_id' => $student->id,
            'course_id' => $request->course_id,
            'semester' => $request->semester,
        ]);

        return redirect()->route('student.dashboard')
            ->with('success', 'Course registered successfully.');
    }

    /**
     * Drop a registered course.
     */
    public function dropCourse(Registration $registration)
    {
        $registration->delete();

        return redirect()->route('student.dashboard')
            ->with('success', 'Course dropped successfully.');
    }
}

