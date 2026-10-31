<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LecturerDashboardController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPortalController;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// ==========================================
// Public Routes
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/index', [HomeController::class, 'index']);

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/lecturer-login', [AuthController::class, 'showLecturerLogin'])->name('lecturer-login');
Route::post('/lecturer-login', [AuthController::class, 'loginLecturer'])->name('lecturer-login.post');

Route::get('/student-login', [AuthController::class, 'showStudentLogin'])->name('student-login');
Route::post('/student-login', [AuthController::class, 'loginStudent'])->name('studentLogin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Question 1(c) Eloquent Query Demonstration Endpoints
Route::get('/student-courses', [QueryController::class, 'studentCourses'])->name('student-courses');
Route::get('/course-students', [QueryController::class, 'courseStudents'])->name('course-students');

// ==========================================
// Admin Protected Routes (role: admin)
// ==========================================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $totalRegistrations = Registration::count();
        $totalLecturers = Lecturer::count();

        $recentStudents = Student::latest()->take(5)->get();
        $recentRegistrations = Registration::with(['student', 'course'])->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalStudents',
            'totalCourses',
            'totalRegistrations',
            'totalLecturers',
            'recentStudents',
            'recentRegistrations'
        ));
    })->name('dashboard');

    // Student CRUD
    Route::resource('students', StudentController::class);

    // Course CRUD
    Route::resource('courses', CourseController::class);
    Route::get('/course', fn () => redirect()->route('courses.index'));

    // Course Registration Management
    Route::get('/registration', function () {
        $students = Student::orderBy('full_name')->get();
        $courses = Course::orderBy('course_code')->get();

        return view('registration', compact('students', 'courses'));
    })->name('registration');

    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])->name('registrations.show');
    Route::get('/registrations/{registration}/edit', [RegistrationController::class, 'edit'])->name('registrations.edit');
    Route::put('/registrations/{registration}', [RegistrationController::class, 'update'])->name('registrations.update');
    Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
});

// ==========================================
// Lecturer Protected Routes (role: lecturer, admin)
// ==========================================
Route::middleware(['auth', 'role:lecturer,admin'])->group(function () {
    Route::get('/lecturer-dashboard', [LecturerDashboardController::class, 'index'])->name('lecturer-dashboard');
});

// ==========================================
// Student Protected Routes (role: student, admin)
// ==========================================
Route::middleware(['auth', 'role:student,admin'])->group(function () {
    Route::get('/student-dashboard', [StudentPortalController::class, 'index'])->name('student.dashboard');
    Route::post('/student/register-course', [StudentPortalController::class, 'registerCourse'])->name('student.register-course');
    Route::delete('/student/drop-course/{registration}', [StudentPortalController::class, 'dropCourse'])->name('student.drop-course');
});
