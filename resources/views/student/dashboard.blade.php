
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Self-Service Portal — Pearl Horizon University </title>
    <link rel="icon" type="image/jpeg" href="{{ asset('logo/logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-100 text-slate-800 font-sans min-h-screen flex flex-col">

    <!-- Top Navigation Bar -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-8 py-4 flex flex-wrap justify-between items-center gap-4">

            <a href="{{ route('student.dashboard') }}"class="flex items-center gap-3">
                <img src="{{ asset('logo/logo.jpg') }}" alt="PHU Logo"
                     class="h-10 w-10 rounded-full border border-slate-200 object-cover">

                <div>
                    <h1 class="text-base font-bold text-slate-900 leading-tight">
                        Pearl Horizon University
                    </h1>
                    <p class="text-xs text-teal-700 font-semibold">
                        Student Self-Service Portal
                    </p>
                </div>
            </a>

            <div class="flex items-center gap-5">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-semibold text-slate-900">
                        {{ $student?->full_name ?? Auth::user()->name }}
                    </p>
                    <p class="text-xs text-slate-500 font-mono">
                        {{ $student?->reg_no ?? 'Student' }}
                    </p>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                            class="text-xs font-semibold text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md border border-red-200 transition-colors flex items-center gap-1.5">
                        <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto px-8 py-8 space-y-6">

        <!-- Flash Alerts -->
        @if (session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm flex items-center gap-2">
                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <i data-lucide="alert-circle" class="w-4 h-4 text-red-600 shrink-0"></i>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        @if (!$student)

            <!-- Missing Student Record Warning -->
            <div class="p-5 bg-amber-50 border border-amber-200 text-amber-800 rounded-lg">
                <h2 class="font-bold text-base">Student Record Not Linked</h2>
                <p class="text-sm mt-1">
                    Your login account is not linked to a student record.
                    Please contact the university administrator to update your account.
                </p>
            </div>

        @else

            <!-- Student Information Banner -->
            <section class="bg-slate-800 text-white rounded-lg p-6 sm:p-7 shadow-sm">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">

                    <div>
                        <span class="inline-block px-2.5 py-0.5 bg-slate-700 text-teal-300 text-xs font-semibold rounded mb-2">
                            Academic Year 2026/2027
                        </span>

                        <h2 class="text-2xl font-bold">
                            Welcome, {{ $student->full_name }}
                        </h2>

                        <p class="text-slate-300 text-sm mt-1">
                            {{ $student->program }}
                        </p>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-slate-700 border border-slate-600 rounded-lg p-4 min-w-32 text-center">
                            <p class="text-2xl font-bold text-white">
                                {{ $registrations->count() }}
                            </p>
                            <p class="text-xs text-slate-300 mt-1">Enrolled Courses</p>
                        </div>

                        <div class="bg-slate-700 border border-slate-600 rounded-lg p-4 min-w-32 text-center">
                            <p class="text-2xl font-bold text-teal-300">
                                {{ $totalCreditUnits }}
                            </p>
                            <p class="text-xs text-slate-300 mt-1">Credit Units</p>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Registered Courses Section -->
            <section class="bg-white border border-slate-200 rounded-lg shadow-sm p-6 space-y-4">

                <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                    <div>
                        <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                            <i data-lucide="book-open" class="w-4 h-4 text-teal-600"></i>
                            My Registered Courses
                        </h3>

                        <p class="text-xs text-slate-500 mt-0.5">
                            Courses you are currently registered for this academic term.
                        </p>
                    </div>

                    <span class="text-xs font-semibold px-2.5 py-1 bg-teal-50 text-teal-700 rounded border border-teal-200">
                        {{ $totalCreditUnits }} Total CUs
                    </span>
                </div>

                @if ($registrations->isEmpty())

                    <div class="py-8 text-center text-slate-400">
                        <p class="text-sm">You have not registered for any courses yet.</p>
                        <p class="text-xs text-slate-400 mt-1">
                            Select an available course below to register.
                        </p>
                    </div>

                @else

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead class="bg-slate-50 border-b border-slate-200 text-slate-600">
                                <tr>
                                    <th class="py-2.5 px-4 font-semibold">Course Code</th>
                                    <th class="py-2.5 px-4 font-semibold">Course Name</th>
                                    <th class="py-2.5 px-4 font-semibold">Credit Units</th>
                                    <th class="py-2.5 px-4 font-semibold">Semester</th>
                                    <th class="py-2.5 px-4 font-semibold">Lecturer</th>
                                    <th class="py-2.5 px-4 text-right font-semibold">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                @foreach ($registrations as $reg)
                                    <tr class="hover:bg-slate-50">
                                        <td class="py-3 px-4 font-mono font-bold text-slate-900">
                                            {{ $reg->course?->course_code ?? 'N/A' }}
                                        </td>

                                        <td class="py-3 px-4 font-medium text-slate-900">
                                            {{ $reg->course?->course_name ?? 'Course unavailable' }}
                                        </td>

                                        <td class="py-3 px-4 text-slate-600">
                                            {{ $reg->course?->credit_units ?? 0 }} CU
                                        </td>

                                        <td class="py-3 px-4 text-slate-600">
                                            {{ $reg->semester }}
                                        </td>

                                        <td class="py-3 px-4 text-slate-600">
                                            {{ $reg->course?->lecturer?->full_name ?? 'Assigned Faculty' }}
                                        </td>

                                        <td class="py-3 px-4 text-right">
                                            <form action="{{ route('student.drop-course', $reg->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to drop this course?');"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-700 font-semibold text-xs">
                                                    Drop Course
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif
            </section>

            <!-- Available Courses Section -->
            <section class="bg-white border border-slate-200 rounded-lg shadow-sm p-6 space-y-4">

                <div class="border-b border-slate-200 pb-3">
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <i data-lucide="plus-circle" class="w-4 h-4 text-teal-600"></i>
                        Available Course Units for Registration
                    </h3>

                    <p class="text-xs text-slate-500 mt-0.5">
                        Select and register for remaining university modules.
                    </p>
                </div>

                @if ($availableCourses->isEmpty())

                    <p class="py-6 text-center text-slate-400 text-sm">
                        You are registered for all currently available courses!
                    </p>

                @else

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead class="bg-slate-50 border-b border-slate-200 text-slate-600">
                                <tr>
                                    <th class="py-2.5 px-4 font-semibold">Code</th>
                                    <th class="py-2.5 px-4 font-semibold">Course Name</th>
                                    <th class="py-2.5 px-4 font-semibold">Credit Units</th>
                                    <th class="py-2.5 px-4 font-semibold">Lecturer</th>
                                    <th class="py-2.5 px-4 text-right font-semibold">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                @foreach ($availableCourses as $course)
                                    <tr class="hover:bg-slate-50">
                                        <td class="py-3 px-4 font-mono font-bold text-slate-900">
                                            {{ $course->course_code }}
                                        </td>

                                        <td class="py-3 px-4 font-medium text-slate-900">
                                            {{ $course->course_name }}
                                        </td>

                                        <td class="py-3 px-4 text-slate-600">
                                            {{ $course->credit_units }} CU
                                        </td>

                                        <td class="py-3 px-4 text-slate-600">
                                            {{ $course->lecturer?->full_name ?? 'Faculty Assigned' }}
                                        </td>

                                        <td class="py-3 px-4 text-right">
                                            <form action="{{ route('student.register-course') }}"
                                                  method="POST"
                                                  class="inline">
                                                @csrf

                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                <input type="hidden" name="semester" value="Semester I">

                                                <button type="submit"
                                                        class="px-3 py-1.5 bg-teal-600 hover:bg-teal-700 text-white rounded text-xs font-semibold shadow-sm transition-colors">
                                                    Register
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif
            </section>

        @endif

    </main>

    <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} Pearl Horizon University. All rights reserved.</p>
    </footer>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
