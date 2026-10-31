@extends('layouts.main')

@section('title', 'Student Portal Login')

@section('content')

@include('layouts.header')

<main class="min-h-screen flex items-center justify-center px-6 py-12 bg-slate-50">

    <div class="max-w-md w-full bg-white border border-slate-200/80 rounded-2xl shadow-xl p-8 space-y-6">

        {{-- Page Heading --}}
        <div class="text-center space-y-2">

            <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-2xl mx-auto flex items-center justify-center shadow-inner">
                <i data-lucide="graduation-cap" class="w-6 h-6"></i>
            </div>

            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                Student Portal Login
            </h1>

            <p class="text-xs text-slate-500">
                Enter your student registration credentials to access your portal.
            </p>

        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="p-3 bg-teal-50 border border-teal-200 rounded-lg text-sm text-teal-800">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-700">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Student Login Form --}}
        <form action="{{ route('student-login') }}" method="POST" class="space-y-4">

            @csrf

            {{-- Registration Number --}}
            <div class="space-y-1.5">

                <label for="registration_number" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                    Reg. No.
                </label>

                <div class="relative">

                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </span>

                    <input
                        type="text"
                        id="registration_number"
                        name="registration_number"
                        value="{{ old('registration_number') }}"
                        required
                        autocomplete="username"
                        placeholder="e.g. 2200701234"
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white transition-all">

                </div>

            </div>

            {{-- Password --}}
            <div class="space-y-1.5">

                <div class="flex items-center justify-between">

                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                        Password
                    </label>

                    <a href="#"
                       class="text-xs text-teal-600 hover:underline font-medium">
                        Forgot password?
                    </a>

                </div>

                <div class="relative">

                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="key-round" class="w-4 h-4"></i>
                    </span>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white transition-all">

                </div>

            </div>

            {{-- Submit Button --}}
            <button
                type="submit"
                class="w-full py-3.5 bg-teal-600 hover:bg-teal-700 text-white font-semibold rounded-xl shadow-lg shadow-teal-600/20 transition-all text-sm flex items-center justify-center gap-2">

                <span>Access Student Portal</span>

                <i data-lucide="arrow-right" class="w-4 h-4"></i>

            </button>

        </form>

        {{-- Staff Login Link --}}
        <div class="pt-4 border-t border-slate-100 text-center text-xs text-slate-500">

            Are you an administrator?

            <a href="{{ route('login') }}"
               class="text-emerald-600 font-semibold hover:underline">
                Staff Login Portal
            </a>

        </div>

    </div>

</main>

@include('layouts.footer')

@endsection