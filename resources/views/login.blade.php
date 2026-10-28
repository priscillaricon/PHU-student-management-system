<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In — Pearl Horizon University</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex flex-col justify-between selection:bg-emerald-600 selection:text-white">

    <header class="w-full bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="index.html" class="flex items-center gap-3 group">
                <img src="assets/image/logo.jpg" alt="PHU Emblem" class="h-11 w-11 rounded-full border border-slate-200 group-hover:scale-105 transition-transform object-cover">
                <div>
                    <span class="font-extrabold text-slate-900 text-lg leading-tight block tracking-tight">Pearl Horizon University</span>
                    <span class="text-xs text-emerald-600 font-medium block">Academic & Management Systems</span>
                </div>
            </a>
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="index.html" class="hover:text-emerald-600 transition-colors">Home</a>
                <a href="lecturer-login.html" class="hover:text-emerald-600 transition-colors">Lecturer Portal</a>
                <a href="student-login.html" class="hover:text-emerald-600 transition-colors">Student Portal</a>
            </nav>
            <div>
                <a href="index.html" class="px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-700 hover:bg-slate-100 transition-colors">
                    ← Back to Home
                </a>
            </div>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center px-6 py-12">
        <div class="max-w-md w-full bg-white border border-slate-200/80 rounded-2xl shadow-xl p-8 space-y-6">
            <div class="text-center space-y-2">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl mx-auto flex items-center justify-center shadow-inner">
                    <i data-lucide="lock" class="w-6 h-6"></i>
                </div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Staff & Admin Portal</h1>
                <p class="text-xs text-slate-500">Sign in with your administrative credentials to manage PHU systems.</p>
            </div>

            <form action="dashboard.html" method="GET" class="space-y-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </span>
                        <input type="email" required placeholder="admin@phu.ac.ug" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:bg-white transition-all">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Password</label>
                        <a href="#" class="text-xs text-emerald-600 hover:underline font-medium">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="key-round" class="w-4 h-4"></i>
                        </span>
                        <input type="password" required placeholder="••••••••" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:bg-white transition-all">
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl shadow-lg shadow-emerald-600/20 transition-all text-sm flex items-center justify-center gap-2">
                    <span>Sign In to Dashboard</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
            </form>

            <div class="pt-4 border-t border-slate-100 text-center text-xs text-slate-500 flex justify-center gap-3">
                <a href="lecturer-login.html" class="text-indigo-600 font-semibold hover:underline">Lecturer Login</a> • 
                <a href="student-login.html" class="text-teal-600 font-semibold hover:underline">Student Login</a>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-200 py-6 px-6 text-center text-xs text-slate-500">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <img src="assets/image/logo.jpg" alt="Logo" class="w-5 h-5 rounded-full object-cover">
                <span class="font-semibold text-slate-700">Pearl Horizon University</span>
            </div>
            <p>© 2026 Pearl Horizon University. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="index.html" class="hover:underline">Home</a>
                <a href="registration.html" class="hover:underline">Registration</a>
            </div>
        </div>
    </footer>

    <script>lucide.createIcons();</script>
</body>
</html>