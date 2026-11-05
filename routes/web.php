<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LecturerDashboardController;
use App\Http\Controllers\StudentPortalController;
use App\Http\Controllers\ActivityLogController;

use App\Models\Student;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Registration;


// ==========================================
// HOMEPAGE
// ==========================================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'index']);


// ==========================================
// AUTHENTICATION ROUTES
// ==========================================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

Route::get('/lecturer-login', [AuthController::class, 'showLecturerLogin'])
    ->name('lecturer-login');

Route::post('/lecturer-login', [AuthController::class, 'loginLecturer'])
    ->name('lecturer-login.post');

Route::get('/student-login', [AuthController::class, 'showStudentLogin'])
    ->name('student-login');

Route::post('/student-login', [AuthController::class, 'loginStudent'])
    ->name('studentLogin');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// ==========================================
// COURSE REDIRECT
// ==========================================

Route::get('/course', function () {
    return redirect()->route('courses.index');
});


// ==========================================
// ADMIN PROTECTED ROUTES
// ==========================================

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', function () {

        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $totalRegistrations = Registration::count();
        $totalLecturers = Lecturer::count();

        $recentStudents = Student::latest()
            ->take(5)
            ->get();

        $recentRegistrations = Registration::with(['student', 'course'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalStudents',
            'totalCourses',
            'totalRegistrations',
            'totalLecturers',
            'recentStudents',
            'recentRegistrations'
        ));

    })->name('dashboard');


    Route::get('/admin/activity-logs', [ActivityLogController::class, 'index'])
    ->name('admin.activity-logs.index');


    // ==========================================
    // ADMIN USER AND ACCOUNT MANAGEMENT
    // ==========================================

    Route::get('/admin/users', [AdminUserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/admin/users/create', [AdminUserController::class, 'create'])
        ->name('admin.users.create');

    Route::post('/admin/users', [AdminUserController::class, 'store'])
        ->name('admin.users.store');

    // Edit user account
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])
        ->name('admin.users.edit');

    // Update user account
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])
        ->name('admin.users.update');

    // Activate or deactivate user account
    Route::patch('/admin/users/{user}/status', [AdminUserController::class, 'toggleStatus'])
        ->name('admin.users.status');


    // ==========================================
    // STUDENT CRUD
    // ==========================================

    Route::resource('students', StudentController::class);


    // ==========================================
    // COURSE CRUD
    // ==========================================

    Route::resource('courses', CourseController::class);


    // ==========================================
    // GENERAL COURSE REGISTRATION
    // ==========================================

    Route::get('/registration', function () {

        $students = Student::orderBy('full_name')->get();
        $courses = Course::orderBy('course_code')->get();

        return view('registration', compact('students', 'courses'));

    })->name('registration');


    // ==========================================
    // REGISTRATION MANAGEMENT
    // ==========================================

    Route::post('/registrations', [RegistrationController::class, 'store'])
        ->name('registrations.store');

    Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])
        ->name('registrations.show');

    Route::get('/registrations/{registration}/edit', [RegistrationController::class, 'edit'])
        ->name('registrations.edit');

    Route::put('/registrations/{registration}', [RegistrationController::class, 'update'])
        ->name('registrations.update');

    Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])
        ->name('registrations.destroy');


    // ==========================================
    // ELOQUENT QUERY DEMONSTRATION
    // ==========================================

    Route::get('/student-courses', [QueryController::class, 'studentCourses'])
        ->name('student-courses');

    Route::get('/course-students', [QueryController::class, 'courseStudents'])
        ->name('course-students');

});


// ==========================================
// LECTURER PROTECTED ROUTES
// ==========================================

Route::middleware(['auth', 'role:lecturer,admin'])->group(function () {

    Route::get('/lecturer-dashboard', [LecturerDashboardController::class, 'index'])
        ->name('lecturer-dashboard');

});


// ==========================================
// STUDENT PROTECTED ROUTES
// ==========================================

Route::middleware(['auth', 'role:student,admin'])->group(function () {

    Route::get('/student-dashboard', [StudentPortalController::class, 'index'])
        ->name('student.dashboard');

    Route::post('/student/register-course', [StudentPortalController::class, 'registerCourse'])
        ->name('student.register-course');

    Route::delete('/student/drop-course/{registration}', [StudentPortalController::class, 'dropCourse'])
        ->name('student.drop-course');

});
