<header class="w-full bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 min-h-20 flex flex-wrap items-center justify-between gap-4">

        {{-- University Logo and Name --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">

            <img
                src="{{ asset('logo/logo.jpg') }}"
                alt="PHU Emblem"
                class="h-12 w-12 rounded-full border border-slate-200 group-hover:scale-105 transition-transform object-cover"
            >

            <div>
                <span class="font-extrabold text-slate-900 text-lg leading-tight block tracking-tight">
                    Pearl Horizon University
                </span>

                <span class="text-xs text-emerald-600 font-medium block">
                    Academic & Management Systems
                </span>
            </div>

        </a>


        {{-- Main Navigation --}}
        <nav class="flex flex-wrap items-center gap-5 text-sm font-medium text-slate-600">

            <a href="{{ route('home') }}"
               class="hover:text-emerald-600 transition-colors">
                Home
            </a>

            <a href="{{ route('dashboard') }}"
               class="hover:text-emerald-600 transition-colors">
                Dashboard
            </a>

            <a href="{{ route('students.index') }}"
               class="hover:text-emerald-600 transition-colors">
                Students
            </a>

            <a href="{{ route('courses.index') }}"
               class="hover:text-emerald-600 transition-colors">
                Courses
            </a>

            <a href="{{ route('registration') }}"
               class="hover:text-emerald-600 transition-colors">
                Registrations
            </a>

            <a href="{{ route('lecturer-dashboard') }}"
               class="hover:text-emerald-600 transition-colors">
                Lecturers
            </a>

            <a href="{{ route('student-login') }}"
               class="hover:text-emerald-600 transition-colors">
                Student Portal
            </a>

            <a href="{{ route('login') }}"
               class="hover:text-emerald-600 transition-colors">
                Staff Portal
            </a>

        </nav>


        {{-- Sign In Button --}}
        <div class="flex items-center gap-3">

            <a href="{{ route('login') }}"
               class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold shadow-md shadow-emerald-500/10 transition-all">
                Sign In
            </a>

        </div>

    </div>
</header>

