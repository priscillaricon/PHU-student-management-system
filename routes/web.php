
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;

Route::get('/', function () {
    return response('PHU Student Management System', 200);
});

Route::get('/student-courses', [QueryController::class, 'studentCourses']);

Route::get('/course-students', [QueryController::class, 'courseStudents']);
