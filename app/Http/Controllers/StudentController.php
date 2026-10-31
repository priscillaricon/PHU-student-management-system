<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class StudentController extends Controller
{

public function showRegistrations($studentId)
{
    $user = auth()->user();

    // If the logged-in user is a Student, ensure they can only view their own record
    if ($user->hasRole('Student') && $user->id !== (int) $studentId) {
        abort(403, 'Unauthorized access to another user records.');
    }

    // Fetch the registration records safely
    $registrations = Registration::where('student_id', $studentId)->get();

    return view('student.registrations', compact('registrations'));
}





    public function index()
    {
        $students = Student::orderBy('full_name')->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reg_no' => ['required', 'string', 'max:255', 'unique:students,reg_no'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'program' => ['required', 'string', 'max:255'],
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully.');
    }

public function show(Student $student)
{
    // Load the student's courses and registration details
    $student->load(['courses', 'registrations.course']);

    // Get all courses for the registration form
    $courses = Course::orderBy('course_code')->get();

    return view('students.show', compact('student', 'courses'));
}

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'reg_no' => [
                'required', 'string', 'max:255',
                Rule::unique('students', 'reg_no')->ignore($student->id),
            ],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('students', 'email')->ignore($student->id),
            ],
            'program' => ['required', 'string', 'max:255'],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
