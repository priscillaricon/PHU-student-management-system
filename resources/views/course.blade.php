@extends('layouts.main')

@section('title', 'Academic Courses')

@section('content')

@include('layouts.header')

<aside class="fixed top-16 left-0 z-40 w-64 h-[calc(100vh-4rem)] bg-white border-r border-slate-200 p-4 flex flex-col justify-between">

    <div class="space-y-1">
        <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">
            Main Navigation
        </p>

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
            <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
            Dashboard
        </a>

        <a href="{{ route('students.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
            <i data-lucide="users" class="w-4 h-4"></i>
            Students
        </a>

        <a href="{{ route('courses.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium bg-emerald-50 text-emerald-700">
            <i data-lucide="book-open" class="w-4 h-4"></i>
            Courses
        </a>

        <a href="{{ route('registration') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
            <i data-lucide="clipboard-check" class="w-4 h-4"></i>
            Course Registration
        </a>
    </div>

    <div class="p-3 border-t border-slate-200 flex items-center gap-3">
        <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm">
            PN
        </div>

        <div class="overflow-hidden">
            <p class="text-xs font-medium text-slate-900 truncate">
                Priscillar Nakabugo
            </p>
            <p class="text-[10px] text-slate-500 truncate">
                admin@phu.ac.ug
            </p>
        </div>
    </div>

</aside>

<div class="pt-20 pl-64 pr-8 pb-12 flex-1 flex flex-col">

    <main class="flex-1 max-w-6xl w-full mx-auto">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">

            <div>
                <h1 class="text-2xl font-bold text-slate-900">
                    Academic Courses
                </h1>

                <p class="text-slate-500 text-sm mt-1">
                    Manage university courses, credit units, and assigned lecturers.
                </p>
            </div>

            <a href="{{ route('courses.create') }}"
               class="flex items-center gap-2 px-4 py-2.5 bg-emerald-600 text-white rounded-lg font-semibold text-sm hover:bg-emerald-700 shadow-sm">

                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                Add New Course

            </a>

        </div>

        {{-- Course cards --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-emerald-300 transition-colors">

                <div class="flex justify-between items-start mb-3">
                    <span class="px-2.5 py-1 text-xs font-bold bg-emerald-100 text-emerald-800 rounded-lg">
                        BUC3131
                    </span>

                    <span class="text-xs text-slate-500 font-semibold">
                        4 Credit Units
                    </span>
                </div>

                <h3 class="font-bold text-slate-900 text-base mb-2">
                    Advanced Web Application Development
                </h3>

                <p class="text-xs text-slate-500 mb-4">
                    Covers Laravel framework, migrations, Eloquent relationships,
                    Blade views, and authorization.
                </p>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-600">

                    <span class="flex items-center gap-1.5">
                        <i data-lucide="user" class="w-4 h-4 text-emerald-600"></i>
                        Dr. S. Kwikiriza
                    </span>

                    <div class="flex gap-2">
                        <a href="{{ route('courses.edit', 1) }}"
                           class="p-1.5 text-slate-400 hover:text-emerald-600"
                           aria-label="Edit course">
                            <i data-lucide="edit" class="w-4 h-4"></i>
                        </a>

                        <button type="button"
                                class="p-1.5 text-slate-400 hover:text-red-600"
                                aria-label="Delete course">
                            <i data-lucide="trash" class="w-4 h-4"></i>
                        </button>
                    </div>

                </div>

            </div>

            <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-emerald-300 transition-colors">

                <div class="flex justify-between items-start mb-3">
                    <span class="px-2.5 py-1 text-xs font-bold bg-emerald-100 text-emerald-800 rounded-lg">
                        BUC3102
                    </span>

                    <span class="text-xs text-slate-500 font-semibold">
                        3 Credit Units
                    </span>
                </div>

                <h3 class="font-bold text-slate-900 text-base mb-2">
                    Database Management Systems
                </h3>

                <p class="text-xs text-slate-500 mb-4">
                    Relational database design, normalization, complex SQL queries,
                    and transaction security.
                </p>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-600">

                    <span class="flex items-center gap-1.5">
                        <i data-lucide="user" class="w-4 h-4 text-emerald-600"></i>
                        Prof. J. Okumu
                    </span>

                    <div class="flex gap-2">
                        <a href="{{ route('courses.edit', 2) }}"
                           class="p-1.5 text-slate-400 hover:text-emerald-600"
                           aria-label="Edit course">
                            <i data-lucide="edit" class="w-4 h-4"></i>
                        </a>

                        <button type="button"
                                class="p-1.5 text-slate-400 hover:text-red-600"
                                aria-label="Delete course">
                            <i data-lucide="trash" class="w-4 h-4"></i>
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

@include('layouts.footer')

@endsection