<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LecturerCourseController extends Controller
{
    /**
     * Get the lecturer record belonging to the logged-in user.
     */
    private function lecturer()
    {
        $lecturer = Lecturer::where('email', Auth::user()->email)->first();

        if (!$lecturer) {
            abort(403, 'Your account is not linked to a lecturer record.');
        }

        return $lecturer;
    }

    /**
     * Display only courses assigned to this lecturer.
     */
    public function index()
    {
        $lecturer = $this->lecturer();

        $courses = $lecturer->courses()
            ->with('lecturer')
            ->orderBy('course_code')
            ->paginate(10);

        return view('lecturer.courses.index', compact('lecturer', 'courses'));
    }

    /**
     * Display details of an assigned course.
     */
    public function show(Course $course)
    {
        $lecturer = $this->lecturer();

        abort_unless(
            $course->lecturer_id === $lecturer->id,
            403,
            'You are not authorized to view this course.'
        );

        $course->load('lecturer');

        return view('lecturer.courses.show', compact('course'));
    }

    /**
     * Show the edit form for an assigned course.
     */
    public function edit(Course $course)
    {
        $lecturer = $this->lecturer();

        abort_unless(
            $course->lecturer_id === $lecturer->id,
            403,
            'You are not authorized to edit this course.'
        );

        return view('lecturer.courses.edit', compact('course'));
    }

    /**
     * Update an assigned course without changing its lecturer.
     */
    public function update(Request $request, Course $course)
    {
        $lecturer = $this->lecturer();

        abort_unless(
            $course->lecturer_id === $lecturer->id,
            403,
            'You are not authorized to edit this course.'
        );

        $validated = $request->validate([
            'course_code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('courses', 'course_code')->ignore($course->id),
            ],
            'course_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'credit_units' => ['required', 'integer', 'min:1'],
        ]);

        $course->update($validated);

        return redirect()
            ->route('lecturer.courses.index')
            ->with('success', 'Assigned course updated successfully.');
    }
}
