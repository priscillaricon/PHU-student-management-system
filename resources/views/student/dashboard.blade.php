<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard — Pearl Horizon University</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('logo/logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex flex-col">

    {{-- Student Navigation --}}
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex flex-wrap justify-between items-center gap-4">

            <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3">
                <img src="{{ asset('logo/logo.jpg') }}"
                     alt="PHU Logo"
                     class="h-12 w-12 rounded-full border border-slate-200 object-cover">

                <div>
                    <h1 class="text-lg font-extrabold text-slate-900">
                        Pearl Horizon University
                    </h1>
                    <p class="text-xs font-semibold text-emerald-600">
                        Student Self-Service Portal
                    </p>
                </div>
            </a>

            <div class="flex items-center gap-4">

                <div class="hidden sm:block text-right">
                    <p class="text-sm font-semibold text-slate-900">
                        {{ $student?->full_name ?? Auth::user()->name }}
                    </p>
                    <p class="text-xs text-slate-500 font-mono">
                        {{ $student?->reg_no ?? 'Student' }}
                    </p>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 border border-red-200 text-sm font-semibold transition">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                        Sign Out
                    </button>
                </form>

            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 py-8 space-y-8">

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center gap-3">
                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl space-y-2">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        @if (!$student)

            {{-- Missing Student Record --}}
            <section class="bg-amber-50 border border-amber-200 rounded-2xl p-8">
                <div class="flex items-center gap-3">
                    <i data-lucide="alert-triangle" class="w-7 h-7 text-amber-600"></i>
                    <h2 class="text-xl font-bold text-amber-900">
                        Student Record Not Linked
                    </h2>
                </div>

                <p class="text-sm text-amber-800 mt-3">
                    Your login account is not linked to a student record.
                    Please contact the university administrator to update your account.
                </p>
            </section>

        @else

            {{-- Welcome Banner --}}
            <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-slate-900 text-white shadow-xl">

                <div class="absolute -right-20 -top-20 w-80 h-80 bg-emerald-400/10 rounded-full blur-3xl"></div>

                <div class="relative p-6 sm:p-10">

                    <div class="flex flex-col lg:flex-row justify-between gap-8">

                        <div>
                            <span class="inline-flex items-center gap-2 bg-white/10 border border-white/10 text-emerald-200 rounded-full px-4 py-2 text-xs font-semibold">
                                <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                                ACADEMIC YEAR 2026/2027
                            </span>

                            <h2 class="text-3xl sm:text-4xl font-bold mt-5">
                                Welcome, {{ $student->full_name }}
                            </h2>

                            <p class="text-emerald-100/80 mt-3">
                                Student Self-Service Dashboard
                            </p>

                            <p class="text-slate-300 text-sm mt-2">
                                Manage your academic courses and monitor your registration.
                            </p>
                        </div>

                        {{-- Student Profile --}}
                        <div class="flex items-center gap-4 bg-white/10 border border-white/10 rounded-2xl p-5 self-start lg:self-center min-w-64">

                            <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 flex items-center justify-center">
                                <i data-lucide="user-round" class="w-7 h-7 text-emerald-300"></i>
                            </div>

                            <div>
                                <p class="text-xs text-emerald-200">Student Profile</p>
                                <p class="font-semibold mt-1">{{ $student->full_name }}</p>
                                <p class="text-xs text-slate-300 mt-1">{{ $student->reg_no }}</p>
                            </div>

                        </div>

                    </div>

                    {{-- Academic Statistics --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8 max-w-2xl">

                        <div class="bg-white/10 border border-white/10 rounded-2xl p-5 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-blue-400/20 flex items-center justify-center">
                                <i data-lucide="book-open" class="w-6 h-6 text-blue-200"></i>
                            </div>

                            <div>
                                <p class="text-3xl font-bold">{{ $registrations->count() }}</p>
                                <p class="text-sm text-slate-300 mt-1">Enrolled Courses</p>
                            </div>
                        </div>

                        <div class="bg-white/10 border border-white/10 rounded-2xl p-5 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-amber-400/20 flex items-center justify-center">
                                <i data-lucide="layers" class="w-6 h-6 text-amber-200"></i>
                            </div>

                            <div>
                                <p class="text-3xl font-bold text-amber-200">{{ $totalCreditUnits }}</p>
                                <p class="text-sm text-slate-300 mt-1">Total Credit Units</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

            {{-- Registered Courses --}}
            <section class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="p-6 sm:p-8 border-b border-slate-100 flex flex-wrap justify-between items-center gap-4">

                    <div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                                <i data-lucide="book-open-check" class="w-5 h-5 text-emerald-600"></i>
                            </div>

                            <h3 class="text-xl font-bold text-slate-800">
                                My Registered Courses
                            </h3>
                        </div>

                        <p class="text-sm text-slate-500 mt-3">
                            Courses you are currently registered for this academic term.
                        </p>
                    </div>

                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-xl px-4 py-2 text-sm font-semibold">
                        {{ $totalCreditUnits }} Total CUs
                    </span>

                </div>

                @if ($registrations->isEmpty())

                    <div class="py-12 text-center px-6">

                        <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto">
                            <i data-lucide="book-open" class="w-8 h-8 text-slate-400"></i>
                        </div>

                        <h3 class="font-semibold text-slate-800 mt-4">
                            No Registered Courses
                        </h3>

                        <p class="text-sm text-slate-500 mt-2">
                            Select an available course below to register.
                        </p>

                    </div>

                @else

                    <div class="overflow-x-auto">

                        <table class="w-full text-left text-sm">

                            <thead>
                                <tr class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wider">
                                    <th class="px-5 py-4 font-semibold">Course Code</th>
                                    <th class="px-5 py-4 font-semibold">Course Name</th>
                                    <th class="px-5 py-4 font-semibold">Credit Units</th>
                                    <th class="px-5 py-4 font-semibold">Semester</th>
                                    <th class="px-5 py-4 font-semibold">Lecturer</th>
                                    <th class="px-5 py-4 text-right font-semibold">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @foreach ($registrations as $reg)

                                    <tr class="hover:bg-emerald-50/40 transition">

                                        <td class="px-5 py-4 font-mono font-bold text-emerald-700 whitespace-nowrap">
                                            {{ $reg->course?->course_code ?? 'N/A' }}
                                        </td>

                                        <td class="px-5 py-4 font-medium text-slate-800 whitespace-nowrap">
                                            {{ $reg->course?->course_name ?? 'Course unavailable' }}
                                        </td>

                                        <td class="px-5 py-4 text-slate-600">
                                            {{ $reg->course?->credit_units ?? 0 }} CU
                                        </td>

                                        <td class="px-5 py-4 text-slate-600 whitespace-nowrap">
                                            {{ $reg->semester }}
                                        </td>

                                        <td class="px-5 py-4 text-slate-600 whitespace-nowrap">
                                            {{ $reg->course?->lecturer?->full_name ?? 'Assigned Faculty' }}
                                        </td>

                                        <td class="px-5 py-4 text-right">

                                            <form action="{{ route('student.drop-course', $reg->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to drop this course?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 font-semibold text-xs">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
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

            {{-- Available Courses --}}
            <section class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="p-6 sm:p-8 border-b border-slate-100">

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <i data-lucide="plus-circle" class="w-5 h-5 text-emerald-600"></i>
                        </div>

                        <h3 class="text-xl font-bold text-slate-800">
                            Available Course Units
                        </h3>
                    </div>

                    <p class="text-sm text-slate-500 mt-3">
                        Select and register for available university courses.
                    </p>

                </div>

                @if ($availableCourses->isEmpty())

                    <div class="py-12 text-center px-6">

                        <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto">
                            <i data-lucide="check-circle" class="w-8 h-8 text-emerald-600"></i>
                        </div>

                        <p class="font-semibold text-slate-800 mt-4">
                            All Courses Registered
                        </p>

                        <p class="text-sm text-slate-500 mt-2">
                            You are registered for all currently available courses!
                        </p>

                    </div>

                @else

                    <div class="overflow-x-auto">

                        <table class="w-full text-left text-sm">

                            <thead>
                                <tr class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wider">
                                    <th class="px-5 py-4 font-semibold">Course Code</th>
                                    <th class="px-5 py-4 font-semibold">Course Name</th>
                                    <th class="px-5 py-4 font-semibold">Credit Units</th>
                                    <th class="px-5 py-4 font-semibold">Lecturer</th>
                                    <th class="px-5 py-4 text-right font-semibold">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @foreach ($availableCourses as $course)

                                    <tr class="hover:bg-emerald-50/40 transition">

                                        <td class="px-5 py-4 font-mono font-bold text-emerald-700 whitespace-nowrap">
                                            {{ $course->course_code }}
                                        </td>

                                        <td class="px-5 py-4 font-medium text-slate-800 whitespace-nowrap">
                                            {{ $course->course_name }}
                                        </td>

                                        <td class="px-5 py-4 text-slate-600">
                                            {{ $course->credit_units }} CU
                                        </td>

                                        <td class="px-5 py-4 text-slate-600 whitespace-nowrap">
                                            {{ $course->lecturer?->full_name ?? 'Faculty Assigned' }}
                                        </td>

                                        <td class="px-5 py-4 text-right">

                                            <form action="{{ route('student.register-course') }}"
                                                  method="POST"
                                                  class="inline">
                                                @csrf

                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                <input type="hidden" name="semester" value="Semester I">

                                                <button type="submit"
                                                        class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-semibold shadow-sm transition">
                                                    <i data-lucide="plus" class="w-4 h-4"></i>
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

    {{-- Footer --}}
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 mt-auto">

        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col sm:flex-row justify-between items-center gap-3">

            <div class="flex items-center gap-2">
                <img src="{{ asset('logo/logo.jpg') }}"
                     alt="PHU Logo"
                     class="w-8 h-8 rounded-full object-cover">

                <span class="text-sm font-semibold text-white">
                    Pearl Horizon University
                </span>
            </div>

            <p class="text-xs text-center">
                &copy; {{ date('Y') }} Pearl Horizon University. All rights reserved.
            </p>

            <span class="text-xs text-emerald-400">
                Student Self-Service System
            </span>

        </div>

    </footer>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
