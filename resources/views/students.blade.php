@extends('layouts.main')

@section('title', 'Student Directory')

@section('content')

@include('layouts.header')

<div class="flex min-h-screen bg-slate-50">

    {{-- Sidebar --}}
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
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold bg-emerald-50 text-emerald-700">
                <i data-lucide="users" class="w-4 h-4"></i>
                Students
            </a>

            <a href="{{ route('courses.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
                <i data-lucide="book-open" class="w-4 h-4"></i>
                Courses
            </a>

            <a href="{{ route('registration') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
                <i data-lucide="clipboard-check" class="w-4 h-4"></i>
                Course Registrations
            </a>

        </div>

        {{-- Admin Profile --}}
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

    {{-- Main Content --}}
    <div class="pt-20 pl-64 pr-8 pb-12 flex-1 flex flex-col">

        <main class="flex-1 max-w-6xl w-full mx-auto">

            {{-- Page Heading --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">

                <div>
                    <h1 class="text-2xl font-bold text-slate-900">
                        Student Directory
                    </h1>

                    <p class="text-slate-500 text-sm mt-1">
                        Manage student profiles, registrations, and academic details.
                    </p>
                </div>

                {{-- Add Student Button --}}
                <a href="{{ route('students.create') }}"
                   class="flex items-center gap-2 px-4 py-2.5 bg-emerald-600 text-white rounded-lg font-semibold text-sm hover:bg-emerald-700 shadow-sm">

                    <i data-lucide="user-plus" class="w-4 h-4"></i>

                    Add New Student

                </a>

            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Student Directory Table --}}
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full text-left text-sm">

                        <thead class="bg-slate-50 text-slate-500 text-xs font-semibold uppercase border-b border-slate-200">

                            <tr>
                                <th class="py-3 px-6">Student No</th>
                                <th class="py-3 px-6">Full Name</th>
                                <th class="py-3 px-6">Email Address</th>
                                <th class="py-3 px-6">Program</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-200">

                            @forelse ($students ?? [] as $student)

                                <tr class="hover:bg-slate-50">

                                    {{-- Student Number --}}
                                    <td class="py-4 px-6 font-mono text-xs font-semibold">
                                        {{ $student->registration_number ?? $student->student_number ?? $student->id }}
                                    </td>

                                    {{-- Student Name --}}
                                    <td class="py-4 px-6 font-medium text-slate-900">
                                        {{ $student->name ?? $student->full_name ?? $student->student_name ?? 'N/A' }}
                                    </td>

                                    {{-- Email --}}
                                    <td class="py-4 px-6 text-slate-500">
                                        {{ $student->email ?? 'N/A' }}
                                    </td>

                                    {{-- Program --}}
                                    <td class="py-4 px-6">

                                        <span class="px-2.5 py-1 text-xs font-medium bg-emerald-50 text-emerald-700 rounded-lg">
                                            {{ $student->program ?? $student->course ?? 'Not specified' }}
                                        </span>

                                    </td>

                                    {{-- Actions --}}
                                    <td class="py-4 px-6 text-center">

                                        <div class="flex justify-center gap-2">

                                            {{-- Edit Student --}}
                                            <a href="{{ route('students.edit', $student->id) }}"
                                               title="Edit student"
                                               class="p-1.5 text-slate-500 hover:text-emerald-600">

                                                <i data-lucide="edit-3" class="w-4 h-4"></i>

                                            </a>

                                            {{-- Delete Student --}}
                                            <form action="{{ route('students.destroy', $student->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this student?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        title="Delete student"
                                                        class="p-1.5 text-slate-500 hover:text-red-600">

                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="py-10 px-6 text-center text-slate-500">

                                        <div class="flex flex-col items-center gap-2">

                                            <i data-lucide="users" class="w-8 h-8 text-slate-300"></i>

                                            <p class="font-medium">
                                                No students found.
                                            </p>

                                            <p class="text-xs">
                                                Add a new student to populate the directory.
                                            </p>

                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{-- Pagination --}}
                @if (isset($students) && method_exists($students, 'links'))
                    <div class="px-6 py-4 border-t border-slate-200">
                        {{ $students->links() }}
                    </div>
                @endif

            </div>

        </main>

    </div>

</div>

@include('layouts.footer')

@endsection