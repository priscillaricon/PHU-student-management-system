<header class="w-full bg-white/95 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 shadow-sm">

    <div class="max-w-7xl mx-auto px-5 lg:px-8 min-h-[88px] flex flex-wrap items-center justify-between gap-4">

        {{-- University Branding --}}
        <a href="{{ route('home') }}"
           class="flex items-center gap-3 group shrink-0">

            <div class="relative">
                <img
                    src="{{ asset('logo/logo.jpg') }}"
                    alt="Pearl Horizon University Logo"
                    class="h-14 w-14 rounded-full object-cover border-2 border-emerald-100 shadow-sm group-hover:scale-105 transition-transform duration-300"
                >

                <span class="absolute bottom-0 right-0 w-3.5 h-3.5 rounded-full bg-emerald-500 border-2 border-white"></span>
            </div>

            <div class="leading-tight">
                <span class="block text-base sm:text-lg font-extrabold text-slate-900 tracking-tight">
                    Pearl Horizon University
                </span>

                <span class="block text-[11px] sm:text-xs font-semibold text-emerald-600 mt-1 tracking-wide">
                    ACADEMIC & MANAGEMENT SYSTEMS
                </span>
            </div>

        </a>


        {{-- Navigation Links --}}
        <nav class="flex flex-wrap items-center justify-center gap-x-2 gap-y-2 text-sm font-semibold text-slate-600">

            <a href="{{ route('home') }}"
               class="px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                Home
            </a>

            <a href="{{ route('dashboard') }}"
               class="px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                Dashboard
            </a>

            <a href="{{ route('students.index') }}"
               class="px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                Students
            </a>

            <a href="{{ route('courses.index') }}"
               class="px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                Courses
            </a>

            <a href="{{ route('registration') }}"
               class="px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                Registrations
            </a>

            <a href="{{ route('lecturer-dashboard') }}"
               class="px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                Lecturers
            </a>

            <a href="{{ route('student-login') }}"
               class="px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                Student Portal
            </a>

            <a href="{{ route('login') }}"
               class="px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                Staff Portal
            </a>

        </nav>


        {{-- Sign In Button --}}
        <div class="flex items-center">

            <a href="{{ route('login') }}"
               class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/30 hover:-translate-y-0.5 transition-all duration-200">

                <i data-lucide="log-in" class="w-4 h-4"></i>

                Sign In

            </a>

        </div>

    </div>

</header>
