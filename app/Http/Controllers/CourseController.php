<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('lecturer')
            ->orderBy('course_code')
            ->paginate(10);

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $lecturers = Lecturer::orderBy('full_name')->get();

        return view('courses.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code' => ['required', 'string', 'max:255', 'unique:courses,course_code'],
            'course_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'credit_units' => ['required', 'integer', 'min:1'],
            'lecturer_id' => ['required', 'exists:lecturers,id'],
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course added successfully.');
    }

    public function show(Course $course)
    {
        $course->load('lecturer');

        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $lecturers = Lecturer::orderBy('full_name')->get();

        return view('courses.edit', compact('course', 'lecturers'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'course_code' => [
                'required', 'string', 'max:255',
                Rule::unique('courses', 'course_code')->ignore($course->id),
            ],
            'course_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'credit_units' => ['required', 'integer', 'min:1'],
            'lecturer_id' => ['required', 'exists:lecturers,id'],
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
