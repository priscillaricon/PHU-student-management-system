<footer class="bg-slate-950 text-white border-t-4 border-emerald-600">

    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- University Branding --}}
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('logo/logo.jpg') }}"
                         alt="PHU Logo"
                         class="w-12 h-12 rounded-full border-2 border-emerald-500 object-cover">

                    <div>
                        <h3 class="text-white font-bold text-lg">
                            Pearl Horizon University
                        </h3>
                        <p class="text-emerald-400 text-xs">
                            Academic & Management Systems
                        </p>
                    </div>
                </div>

                <p class="text-slate-400 text-sm leading-relaxed">
                    Empowering excellence through integrated learning,
                    academic administration and student management.
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="text-white font-bold mb-4">Quick Links</h3>

                <div class="flex flex-col gap-3 text-sm">
                    <a href="{{ route('home') }}" class="text-slate-400 hover:text-emerald-400">Home</a>
                    <a href="{{ route('dashboard') }}" class="text-slate-400 hover:text-emerald-400">Dashboard</a>
                    <a href="{{ route('students.index') }}" class="text-slate-400 hover:text-emerald-400">Students</a>
                    <a href="{{ route('courses.index') }}" class="text-slate-400 hover:text-emerald-400">Courses</a>
                </div>
            </div>

            {{-- Portals --}}
            <div>
                <h3 class="text-white font-bold mb-4">University Portals</h3>

                <div class="flex flex-col gap-3 text-sm">
                    <a href="{{ route('student-login') }}" class="text-slate-400 hover:text-emerald-400">Student Portal</a>
                    <a href="{{ route('lecturer-login') }}" class="text-slate-400 hover:text-emerald-400">Lecturer Portal</a>
                    <a href="{{ route('login') }}" class="text-slate-400 hover:text-emerald-400">Staff Portal</a>
                </div>
            </div>

        </div>

        {{-- Bottom Bar --}}
        <div class="mt-10 pt-6 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-slate-500">

            <p>
                © {{ date('Y') }} Pearl Horizon University. All rights reserved.
            </p>

            <p class="text-emerald-500 font-medium">
                PHU Student Self-Service System
            </p>

        </div>

    </div>

</footer>
