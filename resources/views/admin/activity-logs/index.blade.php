@extends('layouts.main')

@section('title', 'Activity Logs | Pearl Horizon University')

@section('content')

@include('layouts.header')

<main class="min-h-screen bg-slate-50">

    <div class="max-w-7xl mx-auto px-5 sm:px-6 py-10">

        {{-- PAGE HEADER --}}
        <section class="bg-gradient-to-r from-emerald-950 via-emerald-900 to-slate-900 rounded-3xl p-8 sm:p-10 mb-8 shadow-xl">
            <div class="flex flex-col sm:flex-row items-center gap-6">

                <img src="{{ asset('logo/logo.jpg') }}"
                     alt="Pearl Horizon University Logo"
                     class="w-24 h-24 rounded-full object-cover border-4 border-white/30 shadow-lg">

                <div class="text-center sm:text-left">
                    <span class="text-emerald-300 text-xs font-bold tracking-widest">
                        PEARL HORIZON UNIVERSITY
                    </span>

                    <h1 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">
                        System Activity Logs
                    </h1>

                    <p class="text-emerald-100 mt-2">
                        Monitor and review activities performed across the university management system.
                    </p>
                </div>

                <div class="sm:ml-auto">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2 px-5 py-3 bg-white text-emerald-900 rounded-xl font-bold text-sm hover:bg-emerald-50 transition">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Dashboard
                    </a>
                </div>

            </div>
        </section>

        {{-- SUMMARY --}}
        <section class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">

            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Total Activities</p>
                        <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                            {{ number_format($logs->total()) }}
                        </h2>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <i data-lucide="activity" class="w-6 h-6"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Current Page Records</p>
                        <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                            {{ $logs->count() }}
                        </h2>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <i data-lucide="clipboard-list" class="w-6 h-6"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Records Per Page</p>
                        <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                            {{ $logs->perPage() }}
                        </h2>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                        <i data-lucide="database" class="w-6 h-6"></i>
                    </div>
                </div>
            </div>

        </section>

        {{-- ACTIVITY TABLE --}}
        <section class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="p-6 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">
                        Activity History
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">
                        Login, logout and other recorded system activities.
                    </p>
                </div>

                <span class="inline-flex items-center gap-2 px-3 py-2 bg-emerald-50 text-emerald-700 rounded-lg text-xs font-bold">
                    <i data-lucide="shield-check" class="w-4 h-4"></i>
                    ADMINISTRATOR VIEW
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-slate-100 text-slate-600 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-5 py-4">User</th>
                            <th class="px-5 py-4">Email</th>
                            <th class="px-5 py-4">Action</th>
                            <th class="px-5 py-4">Description</th>
                            <th class="px-5 py-4">IP Address</th>
                            <th class="px-5 py-4">Date & Time</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($logs as $log)
                            <tr class="hover:bg-emerald-50/40 transition">

                                <td class="px-5 py-4 font-semibold text-slate-800 whitespace-nowrap">
                                    {{ $log->actor_name }}
                                </td>

                                <td class="px-5 py-4 text-slate-600">
                                    {{ $log->actor_email ?? 'N/A' }}
                                </td>

                                <td class="px-5 py-4">
                                    @php
                                        $actionColor = match(strtolower($log->action)) {
                                            'login' => 'bg-emerald-100 text-emerald-700',
                                            'logout' => 'bg-blue-100 text-blue-700',
                                            'delete' => 'bg-red-100 text-red-700',
                                            'update' => 'bg-amber-100 text-amber-700',
                                            default => 'bg-slate-100 text-slate-700',
                                        };
                                    @endphp

                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $actionColor }}">
                                        {{ ucfirst($log->action) }}
                                    </span>
                                </td>

                                <td class="px-5 py-4 text-slate-600 min-w-48">
                                    {{ $log->description ?? 'N/A' }}
                                </td>

                                <td class="px-5 py-4 text-slate-500 whitespace-nowrap">
                                    {{ $log->ip_address ?? 'N/A' }}
                                </td>

                                <td class="px-5 py-4 text-slate-600 whitespace-nowrap">
                                    {{ $log->created_at?->format('d M Y, H:i') }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-12 text-center">
                                    <i data-lucide="clipboard-list" class="w-12 h-12 mx-auto text-slate-300"></i>
                                    <p class="text-slate-600 font-semibold mt-3">
                                        No activity records found.
                                    </p>
                                    <p class="text-sm text-slate-400 mt-1">
                                        System activities will appear here when recorded.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="p-6 border-t border-slate-200">
                {{ $logs->links() }}
            </div>

        </section>

        <p class="text-center text-xs text-slate-400 mt-8">
            &copy; {{ date('Y') }} Pearl Horizon University. Academic & Management Systems.
        </p>

    </div>

</main>

@include('layouts.footer')

@endsection
