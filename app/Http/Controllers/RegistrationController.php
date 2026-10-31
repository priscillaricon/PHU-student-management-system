<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Identify Logged-in Student
    |--------------------------------------------------------------------------
    */

    private function loggedInStudent()
    {
        $user = Auth::user();

        abort_unless($user, 401);

        return Student::where('email', $user->email)->firstOrFail();
    }

    /*
    |--------------------------------------------------------------------------
    | Student Dashboard
    |--------------------------------------------------------------------------
    */

    public function studentDashboard()
    {
        $student = $this->loggedInStudent();

        $registrations = Registration::with('course')
            ->where('student_id', $student->id)
            ->get();

        $registeredCourseIds = $registrations->pluck('course_id');

        $availableCourses = Course::whereNotIn(
            'id',
            $registeredCourseIds
        )->orderBy('course_code')->get();

        $totalCreditUnits = $registrations->sum(
            function ($registration) {
                return $registration->course->credit_units ?? 0;
            }
        );

        return view('student.dashboard', compact(
            'student',
            'registrations',
            'availableCourses',
            'totalCreditUnits'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Register Course From Student Dashboard
    |--------------------------------------------------------------------------
    */

    public function registerStudentCourse(Request $request)
    {
        $student = $this->loggedInStudent();

        $validated = $request->validate([
            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('registrations', 'course_id')
                    ->where('student_id', $student->id),
            ],

            'semester' => [
                'required',
                'string',
                'max:50'
            ],
        ], [
            'course_id.unique' =>
                'You are already registered for this course.',
        ]);

        Registration::create([
            'student_id' => $student->id,
            'course_id' => $validated['course_id'],
            'semester' => $validated['semester'],
        ]);

        return redirect()
            ->route('student.dashboard')
            ->with('success', 'Course registered successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Drop Course From Student Dashboard
    |--------------------------------------------------------------------------
    */

    public function dropStudentCourse(Registration $registration)
    {
        $student = $this->loggedInStudent();

        abort_unless(
            (int) $registration->student_id === (int) $student->id,
            403
        );

        $registration->delete();

        return redirect()
            ->route('student.dashboard')
            ->with('success', 'Course dropped successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | General Student Course Registration
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => [
                'required',
                'exists:students,id'
            ],

            'course_id' => [
                'required',
                'exists:courses,id',

                Rule::unique('registrations', 'course_id')
                    ->where('student_id', $request->student_id),
            ],

            'semester' => [
                'required',
                'string',
                'max:50'
            ],

        ], [
            'course_id.unique' =>
                'This student is already registered for this course.',
        ]);

        Registration::create($validated);

        return redirect()
            ->route('students.show', $validated['student_id'])
            ->with('success', 'Student registered for the course successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | View Registration Details
    |--------------------------------------------------------------------------
    */

    public function show(Registration $registration)
    {
        $registration->load(['student', 'course']);

        return view('registrations.show', compact('registration'));
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Registration Form
    |--------------------------------------------------------------------------
    */

    public function edit(Registration $registration)
    {
        $courses = Course::orderBy('course_code')->get();

        return view('registrations.edit', compact(
            'registration',
            'courses'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Registration
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Registration $registration)
    {
        $validated = $request->validate([

            'course_id' => [
                'required',
                'exists:courses,id',

                Rule::unique('registrations', 'course_id')
                    ->where('student_id', $registration->student_id)
                    ->ignore($registration->id),
            ],

            'semester' => [
                'required',
                'string',
                'max:50'
            ],

        ]);

        $registration->update($validated);

        return redirect()
            ->route('students.show', $registration->student_id)
            ->with('success', 'Registration updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Registration
    |--------------------------------------------------------------------------
    */

    public function destroy(Registration $registration)
    {
        $studentId = $registration->student_id;

        $registration->delete();

        return redirect()
            ->route('students.show', $studentId)
            ->with('success', 'Registration deleted successfully.');
    }
}
