<header class="w-full bg-white/95 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 shadow-sm">

    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-4 flex flex-wrap items-center justify-between gap-5">

        {{-- UNIVERSITY BRANDING --}}
        <a href="{{ route('home') }}"
           class="flex items-center gap-3 shrink-0">

            <img
                src="{{ asset('logo/logo.jpg') }}"
                alt="Pearl Horizon University Logo"
                class="h-12 w-12 rounded-full object-cover border-2 border-emerald-100 shadow-sm"
            >

            <div class="leading-tight">
                <span class="block text-base font-extrabold text-slate-900">
                    Pearl Horizon University
                </span>

                <span class="block text-[10px] font-semibold text-emerald-600 mt-1 tracking-wide">
                    ACADEMIC & MANAGEMENT SYSTEMS
                </span>
            </div>

        </a>


        {{-- MAIN NAVIGATION --}}
        <nav class="flex flex-wrap items-center justify-center gap-x-1 gap-y-1 text-sm font-semibold text-slate-600">

            <a href="{{ route('home') }}"
               class="px-2.5 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700">
                Home
            </a>

            <a href="{{ route('dashboard') }}"
               class="px-2.5 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700">
                Dashboard
            </a>

            <a href="{{ route('students.index') }}"
               class="px-2.5 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700">
                Students
            </a>

            <a href="{{ route('courses.index') }}"
               class="px-2.5 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700">
                Courses
            </a>

            <a href="{{ route('registration') }}"
               class="px-2.5 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700">
                Registrations
            </a>

            <a href="{{ route('lecturer-dashboard') }}"
               class="px-2.5 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700">
                Lecturers
            </a>

            <a href="{{ route('student-login') }}"
               class="px-2.5 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700">
                Student Portal
            </a>

            <a href="{{ route('login') }}"
               class="px-2.5 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700">
                Staff Portal
            </a>

        </nav>


        {{-- ACCOUNT ACTIONS --}}
        <div class="flex items-center gap-3 shrink-0">

            <a href="{{ route('register') }}"
               class="px-4 py-2.5 rounded-lg border border-emerald-600 text-emerald-700 text-sm font-bold hover:bg-emerald-50 transition">
                Register
            </a>

            <a href="{{ route('login') }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold shadow-md transition">

                <i data-lucide="log-in" class="w-4 h-4"></i>
                Sign In

            </a>

        </div>

    </div>

</header>