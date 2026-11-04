<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
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
            'reg_no' => [
                'required',
                'string',
                'max:255',
                'unique:students,reg_no'
            ],
            'full_name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:students,email'
            ],
            'program' => [
                'required',
                'string',
                'max:255'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
        ]);

        DB::transaction(function () use ($validated) {

            $existingUser = User::where(
                'email',
                $validated['email']
            )->first();

            if ($existingUser && $existingUser->role !== 'student') {
                throw ValidationException::withMessages([
                    'email' => 'This email belongs to an administrator or lecturer account.',
                ]);
            }

            Student::create([
                'reg_no' => $validated['reg_no'],
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'program' => $validated['program'],
            ]);

            if (!$existingUser) {

                User::create([
                    'name' => $validated['full_name'],
                    'email' => $validated['email'],
                    'password' => $validated['password'],
                    'role' => 'student',
                ]);

            } else {

                $existingUser->update([
                    'name' => $validated['full_name'],
                ]);
            }
        });

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record and login account created successfully.');
    }

    public function show(Student $student)
    {
        $student->load([
            'courses',
            'registrations.course'
        ]);

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
                'required',
                'string',
                'max:255',
                Rule::unique('students', 'reg_no')->ignore($student->id),
            ],

            'full_name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id),
            ],

            'program' => [
                'required',
                'string',
                'max:255'
            ],
        ]);

        DB::transaction(function () use ($validated, $student) {

            $linkedUser = User::where(
                'email',
                $student->email
            )->first();

            $emailOwner = User::where(
                'email',
                $validated['email']
            )->first();

            if (
                $emailOwner &&
                (!$linkedUser || $emailOwner->id !== $linkedUser->id)
            ) {
                throw ValidationException::withMessages([
                    'email' => 'This email is already used by another login account.',
                ]);
            }

            if ($linkedUser && $linkedUser->role !== 'student') {
                throw ValidationException::withMessages([
                    'email' => 'The linked account is not a student account.',
                ]);
            }

            $student->update($validated);

            if ($linkedUser) {
                $linkedUser->update([
                    'name' => $validated['full_name'],
                    'email' => $validated['email'],
                ]);
            }
        });

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record and login account updated successfully.');
    }

    public function destroy(Student $student)
    {
        DB::transaction(function () use ($student) {

            // Find the linked student login account.
            $user = User::where('email', $student->email)
                ->where('role', 'student')
                ->first();

            // Delete the linked student login account.
            if ($user) {
                $user->delete();
            }

            // Delete the student academic record.
            $student->delete();
        });

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record and linked login account deleted successfully.');
    }
}