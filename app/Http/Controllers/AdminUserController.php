<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

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
     * Show the create user form.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Register a new user account.
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

        $validated = Validator::make(
            $request->all(),
            $rules
        )->validate();

        DB::transaction(function () use ($validated) {

            // Handle student account registration.
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

            // Handle lecturer account registration.
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

            // Create the login account.
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['account_type'],
                'is_active' => true,
            ]);
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User account registered successfully.');
    }

    /**
     * Show the edit user form.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update an existing user account.
     */
    public function update(Request $request, User $user)
    {
        $oldEmail = $user->email;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->getKey()),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        DB::transaction(function () use ($validated, $user, $oldEmail) {

            $user->name = $validated['name'];
            $user->email = $validated['email'];

            // Only change the password if a new one was provided.
            if (!empty($validated['password'])) {
                $user->password = $validated['password'];
            }

            $user->save();

            // Synchronize the linked student record.
            if ($user->role === 'student') {
                Student::where('email', $oldEmail)->update([
                    'full_name' => $validated['name'],
                    'email' => $validated['email'],
                ]);
            }

            // Synchronize the linked lecturer record.
            if ($user->role === 'lecturer') {
                Lecturer::where('email', $oldEmail)->update([
                    'full_name' => $validated['name'],
                    'email' => $validated['email'],
                ]);
            }
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User account updated successfully.');
    }

    /**
     * Activate or deactivate a user account.
     */
    public function toggleStatus(User $user)
    {
        // Prevent an administrator from deactivating their own account.
        if ($user->getKey() === Auth::id()) {
            return back()->with(
                'error',
                'You cannot deactivate your own account.'
            );
        }

        // Prevent deactivation of the last active administrator.
        if ($user->role === 'admin' && $user->is_active) {

            $activeAdmins = User::where('role', 'admin')
                ->where('is_active', true)
                ->count();

            if ($activeAdmins <= 1) {
                return back()->with(
                    'error',
                    'You cannot deactivate the last active administrator.'
                );
            }
        }

        $user->is_active = !$user->is_active;
        $user->save();

        $message = $user->is_active
            ? 'Account reactivated successfully.'
            : 'Account deactivated successfully.';

        return back()->with('success', $message);
    }
}
