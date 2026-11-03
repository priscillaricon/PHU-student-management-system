
@extends('layouts.main')

@section('title', 'Lecturer Login')

@section('content')

@include('layouts.header')

<main class="relative overflow-hidden bg-slate-50 flex items-center justify-center px-5 py-16">

    {{-- Background Decorations --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-indigo-100 rounded-full blur-3xl opacity-40 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-emerald-100 rounded-full blur-3xl opacity-40 translate-x-1/3 translate-y-1/3"></div>

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
                Lecturer Portal
            </h1>

            <p class="text-slate-500 text-sm mt-2">
                Manage your teaching and academic responsibilities
            </p>

        </div>

        {{-- Login Card --}}
        <div class="bg-white border border-slate-200 rounded-3xl shadow-2xl shadow-slate-200/60 p-7 sm:p-9">

            <div class="flex items-center gap-3 mb-7">

                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <i data-lucide="book-open-check" class="w-6 h-6"></i>
                </div>

                <div>
                    <h2 class="font-bold text-slate-900 text-lg">
                        Faculty Sign In
                    </h2>
                    <p class="text-xs text-slate-500">
                        Access your lecturer account
                    </p>
                </div>

            </div>

            {{-- Login Errors --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-3 text-sm mb-5">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Lecturer Login Form --}}
            <form action="{{ route('lecturer-login.post') }}" method="POST" class="space-y-5">

                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                        Lecturer Email
                    </label>

                    <div class="relative">
                        <i data-lucide="mail" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="lecturer@phu.ac.ug"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
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
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
                    </div>
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-600/20 hover:shadow-indigo-600/30 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">

                    Access Lecturer Portal
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>

                </button>

            </form>

            {{-- Other Portals --}}
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

                    <a href="{{ route('student-login') }}"
                       class="flex items-center justify-center gap-2 py-3 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-teal-50 hover:text-teal-700 transition-all">
                        <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                        Student
                    </a>

                </div>

            </div>

        </div>

        <p class="text-center text-xs text-slate-400 mt-6">
            Secure Faculty Access • Pearl Horizon University
        </p>

    </div>

</main>

@include('layouts.footer')

@endsection
