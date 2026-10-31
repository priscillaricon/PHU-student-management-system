@extends('layouts.main')

@section('title', 'Staff & Admin Login')

@section('content')

@include('layouts.header')

<main class="flex-1 flex items-center justify-center px-6 py-12">

    <div class="max-w-md w-full bg-white border border-slate-200/80 rounded-2xl shadow-xl p-8 space-y-6">

        {{-- Page Heading --}}
        <div class="text-center space-y-2">

            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl mx-auto flex items-center justify-center shadow-inner">
                <i data-lucide="lock" class="w-6 h-6"></i>
            </div>

            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                Staff & Admin Portal
            </h1>

            <p class="text-xs text-slate-500">
                Sign in with your administrative credentials to manage PHU systems.
            </p>

        </div>

        {{-- Staff Login Form --}}
        <form action="{{ route('dashboard') }}" method="GET" class="space-y-4">

            {{-- Email Address --}}
            <div class="space-y-1.5">

                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                    Email Address
                </label>

                <div class="relative">

                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        required
                        autocomplete="username"
                        placeholder="admin@phu.ac.ug"
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:bg-white transition-all"
                    >

                </div>

            </div>

            {{-- Password --}}
            <div class="space-y-1.5">

                <div class="flex items-center justify-between">

                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                        Password
                    </label>

                    <a href="#"
                       class="text-xs text-emerald-600 hover:underline font-medium">
                        Forgot password?
                    </a>

                </div>

                <div class="relative">

                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="key-round" class="w-4 h-4"></i>
                    </span>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:bg-white transition-all"
                    >

                </div>

            </div>

            {{-- Submit Button --}}
            <button
                type="submit"
                class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl shadow-lg shadow-emerald-600/20 transition-all text-sm flex items-center justify-center gap-2"
            >
                <span>Sign In to Dashboard</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>

        </form>

        {{-- Other Login Portals --}}
        <div class="pt-4 border-t border-slate-100 text-center text-xs text-slate-500">

            <a href="{{ route('lecturer-login') }}"
               class="text-indigo-600 font-semibold hover:underline">
                Lecturer Login
            </a>

            <span class="mx-2">•</span>

            <a href="{{ route('student-login') }}"
               class="text-teal-600 font-semibold hover:underline">
                Student Login
            </a>

        </div>

    </div>

</main>

@include('layouts.footer')

@endsection