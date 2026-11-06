@extends('layouts.main')

@section('content')

<div class="min-h-screen bg-slate-50 py-10">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        {{-- PAGE HEADER --}}
        <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900">
                    Lecturers Directory
                </h1>

                <p class="text-slate-500 mt-2">
                    View and search registered university lecturers.
                </p>
            </div>

            <a href="{{ route('dashboard') }}"
               class="px-5 py-3 bg-emerald-600 text-white rounded-lg font-semibold hover:bg-emerald-700">
                Back to Dashboard
            </a>
        </div>

        {{-- TOTAL LECTURERS --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">
            <p class="text-sm text-slate-500 font-medium">
                Total Registered Lecturers
            </p>

            <h2 class="text-3xl font-bold text-emerald-700 mt-2">
                {{ $lecturers->total() }}
            </h2>
        </div>

        {{-- SEARCH --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">

            <form method="GET" action="{{ route('lecturers.index') }}"
                  class="flex flex-wrap gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by lecturer name, email or department..."
                    class="flex-1 min-w-0 border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500"
                >

                <button type="submit"
                        class="bg-emerald-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-emerald-700">
                    Search
                </button>

                <a href="{{ route('lecturers.index') }}"
                   class="bg-slate-200 text-slate-700 px-6 py-3 rounded-lg font-semibold hover:bg-slate-300">
                    Reset
                </a>

            </form>

        </div>

        {{-- LECTURERS TABLE --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="bg-slate-100 text-slate-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4">No.</th>
                            <th class="px-6 py-4">Lecturer Name</th>
                            <th class="px-6 py-4">Email Address</th>
                            <th class="px-6 py-4">Department</th>
                            <th class="px-6 py-4">Date Registered</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($lecturers as $lecturer)

                            <tr class="hover:bg-slate-50">

                                <td class="px-6 py-4 font-medium text-slate-500">
                                    {{ $lecturers->firstItem() + $loop->index }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-slate-900">
                                    {{ $lecturer->full_name }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $lecturer->email }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $lecturer->department }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $lecturer->created_at?->format('d M Y') }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5"
                                    class="px-6 py-12 text-center text-slate-500">

                                    <p class="font-semibold text-lg">
                                        No lecturers found
                                    </p>

                                    <p class="mt-2">
                                        Registered lecturers will appear here.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div class="p-6 border-t border-slate-200">
                {{ $lecturers->links() }}
            </div>

        </div>

    </div>
</div>

@endsection
