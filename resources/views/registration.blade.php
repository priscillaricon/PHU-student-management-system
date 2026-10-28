<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration — Pearl Horizon University</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans min-h-screen flex flex-col">

    <header class="fixed top-0 z-50 w-full bg-white border-b border-slate-200 h-16 flex items-center px-6 justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <img src="assets/image/logo.jpg" alt="PHU Logo" class="h-9 w-9 object-contain rounded-full border border-slate-200">
            <div>
                <span class="font-bold text-slate-900 text-sm leading-tight block">Pearl Horizon University</span>
                <span class="text-[10px] text-slate-500 block">Student Management System</span>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-100">Administrator</span>
            <a href="login.html" class="text-xs font-semibold text-red-600 hover:text-red-700 flex items-center gap-1">
                <i data-lucide="log-out" class="w-3.5 h-3.5"></i> Sign out
            </a>
        </div>
    </header>

    <aside class="fixed top-16 left-0 z-40 w-64 h-[calc(100vh-4rem)] bg-white border-r border-slate-200 p-4 flex flex-col justify-between">
        <div class="space-y-1">
            <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Main Navigation</p>
            <a href="dashboard.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
            </a>
            <a href="students.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
                <i data-lucide="users" class="w-4 h-4"></i> Students
            </a>
            <a href="course.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
                <i data-lucide="book-open" class="w-4 h-4"></i> Courses
            </a>
            <a href="registration.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium bg-emerald-50 text-emerald-700 font-semibold">
                <i data-lucide="clipboard-check" class="w-4 h-4"></i> Course Registrations
            </a>
        </div>
        <div class="p-3 border-t border-slate-200 flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm">PN</div>
            <div class="overflow-hidden">
                <p class="text-xs font-medium text-slate-900 truncate">Priscillar Nakabugo</p>
                <p class="text-[10px] text-slate-500 truncate">admin@phu.ac.ug</p>
            </div>
        </div>
    </aside>

    <div class="pt-20 pl-64 pr-8 pb-12 flex-1 flex flex-col">
        <main class="flex-1 max-w-2xl w-full mx-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-slate-900">Course Registration Form</h1>
                <p class="text-slate-500 text-sm mt-1">Register a student for semester course units.</p>
            </div>

            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <form action="#" method="POST" class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Select Student</label>
                        <select class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-600 text-sm">
                            <option value="">Choose a student...</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Select Course Unit</label>
                        <select class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-600 text-sm">
                            <option value="">Choose a course...</option>
                        </select>
                    </div>

                    <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-lg flex items-start gap-3">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>
                        <p class="text-xs text-emerald-900 leading-relaxed">
                            <strong>Duplicate Protection Active:</strong> Students cannot register twice for the same course unit in a single semester[cite: 1, 2].
                        </p>
                    </div>

                    <button type="submit" class="w-full py-3 px-4 bg-emerald-600 text-white rounded-lg font-semibold text-sm hover:bg-emerald-700 shadow-sm">
                        Complete Course Registration
                    </button>
                </form>
            </div>
        </main>
        
        <footer class="mt-auto pt-6 text-center text-xs text-slate-400 border-t border-slate-200">
            <p>© 2026 Pearl Horizon University (PHU). All rights reserved.</p>
        </footer>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>