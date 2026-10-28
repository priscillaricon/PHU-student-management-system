<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pearl Horizon University — Academic & Student Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex flex-col selection:bg-emerald-600 selection:text-white">

    <!-- Navbar -->
    <header class="w-full bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="index.html" class="flex items-center gap-3 group">
                <img src="assets/image/logo.jpg" alt="PHU Emblem" class="h-12 w-12 rounded-full border border-slate-200 group-hover:scale-105 transition-transform object-cover">
                <div>
                    <span class="font-extrabold text-slate-900 text-lg leading-tight block tracking-tight">Pearl Horizon University</span>
                    <span class="text-xs text-emerald-600 font-medium block">Academic & Management Systems</span>
                </div>
            </a>
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="index.html" class="text-emerald-600 font-bold">Home</a>
                <a href="login.html" class="hover:text-emerald-600 transition-colors">Staff Portal</a>
                <a href="lecturer-login.html" class="hover:text-emerald-600 transition-colors">Lecturer Portal</a>
                <a href="student-login.html" class="hover:text-emerald-600 transition-colors">Student Portal</a>
            </nav>
            <div class="flex items-center gap-3">
                <a href="login.html" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold shadow-md shadow-emerald-500/10 transition-all">
                    Sign In Portal
                </a>
            </div>
        </div>
    </header>

    <!-- Main Hero Banner Section -->
    <main class="flex-1">
        <section class="relative bg-gradient-to-b from-emerald-950 via-slate-900 to-slate-950 text-white py-20 lg:py-28 px-6 overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:32px_32px] opacity-10"></div>
            <div class="max-w-5xl mx-auto text-center space-y-6 relative z-10">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-xs font-medium tracking-wide">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span> Academic Year Portal Active
                </span>
                <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-tight">
                    Empowering Excellence Through Integrated Learning & Administration
                </h1>
                <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto font-normal">
                    Access course enrollments, administrative logs, faculty assignments, and records in one unified environment.
                </p>
                <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                    <a href="login.html" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold rounded-xl shadow-lg shadow-emerald-600/30 transition-all text-sm flex items-center gap-2">
                        <i data-lucide="shield-check" class="w-4 h-4"></i> Staff Login
                    </a>
                    <a href="lecturer-login.html" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg transition-all text-sm flex items-center gap-2">
                        <i data-lucide="book-open-check" class="w-4 h-4"></i> Lecturer Login
                    </a>
                    <a href="student-login.html" class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/10 transition-all text-sm flex items-center gap-2">
                        <i data-lucide="graduation-cap" class="w-4 h-4"></i> Student Login
                    </a>
                </div>
            </div>
        </section>

        <!-- Quick Access Portal Cards -->
        <section class="max-w-7xl mx-auto px-6 -mt-12 relative z-20 pb-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-lg hover:shadow-xl transition-shadow space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg">System Dashboard</h3>
                        <p class="text-slate-500 text-sm mt-1">Real-time stats, system oversight, course management, and academic metrics.</p>
                    </div>
                    <a href="dashboard.html" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 group pt-2">
                        Go to Dashboard <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-lg hover:shadow-xl transition-shadow space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                        <i data-lucide="book-open-check" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg">Faculty & Lecturers</h3>
                        <p class="text-slate-500 text-sm mt-1">View assigned teaching units, module breakdowns, and student class rosters.</p>
                    </div>
                    <a href="lecturer-login.html" class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 hover:text-indigo-700 group pt-2">
                        Lecturer Portal <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-lg hover:shadow-xl transition-shadow space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                        <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg">Student Self-Service</h3>
                        <p class="text-slate-500 text-sm mt-1">Check course availability, registration records, and student profiles.</p>
                    </div>
                    <a href="student-login.html" class="inline-flex items-center gap-2 text-sm font-semibold text-teal-600 hover:text-teal-700 group pt-2">
                        Student Login <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-8 px-6 text-center text-xs text-slate-500">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <img src="assets/image/logo.jpg" alt="Logo" class="w-9 h-9 rounded-full object-cover">
                <span class="font-semibold text-slate-700">Pearl Horizon University</span>
            </div>
            <p>© 2026 Pearl Horizon University. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="login.html" class="hover:underline">Staff Login</a>
                <a href="lecturer-login.html" class="hover:underline">Lecturer Login</a>
            </div>
        </div>
    </footer>

    <script>lucide.createIcons();</script>
</body>
</html>