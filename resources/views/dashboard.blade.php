
@extends('layouts.main')

@section('title', 'System Dashboard')

@section('content')

<div class="min-h-screen bg-slate-50">

    <!-- Dashboard Navigation -->
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-4">

            <nav class="flex flex-wrap items-center gap-6 text-sm font-semibold">

                <a href="{{ route('dashboard') }}"
                   class="text-emerald-600 hover:text-emerald-700">
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}"
                   class="text-slate-600 hover:text-emerald-600">
                    Students
                </a>

                <a href="{{ route('courses.index') }}"
                   class="text-slate-600 hover:text-emerald-600">
                    Courses
                </a>

                <a href="{{ route('registration') }}"
                   class="text-slate-600 hover:text-emerald-600">
                    Course Registrations
                </a>

                <a href="{{ route('lecturer-dashboard') }}"
                   class="text-slate-600 hover:text-emerald-600">
                    Lecturer Dashboard
                </a>

                <a href="{{ route('student-login') }}"
                   class="text-slate-600 hover:text-emerald-600">
                    Student Portal
                </a>

                <a href="{{ route('login') }}"
                   class="text-slate-600 hover:text-emerald-600">
                    Staff Portal
                </a>

            </nav>

        </div>
    </div>


    <!-- Dashboard Content -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        <!-- Administrator Information -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>
                <h1 class="text-3xl font-extrabold text-slate-900">
                    System Dashboard
                </h1>

                <p class="text-slate-500 mt-2">
                    Welcome to Pearl Horizon University Management System.
                    Manage academic records, courses, students and registrations.
                </p>
            </div>

            <div class="flex items-center gap-3">

                <div class="h-12 w-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold">
                    PN
                </div>

                <div>
                    <p class="font-bold text-slate-900">
                        Administrator
                    </p>

                    <p class="text-sm text-slate-500">
                        System Administrator
                    </p>
                </div>

            </div>

        </div>


        <!-- Dynamic Statistics -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

            <!-- Total Students -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">

                <p class="text-sm font-medium text-slate-500">
                    Total Students
                </p>

                <h2 class="text-3xl font-extrabold text-slate-900 mt-3">
                    {{ number_format($totalStudents ?? 0) }}
                </h2>

                <p class="text-xs text-emerald-600 mt-2">
                    Registered student records
                </p>

            </div>


            <!-- Total Courses -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">

                <p class="text-sm font-medium text-slate-500">
                    Total Courses
                </p>

                <h2 class="text-3xl font-extrabold text-slate-900 mt-3">
                    {{ number_format($totalCourses ?? 0) }}
                </h2>

                <p class="text-xs text-emerald-600 mt-2">
                    Available academic courses
                </p>

            </div>


            <!-- Total Registrations -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">

                <p class="text-sm font-medium text-slate-500">
                    Registrations
                </p>

                <h2 class="text-3xl font-extrabold text-slate-900 mt-3">
                    {{ number_format($totalRegistrations ?? 0) }}
                </h2>

                <p class="text-xs text-emerald-600 mt-2">
                    Student course enrolments
                </p>

            </div>


            <!-- Total Lecturers -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">

                <p class="text-sm font-medium text-slate-500">
                    Lecturers
                </p>

                <h2 class="text-3xl font-extrabold text-slate-900 mt-3">
                    {{ number_format($totalLecturers ?? 0) }}
                </h2>

                <p class="text-xs text-emerald-600 mt-2">
                    Registered lecturers
                </p>

            </div>

        </div>


        <!-- University Management -->
        <section>

            <div class="mb-6">

                <h2 class="text-2xl font-bold text-slate-900">
                    University Management
                </h2>

                <p class="text-slate-500 mt-2">
                    Access and manage the university's academic activities and services.
                </p>

            </div>


            <!-- Management Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                <!-- Students -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition">

                    <h3 class="text-lg font-bold text-slate-900 mb-3">
                        Manage Students
                    </h3>

                    <p class="text-sm text-slate-500 mb-6">
                        Add new students, view student profiles, update student information and manage student records.
                    </p>

                    <a href="{{ route('students.index') }}"
                       class="inline-block px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Students
                    </a>

                </div>


                <!-- Courses -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition">

                    <h3 class="text-lg font-bold text-slate-900 mb-3">
                        Manage Courses
                    </h3>

                    <p class="text-sm text-slate-500 mb-6">
                        Create courses, view available academic courses, update course information and manage assigned lecturers.
                    </p>

                    <a href="{{ route('courses.index') }}"
                       class="inline-block px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Courses
                    </a>

                </div>


                <!-- Registration -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition">

                    <h3 class="text-lg font-bold text-slate-900 mb-3">
                        Course Registration
                    </h3>

                    <p class="text-sm text-slate-500 mb-6">
                        Register students for courses, view registration details and manage course enrolments.
                    </p>

                    <a href="{{ route('registration') }}"
                       class="inline-block px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Registration
                    </a>

                </div>


                <!-- Lecturer Dashboard -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition">

                    <h3 class="text-lg font-bold text-slate-900 mb-3">
                        Lecturer Dashboard
                    </h3>

                    <p class="text-sm text-slate-500 mb-6">
                        View lecturer information, assigned courses and student enrolments.
                    </p>

                    <a href="{{ route('lecturer-dashboard') }}"
                       class="inline-block px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Lecturer Dashboard
                    </a>

                </div>


                <!-- Student Portal -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition">

                    <h3 class="text-lg font-bold text-slate-900 mb-3">
                        Student Portal
                    </h3>

                    <p class="text-sm text-slate-500 mb-6">
                        Access the student portal and student-related services.
                    </p>

                    <a href="{{ route('student-login') }}"
                       class="inline-block px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Student Portal
                    </a>

                </div>


                <!-- Staff Portal -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition">

                    <h3 class="text-lg font-bold text-slate-900 mb-3">
                        Staff Portal
                    </h3>

                    <p class="text-sm text-slate-500 mb-6">
                        Access the university staff portal and administrative services.
                    </p>

                    <a href="{{ route('login') }}"
                       class="inline-block px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                        Open Staff Portal
                    </a>

                </div>

            </div>

        </section>

    </main>

</div>

@endsection

