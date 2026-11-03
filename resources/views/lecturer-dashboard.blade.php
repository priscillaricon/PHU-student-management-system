
@extends('layouts.main')

@section('title', 'Lecturer Dashboard')

@section('content')

@include('layouts.header')

<main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 py-8 space-y-8">

    {{-- Dashboard Welcome --}}
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-slate-900 text-white shadow-xl">

        <div class="absolute -right-16 -top-16 w-72 h-72 bg-emerald-400/10 rounded-full blur-3xl"></div>

        <div class="relative p-6 sm:p-10">

            <div class="flex flex-col lg:flex-row justify-between gap-8">

                <div>
                    <div class="inline-flex items-center gap-2 bg-white/10 border border-white/10 rounded-full px-4 py-2 text-xs font-semibold text-emerald-200 mb-5">
                        <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                        PEARL HORIZON UNIVERSITY
                    </div>

                    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight">
                        Lecturer Dashboard
                    </h1>

                    <p class="text-emerald-100/80 mt-3 text-sm sm:text-base">
                        Welcome back,
                        <span class="font-semibold text-white">{{ $lecturer?->full_name ?? 'Lecturer' }}</span>.
                    </p>

                    <p class="text-slate-300 text-sm mt-2 max-w-xl">
                        Manage your assigned courses and monitor students registered for your classes.
                    </p>
                </div>

                <div class="flex items-center gap-4 bg-white/10 border border-white/10 rounded-2xl p-5 self-start lg:self-center min-w-64">

                    <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 flex items-center justify-center">
                        <i data-lucide="user-round" class="w-7 h-7 text-emerald-300"></i>
                    </div>

                    <div>
                        <p class="text-xs text-emerald-200">Lecturer Account</p>
                        <p class="font-semibold mt-1">{{ $lecturer?->full_name ?? 'Lecturer' }}</p>
                        <p class="text-xs text-slate-300 mt-1">Academic Staff</p>
                    </div>

                </div>

            </div>

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8 max-w-2xl">

                <div class="bg-white/10 border border-white/10 rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-400/20 flex items-center justify-center">
                        <i data-lucide="book-open" class="w-6 h-6 text-blue-200"></i>
                    </div>

                    <div>
                        <p class="text-3xl font-bold">{{ $courses->count() }}</p>
                        <p class="text-sm text-slate-300 mt-1">Assigned Courses</p>
                    </div>
                </div>

                <div class="bg-white/10 border border-white/10 rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-400/20 flex items-center justify-center">
                        <i data-lucide="users" class="w-6 h-6 text-amber-200"></i>
                    </div>

                    <div>
                        <p class="text-3xl font-bold">{{ $totalStudents }}</p>
                        <p class="text-sm text-slate-300 mt-1">Unique Students</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- Assigned Courses --}}
    <section class="space-y-5">

        <div class="flex flex-wrap justify-between items-center gap-3">
            <div>
                <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                    <i data-lucide="book-open" class="w-5 h-5 text-emerald-600"></i>
                    My Assigned Courses
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Select a course to view its registered students.
                </p>
            </div>

            <span class="bg-emerald-50 text-emerald-700 px-3 py-2 rounded-xl text-sm font-semibold">
                {{ $courses->count() }} Courses
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

            @forelse ($courses as $course)

                <article class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md hover:border-emerald-200 transition duration-200 flex flex-col">

                    <div class="flex justify-between items-start gap-3">

                        <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <i data-lucide="book-open-check" class="w-6 h-6 text-emerald-600"></i>
                        </div>

                        <span class="bg-emerald-50 text-emerald-700 rounded-lg px-3 py-1.5 text-xs font-bold">
                            {{ $course->course_code }}
                        </span>

                    </div>

                    <h3 class="text-lg font-bold text-slate-800 mt-5">
                        {{ $course->course_name }}
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-6">
                        {{ $course->description ?: 'No course description available.' }}
                    </p>

                    <div class="grid grid-cols-2 gap-3 mt-5">

                        <div class="bg-slate-50 rounded-xl p-3">
                            <p class="text-xs text-slate-500">Credit Units</p>
                            <p class="text-xl font-bold text-slate-800 mt-1">
                                {{ $course->credit_units }}
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-3">
                            <p class="text-xs text-slate-500">Students</p>
                            <p class="text-xl font-bold text-slate-800 mt-1">
                                {{ $course->students->count() }}
                            </p>
                        </div>

                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100">

                        <a
                            href="{{ route('lecturer-dashboard', ['course_id' => $course->id]) }}"
                            class="flex items-center justify-center gap-2 w-full bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl px-4 py-3 text-sm font-semibold transition"
                        >
                            View Registered Students
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>

                    </div>

                </article>

            @empty

                <div class="col-span-full bg-white border border-slate-200 rounded-2xl p-10 text-center">

                    <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center mx-auto">
                        <i data-lucide="book-open" class="w-8 h-8 text-slate-400"></i>
                    </div>

                    <h3 class="font-semibold text-slate-800 mt-4">No Assigned Courses</h3>

                    <p class="text-sm text-slate-500 mt-2">
                        No courses are currently assigned to this lecturer.
                    </p>

                </div>

            @endforelse

        </div>

    </section>

    {{-- Registered Student Roster --}}
    <section class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="p-6 sm:p-8 border-b border-slate-100">

            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-5">

                <div>
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <i data-lucide="users" class="w-5 h-5 text-emerald-600"></i>
                        </div>

                        <h2 class="text-xl font-bold text-slate-800">
                            Registered Student Roster
                        </h2>
                    </div>

                    <p class="text-sm text-slate-500 mt-3">

                        @if ($selectedCourse)

                            <span class="font-semibold text-emerald-700">
                                {{ $selectedCourse->course_code }}
                            </span>
                            —
                            {{ $selectedCourse->course_name }}

                        @else

                            Select a course above to view its students.

                        @endif

                    </p>
                </div>

                {{-- Search Form --}}
                @if ($selectedCourse)

                    <form
                        method="GET"
                        action="{{ route('lecturer-dashboard') }}"
                        class="flex flex-col sm:flex-row gap-2 w-full lg:w-auto"
                    >

                        <input
                            type="hidden"
                            name="course_id"
                            value="{{ $selectedCourse->id }}"
                        >

                        <div class="relative flex-1">

                            <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search students..."
                                class="w-full sm:w-64 border border-slate-200 rounded-xl pl-9 pr-3 py-3 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                            >

                        </div>

                        <button
                            type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl px-5 py-3 text-sm font-semibold transition"
                        >
                            Search
                        </button>

                        @if (request('search'))

                            <a
                                href="{{ route('lecturer-dashboard', ['course_id' => $selectedCourse->id]) }}"
                                class="border border-slate-200 hover:bg-slate-50 rounded-xl px-4 py-3 text-sm text-center font-medium"
                            >
                                Clear
                            </a>

                        @endif

                    </form>

                @endif

            </div>

        </div>

        {{-- Student Table --}}
        @if ($selectedCourse)

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead>
                        <tr class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wider">

                            <th class="px-6 py-4 font-semibold">Registration Number</th>
                            <th class="px-6 py-4 font-semibold">Student Name</th>
                            <th class="px-6 py-4 font-semibold">Program</th>
                            <th class="px-6 py-4 font-semibold">Status</th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($students as $student)

                            <tr class="hover:bg-emerald-50/40 transition">

                                <td class="px-6 py-4 font-semibold text-slate-700 whitespace-nowrap">
                                    {{ $student->reg_no }}
                                </td>

                                <td class="px-6 py-4 text-slate-700 font-medium whitespace-nowrap">
                                    {{ $student->full_name }}
                                </td>

                                <td class="px-6 py-4 text-slate-500 whitespace-nowrap">
                                    {{ $student->program }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 rounded-full px-3 py-1.5 text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                        Registered
                                    </span>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">

                                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center mx-auto">
                                        <i data-lucide="users" class="w-6 h-6 text-slate-400"></i>
                                    </div>

                                    <p class="font-medium text-slate-700 mt-3">
                                        No Students Found
                                    </p>

                                    <p class="text-slate-500 text-sm mt-1">
                                        No registered students match this course or search.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 text-xs text-slate-500">
                Student records displayed for the selected course.
            </div>

        @else

            <div class="p-10 text-center">

                <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center mx-auto">
                    <i data-lucide="clipboard-list" class="w-8 h-8 text-emerald-600"></i>
                </div>

                <h3 class="font-semibold text-slate-800 mt-4">
                    Select a Course
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Choose View Registered Students on a course card to open its student roster.
                </p>

            </div>

        @endif

    </section>

</main>

@include('layouts.footer')

@endsection
