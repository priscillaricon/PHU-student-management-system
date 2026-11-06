<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Assigned Courses | PHU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">

    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Pearl Horizon University</h1>
                <p class="text-sm text-slate-500">Lecturer Portal</p>
            </div>

            <a href="{{ route('lecturer-dashboard') }}"
               class="text-blue-600 hover:underline">
                Back to Dashboard
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10">

        <div class="mb-8">
            <h2 class="text-3xl font-bold text-slate-800">My Assigned Courses</h2>
            <p class="text-slate-600 mt-2">
                View and manage the courses assigned to you.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($courses->count() > 0)

            <div class="bg-white rounded-xl shadow-sm overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-slate-600 uppercase text-sm">
                            <tr>
                                <th class="px-6 py-4">Course Code</th>
                                <th class="px-6 py-4">Course Name</th>
                                <th class="px-6 py-4">Credit Units</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @foreach($courses as $course)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-4 font-semibold text-slate-800">
                                        {{ $course->course_code }}
                                    </td>

                                    <td class="px-6 py-4 text-slate-700">
                                        {{ $course->course_name }}
                                    </td>

                                    <td class="px-6 py-4 text-slate-700">
                                        {{ $course->credit_units }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-3">
                                            <a href="{{ route('lecturer.courses.show', $course->id) }}"
                                               class="text-blue-600 hover:underline">
                                                View
                                            </a>

                                            <a href="{{ route('lecturer.courses.edit', $course->id) }}"
                                               class="text-green-600 hover:underline">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4">
                    {{ $courses->links() }}
                </div>

            </div>

        @else

            <div class="bg-white rounded-xl shadow-sm p-10 text-center">
                <h3 class="text-xl font-semibold text-slate-800">
                    No Assigned Courses
                </h3>

                <p class="text-slate-500 mt-2">
                    You currently have no courses assigned to your lecturer account.
                    Contact the administrator for assistance.
                </p>
            </div>

        @endif

    </main>

</body>
</html>
