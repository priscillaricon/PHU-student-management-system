<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show staff/admin login page
    public function showLogin()
    {
        return view('login');
    }

    // Process staff/admin login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            }

            if (Auth::user()->role === 'lecturer') {
                return redirect()->route('lecturer-dashboard');
            }

            return redirect()->route('student.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    // Show lecturer login page
    public function showLecturerLogin()
    {
        return view('lecturer-login');
    }

    // Process lecturer login
    public function loginLecturer(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'lecturer' || Auth::user()->role === 'admin') {
                return redirect()->route('lecturer-dashboard');
            }

            Auth::logout();

            return back()->withErrors(['email' => 'This account is not a lecturer account.']);
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    // Show student login page
    public function showStudentLogin()
    {
        return view('student-login');
    }

    // Process student login
    public function loginStudent(Request $request)
    {
        $request->validate([
            'reg_no' => 'required',
            'password' => 'required',
        ]);

        $input = trim($request->reg_no);
        $email = $input;

        // If user entered a registration number instead of an email
        if (! filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $student = Student::where('reg_no', $input)->first();
            if ($student) {
                $email = $student->email;
            }
        }

        if (Auth::attempt(['email' => $email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->route('student.dashboard');
        }

        return back()->withErrors(['reg_no' => 'Invalid registration number or password.']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have logged out.');
    }
}
