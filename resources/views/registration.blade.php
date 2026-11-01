@extends('layouts.main')

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
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
                <i data-lucide="users" class="w-4 h-4"></i>
                Students
            </a>

            <a href="{{ route('courses.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
                <i data-lucide="book-open" class="w-4 h-4"></i>
                Courses
            </a>

            <a href="{{ route('registration') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold bg-emerald-50 text-emerald-700">
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

        <main class="flex-1 max-w-3xl w-full mx-auto">

            {{-- Page Heading --}}
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                        <i data-lucide="clipboard-list" class="w-6 h-6"></i>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">
                            Course Registration
                        </h1>

                        <p class="text-slate-500 text-sm">
                            Register students for semester course units.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
                    <p class="font-semibold mb-2">
                        Please correct the following errors:
                    </p>

                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Registration Form --}}
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-slate-900">
                        Student Registration Details
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Select a student, course unit and semester below.
                    </p>
                </div>

                <form action="{{ route('registrations.store') }}" method="POST" class="space-y-6">

                    @csrf

                    {{-- Student Selection --}}
                    <div>
                        <label for="student_search" class="block text-sm font-semibold text-slate-700 mb-2">
                            Search Student
                        </label>

                        <div class="relative">
                            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>

                            <input
                                type="search"
                                id="student_search"
                                placeholder="Search by student name or registration number..."
                                autocomplete="off"
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                        </div>

                        <p class="text-xs text-slate-500 mt-2">
                            Type a student's name or registration number to find them quickly.
                        </p>

                        <label for="student_id" class="block text-sm font-semibold text-slate-700 mt-4 mb-2">
                            Select Student
                        </label>

                        <select
                            id="student_id"
                            name="student_id"
                            required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">

                            <option value="">Choose a student...</option>

                            @foreach ($students ?? [] as $student)
                                <option
                                    value="{{ $student->id }}"
                                    data-search="{{ strtolower(($student->full_name ?? '') . ' ' . ($student->reg_no ?? '')) }}"
                                    {{ old('student_id') == $student->id ? 'selected' : '' }}>

                                    {{ $student->full_name ?? 'Unnamed Student' }}
                                    - {{ $student->reg_no ?? 'No registration number' }}

                                </option>
                            @endforeach

                        </select>

                        <p id="student_count" class="text-xs text-slate-500 mt-2">
                            {{ count($students ?? []) }} student(s) available.
                        </p>

                        <p id="no_student_found" class="hidden text-sm text-red-600 mt-2">
                            No student matches your search.
                        </p>
                    </div>

                    {{-- Course Selection --}}
                    <div>
                        <label for="course_id" class="block text-sm font-semibold text-slate-700 mb-2">
                            Select Course Unit
                        </label>

                        <select
                            id="course_id"
                            name="course_id"
                            required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">

                            <option value="">Choose a course...</option>

                            @foreach ($courses ?? [] as $course)
                                <option
                                    value="{{ $course->id }}"
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                    {{ $course->course_name ?? $course->name ?? 'Course #' . $course->id }}

                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Semester --}}
                    <div>
                        <label for="semester" class="block text-sm font-semibold text-slate-700 mb-2">
                            Semester
                        </label>

                        <select
                            id="semester"
                            name="semester"
                            required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">

                            <option value="">Select semester...</option>

                            <option value="Semester 1" {{ old('semester') == 'Semester 1' ? 'selected' : '' }}>
                                Semester 1
                            </option>

                            <option value="Semester 2" {{ old('semester') == 'Semester 2' ? 'selected' : '' }}>
                                Semester 2
                            </option>

                            <option value="Semester 3" {{ old('semester') == 'Semester 3' ? 'selected' : '' }}>
                                Semester 3
                            </option>

                        </select>
                    </div>

                    {{-- Duplicate Registration Notice --}}
                    <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-lg flex items-start gap-3">

                        <i data-lucide="shield-check" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>

                        <div>
                            <p class="text-sm font-semibold text-emerald-900">
                                Duplicate Registration Protection
                            </p>

                            <p class="text-xs text-emerald-800 leading-relaxed mt-1">
                                Students should not be registered more than once for the same course unit in the same semester.
                            </p>
                        </div>

                    </div>

                    {{-- Submit Button --}}
                    <button
                        type="submit"
                        class="w-full py-3 px-4 bg-emerald-600 text-white rounded-lg font-semibold text-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition flex items-center justify-center gap-2">

                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        Complete Course Registration

                    </button>

                </form>

            </div>

        </main>

    </div>

</div>

{{-- Student Search Script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('student_search');
    const studentSelect = document.getElementById('student_id');
    const studentCount = document.getElementById('student_count');
    const noStudentFound = document.getElementById('no_student_found');

    if (!searchInput || !studentSelect) {
        return;
    }

    const studentOptions = Array.from(studentSelect.options).filter(function (option) {
        return option.value !== '';
    });

    searchInput.addEventListener('input', function () {

        const searchTerm = searchInput.value.trim().toLowerCase();
        let visibleCount = 0;

        studentOptions.forEach(function (option) {

            const studentDetails = option.dataset.search || option.textContent.toLowerCase();

            const matches = studentDetails.includes(searchTerm);

            option.hidden = !matches;

            if (matches) {
                visibleCount++;
            }

        });

        if (studentCount) {
            studentCount.textContent = visibleCount + ' student(s) found.';
        }

        if (noStudentFound) {
            noStudentFound.classList.toggle('hidden', visibleCount !== 0);
        }

        // Clear a selection if it no longer matches the search.
        const selectedOption = studentSelect.options[studentSelect.selectedIndex];

        if (selectedOption && selectedOption.hidden) {
            studentSelect.value = '';
        }

    });

});
</script>

@include('layouts.footer')

@endsection
