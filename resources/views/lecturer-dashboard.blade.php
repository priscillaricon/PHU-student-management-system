<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Workspace — Pearl Horizon University</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex flex-col selection:bg-indigo-600 selection:text-white">

    <header class="w-full bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="index.html" class="flex items-center gap-3">
                <img src="assets/image/logo.jpg" alt="PHU Logo" class="h-18 w-18 rounded-full border border-slate-200 object-cover">
                <div>
                    <span class="font-extrabold text-slate-900 text-lg leading-tight block tracking-tight">Pearl Horizon University</span>
                    <span class="text-xs text-indigo-600 font-semibold block">Faculty Portal</span>
                </div>
            </a>
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <span class="block text-sm font-bold text-slate-900">Dr. Sarah Namubiru</span>
                    <span class="block text-xs text-slate-500">Senior Lecturer • Business Computing</span>
                </div>
                <a href="lecturer-login.html" class="p-2.5 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-xl transition-colors" title="Sign Out">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto px-6 py-8 space-y-8">
        <div class="bg-gradient-to-r from-indigo-950 to-slate-900 text-white rounded-2xl p-6 sm:p-8 shadow-lg flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <span class="inline-block px-3 py-1 bg-indigo-500/20 text-indigo-200 border border-indigo-400/20 text-xs font-semibold rounded-full mb-1">
                    Semester I — Academic Year 2026
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Welcome, Dr. Sarah Namubiru</h1>
                <p class="text-slate-300 text-sm">Below are your assigned teaching modules and enrolled student lists.</p>
            </div>
            <div class="flex gap-3">
                <div class="bg-white/10 border border-white/10 rounded-xl p-3 text-center min-w-[100px]">
                    <span class="block text-2xl font-bold text-white">2</span>
                    <span class="block text-[11px] text-slate-300">Assigned Courses</span>
                </div>
                <div class="bg-white/10 border border-white/10 rounded-xl p-3 text-center min-w-[100px]">
                    <span class="block text-2xl font-bold text-indigo-300">84</span>
                    <span class="block text-[11px] text-slate-300">Total Students</span>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <i data-lucide="book-open" class="w-5 h-5 text-indigo-600"></i> My Assigned Courses
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4 hover:border-indigo-300 transition-colors">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="px-2.5 py-1 bg-indigo-50 text-indigo-700 font-bold text-xs rounded-lg border border-indigo-100">BBC 2104</span>
                            <h3 class="font-bold text-slate-900 text-lg mt-2">Advanced Web Application Development</h3>
                            <p class="text-xs text-slate-500 mt-1">Bachelor of Business Computing • Year 2</p>
                        </div>
                        <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full border border-emerald-100">Active</span>
                    </div>
                    <div class="flex items-center justify-between text-xs text-slate-600 pt-2 border-t border-slate-100">
                        <span><strong class="text-slate-900">4</strong> Credit Units</span>
                        <span><strong class="text-slate-900">48</strong> Enrolled Students</span>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4 hover:border-indigo-300 transition-colors">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="px-2.5 py-1 bg-indigo-50 text-indigo-700 font-bold text-xs rounded-lg border border-indigo-100">BBC 2108</span>
                            <h3 class="font-bold text-slate-900 text-lg mt-2">Database Systems & Design</h3>
                            <p class="text-xs text-slate-500 mt-1">Bachelor of Business Computing • Year 2</p>
                        </div>
                        <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full border border-emerald-100">Active</span>
                    </div>
                    <div class="flex items-center justify-between text-xs text-slate-600 pt-2 border-t border-slate-100">
                        <span><strong class="text-slate-900">3</strong> Credit Units</span>
                        <span><strong class="text-slate-900">36</strong> Enrolled Students</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden space-y-4 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <i data-lucide="users" class="w-5 h-5 text-indigo-600"></i> Registered Student Roster
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Students enrolled in BBC 2104: Advanced Web Application Development</p>
                </div>
                <div class="w-full sm:w-64">
                    <input type="text" placeholder="Search student by name or ID..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-600">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase tracking-wider">
                            <th class="p-3">Student Reg. No.</th>
                            <th class="p-3">Student Name</th>
                            <th class="p-3">Program</th>
                            <th class="p-3">Registration Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50/80">
                            <td class="p-3 font-semibold text-slate-900">2200701234</td>
                            <td class="p-3 text-slate-800">Priscillar Nakabugo</td>
                            <td class="p-3 text-slate-600">Bachelor of Business Computing</td>
                            <td class="p-3"><span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-medium">Verified / Registered</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50/80">
                            <td class="p-3 font-semibold text-slate-900">2200701235</td>
                            <td class="p-3 text-slate-800">Gideon Nova Kwikiriza</td>
                            <td class="p-3 text-slate-600">Bachelor of Business Computing</td>
                            <td class="p-3"><span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-medium">Verified / Registered</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-200 py-6 px-6 text-center text-xs text-slate-500">
        <p>© 2026 Pearl Horizon University. All rights reserved.</p>
    </footer>

    <script>lucide.createIcons();</script>
</body>
</html>
