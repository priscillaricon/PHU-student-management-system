<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\QueryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

use App\Http\Controllers\LecturerDashboardController;
use App\Models\Student;
use App\Models\Course;
use App\Models\Registration;
use App\Models\Lecturer;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
})->name('home');

/*
|--------------------------------------------------------------------------
| System Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $totalStudents = Student::count();
    $totalCourses = Course::count();
    $totalRegistrations = Registration::count();
    $totalLecturers = Lecturer::count();

    return view('dashboard', compact(
        'totalStudents',
        'totalCourses',
        'totalRegistrations',
        'totalLecturers'
    ));

})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Student Management
|--------------------------------------------------------------------------
*/

Route::resource('students', StudentController::class);

/*
|--------------------------------------------------------------------------
| Course Management
|--------------------------------------------------------------------------
*/

Route::resource('courses', CourseController::class);

Route::get('/course', function () {
    return redirect()->route('courses.index');
});

/*
|--------------------------------------------------------------------------
| Student and Course Queries
|--------------------------------------------------------------------------
*/

Route::get('/student-courses', [QueryController::class, 'studentCourses'])
    ->name('student-courses');

/*
|--------------------------------------------------------------------------
| Lecturer Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/lecturer-dashboard', [LecturerDashboardController::class, 'index'])
    ->name('lecturer-dashboard');
/*
|--------------------------------------------------------------------------
| Login Pages
|--------------------------------------------------------------------------
*/

Route::view('/login', 'login')->name('login');

Route::view('/student-login', 'student-login')
    ->name('student-login');

Route::view('/lecturer-login', 'lecturer-login')
    ->name('lecturer-login');

/*
|--------------------------------------------------------------------------
| General Course Registration
|--------------------------------------------------------------------------
*/

Route::get('/registration', function () {

    $students = Student::orderBy('full_name')->get();
    $courses = Course::orderBy('course_code')->get();

    return view('registration', compact('students', 'courses'));

})->name('registration');

/*
|--------------------------------------------------------------------------
| Registration Management
|--------------------------------------------------------------------------
*/

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

/*
|--------------------------------------------------------------------------
| Student Self-Service Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/student/dashboard',
        [RegistrationController::class, 'studentDashboard']
    )->name('student.dashboard');

    Route::post('/student/register-course',
        [RegistrationController::class, 'registerStudentCourse']
    )->name('student.register-course');

    Route::delete('/student/drop-course/{registration}',
        [RegistrationController::class, 'dropStudentCourse']
    )->name('student.drop-course');

});

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
|
| If your authentication package already defines a logout route,
| keep only one POST /logout route to avoid duplicate route names.
|
*/

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');

})->name('logout');
