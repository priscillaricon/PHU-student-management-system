
@extends('layouts.main')

@section('content')

@include('layouts.header')

<main class="flex-1 bg-slate-50">

    <!-- HERO SECTION -->
    <section class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-slate-900 to-slate-950 text-white">

        <!-- Background Decoration -->
        <div class="absolute inset-0 opacity-10"
             style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;">
        </div>

        <div class="absolute -top-32 -right-32 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-24 lg:py-32">

            <div class="grid lg:grid-cols-2 gap-14 items-center">

                <!-- Hero Text -->
                <div class="space-y-7">

                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-400/10 border border-emerald-400/20 text-emerald-300 text-sm font-semibold">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                        Academic Year 2026/2027
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                        Welcome to
                        <span class="block text-emerald-400 mt-2">
                            Pearl Horizon University
                        </span>
                    </h1>

                    <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-xl">
                        Your central academic management platform. Connect with your
                        university, manage academic activities, access student
                        services, and stay connected to your learning journey.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-3">

                        <a href="{{ route('student-login') }}"
                           class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold shadow-lg shadow-emerald-900/30 transition hover:-translate-y-1">
                            <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                            Student Portal
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>

                        <a href="{{ route('login') }}"
                           class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl border border-white/20 bg-white/5 hover:bg-white/10 text-white font-semibold transition">
                            <i data-lucide="shield-check" class="w-5 h-5"></i>
                            Staff Login
                        </a>

                    </div>

                    <div class="flex items-center gap-3 pt-5 text-sm text-slate-400">
                        <i data-lucide="lock-keyhole" class="w-4 h-4 text-emerald-400"></i>
                        Secure access to university academic services
                    </div>

                </div>

                <!-- Hero Information Panel -->
                <div class="relative">

                    <div class="absolute -inset-4 bg-emerald-500/10 rounded-3xl blur-2xl"></div>

                    <div class="relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-7 sm:p-9 shadow-2xl">

                        <div class="flex items-center gap-4 mb-8">

                            <div class="w-14 h-14 rounded-2xl bg-emerald-500/15 flex items-center justify-center">
                                <i data-lucide="landmark" class="w-8 h-8 text-emerald-400"></i>
                            </div>

                            <div>
                                <p class="text-white font-bold text-xl">
                                    University Services
                                </p>
                                <p class="text-slate-400 text-sm mt-1">
                                    Everything in one place
                                </p>
                            </div>

                        </div>

                        <div class="space-y-4">

                            <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5">
                                <div class="w-11 h-11 rounded-xl bg-emerald-500/15 flex items-center justify-center">
                                    <i data-lucide="book-open" class="w-5 h-5 text-emerald-400"></i>
                                </div>

                                <div>
                                    <p class="font-semibold text-white">Course Registration</p>
                                    <p class="text-sm text-slate-400">Manage academic enrolment</p>
                                </div>

                                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-400 ml-auto"></i>
                            </div>

                            <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5">
                                <div class="w-11 h-11 rounded-xl bg-yellow-500/15 flex items-center justify-center">
                                    <i data-lucide="users" class="w-5 h-5 text-yellow-400"></i>
                                </div>

                                <div>
                                    <p class="font-semibold text-white">Student Management</p>
                                    <p class="text-sm text-slate-400">Access academic records</p>
                                </div>

                                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-400 ml-auto"></i>
                            </div>

                            <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5">
                                <div class="w-11 h-11 rounded-xl bg-indigo-500/15 flex items-center justify-center">
                                    <i data-lucide="clipboard-list" class="w-5 h-5 text-indigo-400"></i>
                                </div>

                                <div>
                                    <p class="font-semibold text-white">Lecturer Services</p>
                                    <p class="text-sm text-slate-400">Access classes and rosters</p>
                                </div>

                                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-400 ml-auto"></i>
                            </div>

                        </div>

                        <div class="mt-7 pt-6 border-t border-white/10 flex items-center justify-between">
                            <span class="text-sm text-slate-400">Pearl Horizon University</span>
                            <span class="text-sm font-semibold text-emerald-400">PHU Portal</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- PORTAL ACCESS SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="text-center max-w-2xl mx-auto mb-14">

            <span class="text-sm font-bold uppercase tracking-widest text-emerald-600">
                Portal Access
            </span>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">
                Choose Your Portal
            </h2>

            <p class="text-slate-500 mt-4 leading-relaxed">
                Select the appropriate portal to access your university
                services and academic information.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

            <!-- SYSTEM DASHBOARD -->
            <div class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition">
                    <i data-lucide="layout-dashboard" class="w-7 h-7"></i>
                </div>

                <h3 class="text-xl font-bold text-slate-900 mt-6">
                    System Dashboard
                </h3>

                <p class="text-slate-500 text-sm leading-relaxed mt-3">
                    Manage university operations, monitor academic statistics,
                    and access student and course management tools.
                </p>

                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center gap-2 mt-6 font-semibold text-emerald-600 hover:text-emerald-700">
                    Open Dashboard
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>

            </div>


            <!-- LECTURER PORTAL -->
            <div class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition">
                    <i data-lucide="book-open-check" class="w-7 h-7"></i>
                </div>

                <h3 class="text-xl font-bold text-slate-900 mt-6">
                    Lecturer Portal
                </h3>

                <p class="text-slate-500 text-sm leading-relaxed mt-3">
                    View assigned courses, access class rosters,
                    and manage academic teaching activities.
                </p>

                <a href="{{ route('lecturer-login') }}"
                   class="inline-flex items-center gap-2 mt-6 font-semibold text-indigo-600 hover:text-indigo-700">
                    Lecturer Login
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>

            </div>


            <!-- STUDENT PORTAL -->
            <div class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="w-14 h-14 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center group-hover:bg-teal-600 group-hover:text-white transition">
                    <i data-lucide="graduation-cap" class="w-7 h-7"></i>
                </div>

                <h3 class="text-xl font-bold text-slate-900 mt-6">
                    Student Self-Service
                </h3>

                <p class="text-slate-500 text-sm leading-relaxed mt-3">
                    Register courses, view registered units,
                    and access your personal academic information.
                </p>

                <a href="{{ route('student-login') }}"
                   class="inline-flex items-center gap-2 mt-6 font-semibold text-teal-600 hover:text-teal-700">
                    Student Login
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>

            </div>


            <!-- STAFF PORTAL -->
            <div class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition">
                    <i data-lucide="shield-check" class="w-7 h-7"></i>
                </div>

                <h3 class="text-xl font-bold text-slate-900 mt-6">
                    Staff Portal
                </h3>

                <p class="text-slate-500 text-sm leading-relaxed mt-3">
                    Access administrative tools and manage
                    university academic information.
                </p>

                <a href="{{ route('login') }}"
                   class="inline-flex items-center gap-2 mt-6 font-semibold text-amber-600 hover:text-amber-700">
                    Staff Login
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>

            </div>


            <!-- COURSE REGISTRATION -->
            <div class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                    <i data-lucide="calendar-check" class="w-7 h-7"></i>
                </div>

                <h3 class="text-xl font-bold text-slate-900 mt-6">
                    Course Registration
                </h3>

                <p class="text-slate-500 text-sm leading-relaxed mt-3">
                    Access course registration and view
                    student enrolment information.
                </p>

                <a href="{{ route('registration') }}"
                   class="inline-flex items-center gap-2 mt-6 font-semibold text-blue-600 hover:text-blue-700">
                    Open Registration
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>

            </div>


            <!-- UNIVERSITY INFORMATION -->
            <div class="group bg-gradient-to-br from-emerald-900 to-slate-900 rounded-2xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-white">

                <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center text-emerald-400">
                    <i data-lucide="landmark" class="w-7 h-7"></i>
                </div>

                <h3 class="text-xl font-bold mt-6">
                    Pearl Horizon University
                </h3>

                <p class="text-slate-300 text-sm leading-relaxed mt-3">
                    A connected academic environment designed to
                    support teaching, learning, and university administration.
                </p>

                <div class="inline-flex items-center gap-2 mt-6 text-emerald-400 font-semibold text-sm">
                    Excellence in Education
                    <i data-lucide="sparkles" class="w-4 h-4"></i>
                </div>

            </div>

        </div>

    </section>


    <!-- WHY PHU PORTAL -->
    <section class="bg-white border-y border-slate-200">

        <div class="max-w-7xl mx-auto px-6 py-16">

            <div class="grid md:grid-cols-3 gap-10 text-center">

                <div>
                    <div class="w-12 h-12 mx-auto rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>

                    <h3 class="font-bold text-slate-900 mt-4">Secure Access</h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Dedicated portals for students, lecturers, and staff.
                    </p>
                </div>

                <div>
                    <div class="w-12 h-12 mx-auto rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <i data-lucide="database" class="w-6 h-6"></i>
                    </div>

                    <h3 class="font-bold text-slate-900 mt-4">Centralized Records</h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Access academic information through one platform.
                    </p>
                </div>

                <div>
                    <div class="w-12 h-12 mx-auto rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <i data-lucide="smartphone" class="w-6 h-6"></i>
                    </div>

                    <h3 class="font-bold text-slate-900 mt-4">Responsive Design</h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Access university services on desktop, tablet, and mobile.
                    </p>
                </div>

            </div>

        </div>

    </section>

</main>

@include('layouts.footer')

@endsection
