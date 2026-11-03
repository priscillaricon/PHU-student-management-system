
@extends('layouts.main')

@section('title', 'Student Portal Login')

@section('content')

@include('layouts.header')

<main class="relative overflow-hidden bg-slate-50 flex items-center justify-center px-5 py-16">

    {{-- Background Decorations --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-emerald-100 rounded-full blur-3xl opacity-40 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-teal-100 rounded-full blur-3xl opacity-40 translate-x-1/3 translate-y-1/3"></div>

    <div class="relative z-10 max-w-md w-full">

        {{-- University Branding --}}
        <div class="text-center mb-8">

            <img src="{{ asset('logo/logo.jpg') }}"
                 alt="PHU Logo"
                 class="w-20 h-20 rounded-full object-cover mx-auto border-4 border-white shadow-lg mb-4">

            <p class="text-emerald-600 font-bold text-xs uppercase tracking-[0.2em]">
                Pearl Horizon University
            </p>

            <h1 class="text-3xl font-extrabold text-slate-900 mt-2">
                Student Portal
            </h1>

            <p class="text-slate-500 text-sm mt-2">
                Access your academic information securely
            </p>

        </div>

        {{-- Login Card --}}
        <div class="bg-white border border-slate-200 rounded-3xl shadow-2xl shadow-slate-200/60 p-7 sm:p-9">

            <div class="flex items-center gap-3 mb-7">

                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                </div>

                <div>
                    <h2 class="font-bold text-slate-900 text-lg">
                        Welcome Student
                    </h2>
                    <p class="text-xs text-slate-500">
                        Sign in using your registration number
                    </p>
                </div>

            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl p-3 text-sm mb-5">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-3 text-sm mb-5">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Student Login Form --}}
            <form action="{{ route('student-login') }}" method="POST" class="space-y-5">

                @csrf

                {{-- Registration Number --}}
                <div>
                    <label for="reg_no" class="block text-sm font-semibold text-slate-700 mb-2">
                        Registration Number
                    </label>

                    <div class="relative">
                        <i data-lucide="user-round" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>

                        <input
                            type="text"
                            id="reg_no"
                            name="reg_no"
                            value="{{ old('reg_no') }}"
                            required
                            autocomplete="username"
                            placeholder="e.g. 23/U/1234/EVE"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                    </div>
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                        Password
                    </label>

                    <div class="relative">
                        <i data-lucide="key-round" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                    </div>
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/30 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">

                    Access Student Portal
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>

                </button>

            </form>

            {{-- Other Login Portals --}}
            <div class="mt-7 pt-6 border-t border-slate-100">

                <p class="text-center text-xs text-slate-500 mb-4">
                    Access another university portal
                </p>

                <div class="grid grid-cols-2 gap-3">

                    <a href="{{ route('login') }}"
                       class="flex items-center justify-center gap-2 py-3 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition-all">
                        <i data-lucide="shield-check" class="w-4 h-4"></i>
                        Staff
                    </a>

                    <a href="{{ route('lecturer-login') }}"
                       class="flex items-center justify-center gap-2 py-3 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-700 transition-all">
                        <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                        Lecturer
                    </a>

                </div>

            </div>

        </div>

        <p class="text-center text-xs text-slate-400 mt-6">
            Secure Student Access • Pearl Horizon University
        </p>

    </div>

</main>

@include('layouts.footer')

@endsection
