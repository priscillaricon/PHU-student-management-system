<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Assigned Course | Pearl Horizon University</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen">

    <header class="bg-white border-b shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-5">
            <h1 class="text-xl font-bold text-slate-900">
                Pearl Horizon University
            </h1>
            <p class="text-sm text-emerald-600 font-semibold">
                Lecturer Portal
            </p>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-6 py-10">

        <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">
                    Edit Assigned Course
                </h2>
                <p class="text-slate-500 mt-1">
                    Update the details of your assigned course.
                </p>
            </div>

            <a href="{{ route('lecturer.courses.index') }}"
               class="bg-slate-700 text-white px-5 py-2.5 rounded-lg hover:bg-slate-800">
                Back to My Courses
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">
                <strong>Please correct the following errors:</strong>
                <ul class="list-disc ml-6 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border p-8">

            <form method="POST"
                  action="{{ route('lecturer.courses.update', $course->id) }}">

                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block font-semibold text-slate-700 mb-2">
                        Course Code
                    </label>

                    <input type="text"
                           name="course_code"
                           value="{{ old('course_code', $course->course_code) }}"
                           required
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">

                </div>

                <div class="mb-6">
                    <label class="block font-semibold text-slate-700 mb-2">
                        Course Name
                    </label>

                    <input type="text"
                           name="course_name"
                           value="{{ old('course_name', $course->course_name) }}"
                           required
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">

                </div>

                <div class="mb-6">
                    <label class="block font-semibold text-slate-700 mb-2">
                        Course Description
                    </label>

                    <textarea name="description"
                              rows="5"
                              class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('description', $course->description) }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block font-semibold text-slate-700 mb-2">
                        Credit Units
                    </label>

                    <input type="number"
                           name="credit_units"
                           min="1"
                           value="{{ old('credit_units', $course->credit_units) }}"
                           required
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="mb-6">
                    <label class="block font-semibold text-slate-700 mb-2">
                        Assigned Lecturer
                    </label>

                    <input type="text"
                           value="{{ $course->lecturer->full_name ?? 'Not assigned' }}"
                           disabled
                           class="w-full bg-slate-100 border border-slate-300 rounded-lg px-4 py-3 text-slate-500">

                    <p class="text-xs text-slate-500 mt-2">
                        Only an administrator can change the assigned lecturer.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-6 py-3 rounded-lg">
                        Save Changes
                    </button>

                    <a href="{{ route('lecturer.courses.show', $course->id) }}"
                       class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold px-6 py-3 rounded-lg">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </main>

</body>
</html>
