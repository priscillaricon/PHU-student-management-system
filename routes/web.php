<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LecturerDashboardController;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->hasRole('Admin')) {
            return view('admin.dashboard');
        } elseif ($user->hasRole('Lecturer')) {
            return view('lecturer.dashboard');
        }
        return view('student.dashboard');
    })->name('dashboard');

});

// All authenticated routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Student Routes (Protected by role check)
    Route::middleware(['role:Student'])->group(function () {
        Route::get('/student/registrations', [StudentController::class, 'myRegistrations'])->name('student.registrations');
    });

    // Lecturer Routes
    Route::middleware(['role:Lecturer'])->group(function () {
        Route::get('/lecturer/courses', [CourseController::class, 'assignedCourses'])->name('lecturer.courses');
    });

});

// Homepage
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Student management (CRUD)
Route::resource('students', StudentController::class);

// Course management (CRUD)
Route::resource('courses', CourseController::class);

// Student and course queries
Route::get('/student-courses', [QueryController::class, 'studentCourses'])
    ->name('student-courses');

Route::get('/course-students', [QueryController::class, 'courseStudents'])
    ->name('course-students');

// Lecturer dashboard
Route::get('/lecturer-dashboard', [LecturerDashboardController::class, 'index'])
    ->name('lecturer-dashboard');

// Login pages
Route::view('/login', 'login')
    ->name('login');

Route::view('/student-login', 'student-login')
    ->name('student-login');

Route::view('/lecturer-login', 'lecturer-login')
    ->name('lecturer-login');

// Registration page
Route::view('/registration', 'registration')
    ->name('registration');

Route::post('/registrations', [RegistrationController::class, 'store'])
    ->name('registrations.store');
// Course Registration Management
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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
