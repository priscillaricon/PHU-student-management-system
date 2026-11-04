<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'account_type' => ['required', 'in:student,lecturer'],
            'reg_no' => ['required_if:account_type,student', 'nullable', 'string', 'max:255'],
            'program' => ['required_if:account_type,student', 'nullable', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature()
                ? ['accepted', 'required']
                : '',
        ])->validate();

        return DB::transaction(function () use ($input) {

            // LECTURER REGISTRATION
            if ($input['account_type'] === 'lecturer') {

                $lecturer = Lecturer::where('email', $input['email'])->first();

                if (!$lecturer) {
                    throw ValidationException::withMessages([
                        'email' => 'Your lecturer email is not registered with PHU. Contact the administrator.',
                    ]);
                }

                if (strtolower(trim($lecturer->full_name)) !== strtolower(trim($input['name']))) {
                    throw ValidationException::withMessages([
                        'name' => 'Your name does not match the lecturer records.',
                    ]);
                }
            }

            // STUDENT REGISTRATION
            if ($input['account_type'] === 'student') {

                $student = Student::where('reg_no', trim($input['reg_no']))->first();

                if ($student) {

                    // Allow an existing student record to create its login account.
                    if (
                        strtolower(trim($student->email)) !== strtolower(trim($input['email'])) ||
                        strtolower(trim($student->full_name)) !== strtolower(trim($input['name']))
                    ) {
                        throw ValidationException::withMessages([
                            'reg_no' => 'These details do not match the existing student records.',
                        ]);
                    }

                } else {

                    if (Student::where('email', $input['email'])->exists()) {
                        throw ValidationException::withMessages([
                            'email' => 'This email is already attached to another student record.',
                        ]);
                    }

                    Student::create([
                        'reg_no' => trim($input['reg_no']),
                        'full_name' => $input['name'],
                        'email' => $input['email'],
                        'program' => $input['program'],
                    ]);
                }
            }

            // CREATE LOGIN ACCOUNT
            return User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role' => $input['account_type'],
            ]);
        });
    }
}
