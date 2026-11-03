@extends('layouts.main')

@section('title', 'System Dashboard')

@section('content')

@include('layouts.header')

<main class="min-h-screen bg-slate-50">

    {{-- Dashboard Navigation --}}
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <nav class="flex flex-wrap items-center gap-3 text-sm font-semibold">

                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 rounded-lg bg-emerald-50 text-emerald-700">
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}"
                   class="px-4 py-2 rounded-lg text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition">
                    Students
                </a>

                <a href="{{ route('courses.index') }}"
                   class="px-4 py-2 rounded-lg text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition">
                    Courses
                </a>

                <a href="{{ route('registration') }}"
                   class="px-4 py-2 rounded-lg text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition">
                    Registrations
                </a>

                <a href="{{ route('lecturer-dashboard') }}"
                   class="px-4 py-2 rounded-lg text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition">
                    Lecturers
                </a>

            </nav>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-5 sm:px-6 py-10">

        {{-- Welcome Section --}}
        <section class="relative overflow-hidden bg-gradient-to-r from-emerald-950 via-emerald-900 to-slate-900 rounded-3xl p-8 sm:p-10 mb-10 shadow-xl">

            <div class="absolute right-0 top-0 w-64 h-64 bg-emerald-400 rounded-full blur-3xl opacity-10"></div>

            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">

                <div>
                    <span class="inline-flex px-3 py-1 rounded-full bg-white/10 text-emerald-300 text-xs font-semibold mb-4">
                        UNIVERSITY ADMINISTRATION
                    </span>

                    <h1 class="text-3xl sm:text-4xl font-extrabold text-white">
                        System Dashboard
                    </h1>

                    <p class="text-emerald-100/80 mt-3 max-w-2xl text-sm sm:text-base">
                        Welcome to Pearl Horizon University Management System.
                        Manage students, courses, lecturers and academic registrations
                        from one central dashboard.
                    </p>
                </div>

                <div class="flex items-center gap-4 bg-white/10 border border-white/10 rounded-2xl p-4">

                    <div class="h-14 w-14 rounded-full bg-emerald-400 text-emerald-950 flex items-center justify-center font-extrabold text-lg">
                        PN
                    </div>

                    <div>
                        <p class="font-bold text-white">Administrator</p>
                        <p class="text-xs text-emerald-200">System Administrator</p>
                    </div>

                </div>

            </div>
        </section>

        {{-- Statistics --}}
        <section class="mb-12">

            <div class="mb-6">
                <h2 class="text-xl font-bold text-slate-900">
                    University Overview
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Summary of records currently available in the system.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                {{-- Students --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="flex justify-between items-center">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <i data-lucide="users" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Students</span>
                    </div>

                    <p class="text-sm text-slate-500 mt-5">Total Students</p>

                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        {{ number_format($totalStudents ?? 0) }}
                    </h2>

                    <p class="text-xs text-slate-400 mt-2">Registered student records</p>
                </div>

                {{-- Courses --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="flex justify-between items-center">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i data-lucide="book-open" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Courses</span>
                    </div>

                    <p class="text-sm text-slate-500 mt-5">Total Courses</p>

                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        {{ number_format($totalCourses ?? 0) }}
                    </h2>

                    <p class="text-xs text-slate-400 mt-2">Academic course records</p>
                </div>

                {{-- Registrations --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="flex justify-between items-center">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                            <i data-lucide="clipboard-check" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-semibold text-amber-600 bg-amber-50 px-3 py-1 rounded-full">Enrolments</span>
                    </div>

                    <p class="text-sm text-slate-500 mt-5">Registrations</p>

                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        {{ number_format($totalRegistrations ?? 0) }}
                    </h2>

                    <p class="text-xs text-slate-400 mt-2">Student course enrolments</p>
                </div>

                {{-- Lecturers --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="flex justify-between items-center">
                        <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                            <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Faculty</span>
                    </div>

                    <p class="text-sm text-slate-500 mt-5">Total Lecturers</p>

                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        {{ number_format($totalLecturers ?? 0) }}
                    </h2>

                    <p class="text-xs text-slate-400 mt-2">Registered lecturer records</p>
                </div>

            </div>
        </section>

        {{-- Management Section --}}
        <section>

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-slate-900">
                    University Management
                </h2>

                <p class="text-slate-500 text-sm mt-2">
                    Access the university's academic management tools and services.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Students --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-5">
                        <i data-lucide="users-round" class="w-6 h-6"></i>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900">Manage Students</h3>

                    <p class="text-sm text-slate-500 mt-3 mb-6">
                        Add students, view profiles, update information and manage student records.
                    </p>

                    <a href="{{ route('students.index') }}"
                       class="inline-flex items-center gap-2 px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Students <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                {{-- Courses --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-5">
                        <i data-lucide="book-open" class="w-6 h-6"></i>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900">Manage Courses</h3>

                    <p class="text-sm text-slate-500 mt-3 mb-6">
                        Create courses, update course information and manage academic offerings.
                    </p>

                    <a href="{{ route('courses.index') }}"
                       class="inline-flex items-center gap-2 px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Courses <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                {{-- Registration --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-5">
                        <i data-lucide="clipboard-check" class="w-6 h-6"></i>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900">Course Registration</h3>

                    <p class="text-sm text-slate-500 mt-3 mb-6">
                        Register students, view registration details and manage course enrolments.
                    </p>

                    <a href="{{ route('registration') }}"
                       class="inline-flex items-center gap-2 px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Registration <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                {{-- Lecturer Dashboard --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-5">
                        <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900">Lecturer Dashboard</h3>

                    <p class="text-sm text-slate-500 mt-3 mb-6">
                        View lecturer information, assigned courses and student enrolments.
                    </p>

                    <a href="{{ route('lecturer-dashboard') }}"
                       class="inline-flex items-center gap-2 px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Lecturers <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                {{-- Student Portal --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center mb-5">
                        <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900">Student Portal</h3>

                    <p class="text-sm text-slate-500 mt-3 mb-6">
                        Access student self-service and student academic services.
                    </p>

                    <a href="{{ route('student-login') }}"
                       class="inline-flex items-center gap-2 px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Student Portal <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                {{-- Staff Portal --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center mb-5">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900">Staff Portal</h3>

                    <p class="text-sm text-slate-500 mt-3 mb-6">
                        Access staff authentication and administrative services.
                    </p>

                    <a href="{{ route('login') }}"
                       class="inline-flex items-center gap-2 px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Staff Portal <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

            </div>

        </section>

    </div>

</main>

@include('layouts.footer')

@endsection
