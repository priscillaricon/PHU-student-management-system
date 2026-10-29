<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Dashboard - Pearl Horizon University</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex flex-col">

<header class="bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-6 py-5 flex flex-wrap justify-between items-center gap-4">
        <div>
            <h1 class="text-xl font-bold text-slate-900">
                Pearl Horizon University
            </h1>
            <p class="text-sm text-indigo-600">Faculty Portal</p>
        </div>

        <div class="text-right">
            <p class="font-semibold">
                {{ $lecturer?->full_name ?? 'Lecturer' }}
            </p>
            <p class="text-sm text-slate-500">
                {{ $lecturer?->department ?? 'Department not specified' }}
            </p>
        </div>
    </div>
</header>

<main class="flex-1 max-w-7xl w-full mx-auto px-6 py-8 space-y-8">

    <section class="bg-gradient-to-r from-indigo-950 to-slate-900 text-white rounded-2xl p-6 sm:p-8">
        <h2 class="text-2xl font-bold">
            Welcome, {{ $lecturer?->full_name ?? 'Lecturer' }}
        </h2>

        <p class="text-slate-300 mt-2">
            View your assigned courses and their registered students.
        </p>

        <div class="flex flex-wrap gap-4 mt-6">
            <div class="bg-white/10 rounded-xl p-4 min-w-36">
                <p class="text-2xl font-bold">{{ $courses->count() }}</p>
                <p class="text-sm text-slate-300">Assigned Courses</p>
            </div>

            <div class="bg-white/10 rounded-xl p-4 min-w-36">
                <p class="text-2xl font-bold">{{ $totalStudents }}</p>
                <p class="text-sm text-slate-300">Unique Students</p>
            </div>
        </div>
    </section>

    <section class="space-y-4">
        <h2 class="text-lg font-bold">My Assigned Courses</h2>

        @forelse ($courses as $course)
            <article class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <div class="flex flex-wrap justify-between gap-4">
                    <div>
                        <span class="text-xs font-bold text-indigo-700 bg-indigo-50 rounded-lg px-3 py-1">
                            {{ $course->course_code }}
                        </span>

                        <h3 class="text-lg font-bold mt-3">
                            {{ $course->course_name }}
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            {{ $course->description ?: 'No course description available.' }}
                        </p>
                    </div>

                    <div class="text-sm text-slate-600">
                        <p>
                            <strong>{{ $course->credit_units }}</strong>
                            Credit Units
                        </p>
                        <p class="mt-2">
                            <strong>{{ $course->students->count() }}</strong>
                            Registered Students
                        </p>
                    </div>
                </div>

                <div class="mt-5">
                    <a
                        href="{{ route('lecturer-dashboard', ['course_id' => $course->id]) }}"
                        class="inline-block bg-indigo-600 text-white rounded-lg px-4 py-2 text-sm hover:bg-indigo-700"
                    >
                        View Registered Students
                    </a>
                </div>
            </article>
        @empty
            <div class="bg-white border border-slate-200 rounded-xl p-6 text-slate-500">
                No courses are currently assigned to this lecturer.
            </div>
        @endforelse
    </section>

    <section class="bg-white border border-slate-200 rounded-xl shadow-sm p-6">
        <div class="flex flex-wrap justify-between items-center gap-4 pb-5 border-b">
            <div>
                <h2 class="text-lg font-bold">Registered Student Roster</h2>

                <p class="text-sm text-slate-500 mt-1">
                    @if ($selectedCourse)
                        {{ $selectedCourse->course_code }} —
                        {{ $selectedCourse->course_name }}
                    @else
                        Select a course to view its students.
                    @endif
                </p>
            </div>

            @if ($selectedCourse)
                <form method="GET" action="{{ route('lecturer-dashboard') }}"
                      class="flex flex-wrap gap-2">
                    <input
                        type="hidden"
                        name="course_id"
                        value="{{ $selectedCourse->id }}"
                    >

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search name or registration number"
                        class="border border-slate-300 rounded-lg px-3 py-2 text-sm"
                    >

                    <button
                        type="submit"
                        class="bg-indigo-600 text-white rounded-lg px-4 py-2 text-sm"
                    >
                        Search
                    </button>

                    @if (request('search'))
                        <a
                            href="{{ route('lecturer-dashboard', ['course_id' => $selectedCourse->id]) }}"
                            class="border rounded-lg px-3 py-2 text-sm"
                        >
                            Clear
                        </a>
                    @endif
                </form>
            @endif
        </div>

        @if ($selectedCourse)
            <div class="overflow-x-auto mt-4">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b text-slate-600">
                            <th class="p-3">Registration Number</th>
                            <th class="p-3">Student Name</th>
                            <th class="p-3">Program</th>
                            <th class="p-3">Registration Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($students as $student)
                            <tr class="hover:bg-slate-50">
                                <td class="p-3 font-semibold">
                                    {{ $student->reg_no }}
                                </td>
                                <td class="p-3">
                                    {{ $student->full_name }}
                                </td>
                                <td class="p-3">
                                    {{ $student->program }}
                                </td>
                                <td class="p-3">
                                    <span class="text-emerald-700 bg-emerald-50 rounded-full px-3 py-1 text-xs">
                                        Registered
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-slate-500">
                                    No registered students found for this course.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-slate-500 py-5">
                No student roster is available because no course has been assigned.
            </p>
        @endif
    </section>

</main>

<footer class="bg-white border-t border-slate-200 py-5 text-center text-sm text-slate-500">
    &copy; {{ date('Y') }} Pearl Horizon University. All rights reserved.
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>
