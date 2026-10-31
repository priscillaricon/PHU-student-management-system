@extends('layouts.main')
@section('content')

@include('layouts.header')




<!-- Navbar -->


<!-- Main Hero Banner -->
<main class="flex-1">

    <section class="relative bg-gradient-to-b from-emerald-950 via-slate-900 to-slate-950 text-white py-20 lg:py-28 px-6 overflow-hidden">

        <div class="absolute inset-0 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:32px_32px] opacity-10"></div>

        <div class="max-w-5xl mx-auto text-center space-y-6 relative z-10">

            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-xs font-medium tracking-wide">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                Academic Year Portal Active
            </span>

            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-tight">
                Empowering Excellence Through Integrated Learning & Administration
            </h1>

            <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto font-normal">
                Access course enrollments, administrative records, faculty assignments, and academic information in one unified environment.
            </p>

            <div class="pt-4 flex flex-wrap items-center justify-center gap-4">

                <a href="{{ route('login') }}"
                   class="px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold rounded-xl shadow-lg shadow-emerald-600/30 transition-all text-sm flex items-center gap-2">
                    <i data-lucide="shield-check" class="w-4 h-4"></i>
                    Staff Login
                </a>

                <a href="{{ route('lecturer-login') }}"
                   class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg transition-all text-sm flex items-center gap-2">
                    <i data-lucide="book-open-check" class="w-4 h-4"></i>
                    Lecturer Login
                </a>

                <a href="{{ route('student-login') }}"
                   class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/10 transition-all text-sm flex items-center gap-2">
                    <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                    Student Login
                </a>

            </div>
        </div>
    </section>

    <!-- Quick Access Portal Cards -->
    <section class="max-w-7xl mx-auto px-6 -mt-12 relative z-20 pb-16">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- System Dashboard -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-lg hover:shadow-xl transition-shadow space-y-4">

                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
                </div>

                <div>
                    <h3 class="font-bold text-slate-900 text-lg">
                        System Dashboard
                    </h3>

                    <p class="text-slate-500 text-sm mt-1">
                        Real-time statistics, system oversight, course management, and academic metrics.
                    </p>
                </div>

                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 group pt-2">
                    Go to Dashboard
                    <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                </a>

            </div>

            <!-- Faculty and Lecturers -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-lg hover:shadow-xl transition-shadow space-y-4">

                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <i data-lucide="book-open-check" class="w-6 h-6"></i>
                </div>

                <div>
                    <h3 class="font-bold text-slate-900 text-lg">
                        Faculty & Lecturers
                    </h3>

                    <p class="text-slate-500 text-sm mt-1">
                        Access teaching units, lecturer assignments, and student class rosters.
                    </p>
                </div>

                <a href="{{ route('lecturer-login') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 hover:text-indigo-700 group pt-2">
                    Lecturer Portal
                    <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                </a>

            </div>

            <!-- Student Self-Service -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-lg hover:shadow-xl transition-shadow space-y-4">

                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                    <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                </div>

                <div>
                    <h3 class="font-bold text-slate-900 text-lg">
                        Student Self-Service
                    </h3>

                    <p class="text-slate-500 text-sm mt-1">
                        Access student profiles, course availability, and registration information.
                    </p>
                </div>

                <a href="{{ route('student-login') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-teal-600 hover:text-teal-700 group pt-2">
                    Student Login
                    <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                </a>

            </div>

        </div>
    </section>

</main>

<!-- Footer -->
@include('layouts.footer')
@endsection

