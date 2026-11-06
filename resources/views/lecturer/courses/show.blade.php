
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details | PHU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">

    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Pearl Horizon University</h1>
                <p class="text-sm text-slate-500">Lecturer Portal</p>
            </div>

            <a href="{{ route('lecturer.courses.index') }}"
               class="text-blue-600 hover:underline">
                Back to My Courses
            </a>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-6 py-10">

        <div class="mb-8">
            <h2 class="text-3xl font-bold text-slate-800">Course Details</h2>
            <p class="text-slate-600 mt-2">
                View information about your assigned course.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-8">

            <div class="mb-6">
                <p class="text-sm text-slate-500 mb-1">Course Code</p>
                <h3 class="text-xl font-bold text-slate-800">
                    {{ $course->course_code }}
                </h3>
            </div>

            <div class="mb-6">
                <p class="text-sm text-slate-500 mb-1">Course Name</p>
                <h3 class="text-xl font-semibold text-slate-800">
                    {{ $course->course_name }}
                </h3>
            </div>

            <div class="mb-6">
                <p class="text-sm text-slate-500 mb-1">Description</p>
                <p class="text-slate-700">
                    {{ $course->description ?: 'No course description provided.' }}
                </p>
            </div>

            <div class="mb-6">
                <p class="text-sm text-slate-500 mb-1">Credit Units</p>
                <p class="text-lg font-semibold text-slate-800">
                    {{ $course->credit_units }}
                </p>
            </div>

            <div class="mb-8">
                <p class="text-sm text-slate-500 mb-1">Assigned Lecturer</p>
                <p class="text-lg font-semibold text-slate-800">
                    {{ $course->lecturer->full_name ?? 'Not assigned' }}
                </p>
            </div>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('lecturer.courses.edit', $course->id) }}"
                   class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Edit Course
                </a>

                <a href="{{ route('lecturer.courses.index') }}"
                   class="bg-slate-200 text-slate-700 px-6 py-3 rounded-lg hover:bg-slate-300">
                    Back to Courses
                </a>
            </div>

        </div>

    </main>

</body>
</html>
