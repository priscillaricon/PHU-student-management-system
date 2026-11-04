<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminUserController extends Controller
{
    /**
     * Display all user accounts.
     */
    public function index()
    {
        $users = User::orderBy('role')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the registration form.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Register a student, lecturer or administrator.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'account_type' => ['required', 'in:student,lecturer,admin'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if ($request->account_type === 'student') {
            $rules['reg_no'] = ['required', 'string', 'max:255'];
            $rules['program'] = ['required', 'string', 'max:255'];
        }

        if ($request->account_type === 'lecturer') {
            $rules['department'] = ['required', 'string', 'max:255'];
        }

        $validated = Validator::make($request->all(), $rules)->validate();

        DB::transaction(function () use ($validated) {

            // Register a student and create the login account.
            if ($validated['account_type'] === 'student') {

                $student = Student::where(
                    'reg_no',
                    trim($validated['reg_no'])
                )->first();

                if ($student) {
                    if (
                        strtolower(trim($student->email)) !== strtolower(trim($validated['email'])) ||
                        strtolower(trim($student->full_name)) !== strtolower(trim($validated['name']))
                    ) {
                        throw ValidationException::withMessages([
                            'reg_no' => 'These details do not match the existing student record.',
                        ]);
                    }
                } else {
                    if (Student::where('email', $validated['email'])->exists()) {
                        throw ValidationException::withMessages([
                            'email' => 'This email is already attached to another student record.',
                        ]);
                    }

                    Student::create([
                        'reg_no' => trim($validated['reg_no']),
                        'full_name' => $validated['name'],
                        'email' => $validated['email'],
                        'program' => $validated['program'],
                    ]);
                }
            }

            // Register a lecturer or link an existing lecturer record.
            if ($validated['account_type'] === 'lecturer') {

                $lecturer = Lecturer::where(
                    'email',
                    $validated['email']
                )->first();

                if ($lecturer) {
                    if (
                        strtolower(trim($lecturer->full_name)) !==
                        strtolower(trim($validated['name']))
                    ) {
                        throw ValidationException::withMessages([
                            'name' => 'This name does not match the existing lecturer record.',
                        ]);
                    }
                } else {
                    Lecturer::create([
                        'full_name' => $validated['name'],
                        'email' => $validated['email'],
                        'department' => $validated['department'],
                    ]);
                }
            }

            // Create the login account for all three account types.
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['account_type'],
            ]);
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User account registered successfully.');
    }
}
