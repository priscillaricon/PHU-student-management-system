<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    // Register a student for a course
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('registrations', 'course_id')
                    ->where('student_id', $request->student_id),
            ],
            'semester' => ['required', 'string', 'max:50'],
        ], [
            'course_id.unique' => 'This student is already registered for this course.',
        ]);

        Registration::create($validated);

        return redirect()
            ->route('students.show', $validated['student_id'])
            ->with('success', 'Student registered for the course successfully.');
    }

    // View registration details
    public function show(Registration $registration)
    {
        $registration->load(['student', 'course']);

        return view('registrations.show', compact('registration'));
    }

    // Display registration edit form
    public function edit(Registration $registration)
    {
        $courses = Course::orderBy('course_code')->get();

        return view('registrations.edit', compact('registration', 'courses'));
    }

    // Update registration
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
            'semester' => ['required', 'string', 'max:50'],
        ]);

        $registration->update($validated);

        return redirect()
            ->route('students.show', $registration->student_id)
            ->with('success', 'Registration updated successfully.');
    }

    // Delete registration
    public function destroy(Registration $registration)
    {
        $studentId = $registration->student_id;

        $registration->delete();

        return redirect()
            ->route('students.show', $studentId)
            ->with('success', 'Registration deleted successfully.');
    }
}
