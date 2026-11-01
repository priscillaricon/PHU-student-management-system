<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ==========================================
    // ADMIN / STAFF LOGIN
    // ==========================================

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Invalid email or password.'
            ]);
        }

        // Only administrators and lecturers can use staff login.
        $role = Auth::user()->role;

        if (!in_array($role, ['admin', 'lecturer'])) {
            Auth::logout();

            return back()->withErrors([
                'email' => 'Please use the correct login portal for your account.'
            ]);
        }

        $request->session()->regenerate();

        if ($role === 'admin') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('lecturer-dashboard');
    }


    // ==========================================
    // LECTURER LOGIN
    // ==========================================

    public function showLecturerLogin()
    {
        return view('lecturer-login');
    }

    public function loginLecturer(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Invalid email or password.'
            ]);
        }

        $role = Auth::user()->role;

        if (!in_array($role, ['lecturer', 'admin'])) {
            Auth::logout();

            return back()->withErrors([
                'email' => 'This account is not authorized to use the lecturer login.'
            ]);
        }

        $request->session()->regenerate();

        if ($role === 'admin') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('lecturer-dashboard');
    }


    // ==========================================
    // STUDENT LOGIN
    // ==========================================

    public function showStudentLogin()
    {
        return view('student-login');
    }

    public function loginStudent(Request $request)
    {
        $request->validate([
            'reg_no' => 'required|string',
            'password' => 'required|string',
        ]);

        $input = trim($request->reg_no);

        // Allow login using either registration number or email.
        $email = $input;

        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $student = Student::where('reg_no', $input)->first();

            if (!$student) {
                return back()->withErrors([
                    'reg_no' => 'Invalid registration number or password.'
                ]);
            }

            $email = $student->email;
        }

        if (!Auth::attempt([
            'email' => $email,
            'password' => $request->password
        ])) {
            return back()->withErrors([
                'reg_no' => 'Invalid registration number or password.'
            ]);
        }

        // Only student accounts can access the student login.
        if (Auth::user()->role !== 'student') {
            Auth::logout();

            return back()->withErrors([
                'reg_no' => 'This account is not authorized to use the student portal.'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('student.dashboard');
    }


    // ==========================================
    // LOGOUT
    // ==========================================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'You have logged out.');
    }
}
