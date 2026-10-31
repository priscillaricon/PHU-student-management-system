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
     * Display the student dashboard.
     */
    public function index()
    {
        // Find only the student record belonging to the logged-in user.
        $student = Student::where('email', Auth::user()->email)->first();

        // Do not expose another student's information.
        if (! $student) {
            return view('student.dashboard', [
                'student' => null,
                'registrations' => collect(),
                'availableCourses' => collect(),
                'totalCreditUnits' => 0,
            ]);
        }

        // Get this student's registrations with course and lecturer.
        $registrations = $student->registrations()
            ->with('course.lecturer')
            ->get();

        // Find courses the student has not registered for.
        $registeredIds = $registrations->pluck('course_id');

        $availableCourses = Course::with('lecturer')
            ->whereNotIn('id', $registeredIds)
            ->get();

        // Calculate total credit units.
        $totalCreditUnits = $registrations->sum(
            fn ($registration) => $registration->course?->credit_units ?? 0
        );

        return view('student.dashboard', compact(
            'student',
            'registrations',
            'availableCourses',
            'totalCreditUnits'
        ));
    }

    /**
     * Register the logged-in student for a course.
     */
    public function registerCourse(Request $request)
    {
        // A student must have a matching student record.
        $student = Student::where('email', Auth::user()->email)->first();

        if (! $student) {
            abort(403, 'Your account is not linked to a student record. Please contact the administrator.');
        }

        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'semester' => 'required|string|max:50',
        ]);

        // Prevent duplicate registrations.
        $alreadyRegistered = Registration::where('student_id', $student->id)
            ->where('course_id', $validated['course_id'])
            ->exists();

        if ($alreadyRegistered) {
            return back()->with('error', 'You are already registered for this course.');
        }

        Registration::create([
            'student_id' => $student->id,
            'course_id' => $validated['course_id'],
            'semester' => $validated['semester'],
        ]);

        return redirect()->route('student.dashboard')
            ->with('success', 'Course registered successfully.');
    }

    /**
     * Drop a course registration.
     */
    public function dropCourse(Registration $registration)
    {
        // Students can only drop their own registrations.
        if (Auth::user()->role === 'student') {
            $student = Student::where('email', Auth::user()->email)->first();

            if (! $student || $registration->student_id !== $student->id) {
                abort(403, 'You are not authorized to drop this registration.');
            }
        }

        // Admins retain their administrative access.
        $registration->delete();

        return redirect()->route('student.dashboard')
            ->with('success', 'Course dropped successfully.');
    }
}
