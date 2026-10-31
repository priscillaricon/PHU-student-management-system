<?php

use Illuminate\Support\Facades\Route;

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
| All dashboard statistics are retrieved dynamically from the database.
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


/*
|--------------------------------------------------------------------------
| Student and Course Queries
|--------------------------------------------------------------------------
*/

Route::get('/student-courses', [QueryController::class, 'studentCourses'])
    ->name('student-courses');

Route::get('/course-students', [QueryController::class, 'courseStudents'])
    ->name('course-students');


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

Route::view('/login', 'login')
    ->name('login');

Route::view('/student-login', 'student-login')
    ->name('student-login');

Route::view('/lecturer-login', 'lecturer-login')
    ->name('lecturer-login');


/*
|--------------------------------------------------------------------------
| Course Registration Form
|--------------------------------------------------------------------------
*/

Route::get('/registration', function () {

    $students = Student::orderBy('full_name')->get();
    $courses = Course::orderBy('course_code')->get();

    return view('registration', compact('students', 'courses'));

})->name('registration');


/*

| Course Registration Actions

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

