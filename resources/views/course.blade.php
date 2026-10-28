<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses — Pearl Horizon University</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans min-h-screen flex flex-col">

    <header class="fixed top-0 z-50 w-full bg-white border-b border-slate-200 h-16 flex items-center px-6 justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <img src="assets/image/logo.jpg" alt="PHU Logo" class="h-15 w-15 object-contain rounded-full border border-slate-200">
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
            <a href="course.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium bg-emerald-50 text-emerald-700 font-semibold">
                <i data-lucide="book-open" class="w-4 h-4"></i> Courses
            </a>
            <a href="registration.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-emerald-600">
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
        <main class="flex-1 max-w-6xl w-full mx-auto">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Academic Courses</h1>
                    <p class="text-slate-500 text-sm mt-1">Manage university courses, credit units, and assigned lecturers.</p>
                </div>
                <button class="flex items-center gap-2 px-4 py-2.5 bg-emerald-600 text-white rounded-lg font-semibold text-sm hover:bg-emerald-700 shadow-sm">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i> Add New Course
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-emerald-300 transition-colors">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2.5 py-1 text-xs font-bold bg-emerald-100 text-emerald-800 rounded-lg">BUC3131</span>
                        <span class="text-xs text-slate-500 font-semibold">4 Credit Units</span>
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Advanced Web Application Development</h3>
                    <p class="text-xs text-slate-500 mb-4">Covers Laravel framework, migrations, Eloquent relationships, Blade views, and authorization.</p>
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-600">
                        <span class="flex items-center gap-1.5"><i data-lucide="user" class="w-4 h-4 text-emerald-600"></i> Dr. S. Kwikiriza</span>
                        <div class="flex gap-2">
                            <button class="p-1.5 text-slate-400 hover:text-emerald-600"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="p-1.5 text-slate-400 hover:text-red-600"><i data-lucide="trash" class="w-4 h-4"></i></button>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-emerald-300 transition-colors">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2.5 py-1 text-xs font-bold bg-emerald-100 text-emerald-800 rounded-lg">BUC3102</span>
                        <span class="text-xs text-slate-500 font-semibold">3 Credit Units</span>
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Database Management Systems</h3>
                    <p class="text-xs text-slate-500 mb-4">Relational database design, normalization, complex SQL queries, and transaction security.</p>
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-600">
                        <span class="flex items-center gap-1.5"><i data-lucide="user" class="w-4 h-4 text-emerald-600"></i> Prof. J. Okumu</span>
                        <div class="flex gap-2">
                            <button class="p-1.5 text-slate-400 hover:text-emerald-600"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="p-1.5 text-slate-400 hover:text-red-600"><i data-lucide="trash" class="w-4 h-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="mt-auto pt-6 text-center text-xs text-slate-400 border-t border-slate-200">
            <p>© 2026 Pearl Horizon University (PHU). All rights reserved.</p>
        </footer>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>