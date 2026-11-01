<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System — Pearl Horizon University</title>
    <link rel="icon" type="image/jpeg" href="asset/image/4dccccd5d-c753-4fb1-98b8-92fdf8b1c13b.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] } } } };
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>


    
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    <!-- Header Navigation -->
    <header class="fixed top-0 z-50 w-full bg-white border-b border-slate-200 h-16 flex items-center px-6 justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <img src="assets/image/logo.jpg" alt="PHU Logo" class="h-20 w-20 object-contain rounded-full border border-slate-200">
            <div>
                <span class="font-bold text-slate-900 text-sm leading-tight block">Pearl Horizon University</span>
                <span class="text-[10px] text-slate-500 block">Student Management System</span>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-lg">Administrator</span>
            <a href="login.html" class="text-xs font-semibold text-red-600 hover:text-red-700 flex items-center gap-1">
                <i data-lucide="log-out" class="w-3.5 h-3.5"></i> Sign out
            </a>
        </div>
    </header>

    <!-- Sidebar Navigation -->
    <aside class="fixed top-16 left-0 z-40 w-64 h-[calc(100vh-4rem)] bg-white border-r border-slate-200 p-4 flex flex-col justify-between">
        <div class="space-y-1">
            <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Main Navigation</p>
            <a href="dashboard.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-blue-600">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
            </a>
            <a href="students.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-blue-600">
                <i data-lucide="users" class="w-4 h-4"></i> Students
            </a>
            <a href="course.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-blue-600">
                <i data-lucide="book-open" class="w-4 h-4"></i> Courses
            </a>
            <a href="registration.html" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-blue-600">
                <i data-lucide="clipboard-check" class="w-4 h-4"></i> Course Registrations
            </a>
        </div>
        <div class="p-3 border-t border-slate-200 flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">PN</div>
            <div class="overflow-hidden">
                <p class="text-xs font-medium text-slate-900 truncate">Priscillar Nakabugo</p>
                <p class="text-[10px] text-slate-500 truncate">admin@phu.ac.ug</p>
            </div>
        </div>
    </aside>

    <!-- Main Content Body -->
    <div class="pt-20 pl-64 pr-8 pb-12 flex-1 flex flex-col">
        <main class="flex-1 max-w-6xl w-full mx-auto">
            <!-- Page Specific Content goes here -->
        </main>
        
        <!-- Footer -->
        <footer class="mt-auto pt-6 text-center text-xs text-slate-400 border-t border-slate-200">
            <p>© 2026 Pearl Horizon University (PHU). All rights reserved.</p>
            
        </footer>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>