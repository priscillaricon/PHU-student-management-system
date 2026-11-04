
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Directory - PHU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen text-slate-800">

    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-5 flex flex-wrap justify-between items-center gap-4">
            <a href="{{ route('dashboard') }}"
               class="text-xl font-extrabold text-slate-900">
                Pearl Horizon University
            </a>

            <nav class="flex gap-5 text-sm font-semibold">
                <a href="{{ route('dashboard') }}" class="hover:text-emerald-600">
                    Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="text-emerald-600">
                    User Accounts
                </a>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-5 py-10">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-7">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">
                        User Account Directory
                    </h1>
                    <p class="text-slate-500 mt-2">
                        View all student, lecturer and administrator login accounts.
                    </p>
                </div>

                <a href="{{ route('admin.users.create') }}"
                   class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-semibold text-sm">
                    + Register New User
                </a>
            </div>

            @if (session('success'))
                <div class="bg-emerald-100 text-emerald-800 p-4 rounded-xl mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">

                    <thead>
                        <tr class="bg-slate-100 text-slate-700">
                            <th class="p-4">No.</th>
                            <th class="p-4">Full Name</th>
                            <th class="p-4">Email Address</th>
                            <th class="p-4">Account Type</th>
                            <th class="p-4">Date Created</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                            <tr class="border-b border-slate-200 hover:bg-slate-50">

                                <td class="p-4">{{ $users->firstItem() + $loop->index }}</td>

                                <td class="p-4 font-medium">
                                    {{ $user->name }}
                                </td>

                                <td class="p-4">
                                    {{ $user->email }}
                                </td>

                                <td class="p-4">
                                    @if ($user->role === 'admin')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                                            Administrator
                                        </span>
                                    @elseif ($user->role === 'lecturer')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                            Lecturer
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                            Student
                                        </span>
                                    @endif
                                </td>

                                <td class="p-4 text-sm text-slate-500">
                                    {{ $user->created_at?->format('d M Y') }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-slate-500">
                                    No user accounts have been registered.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="mt-6">
                {{ $users->links() }}
            </div>

            <div class="mt-6">
                <a href="{{ route('dashboard') }}"
                   class="text-emerald-700 hover:underline font-semibold">
                    &larr; Back to Admin Dashboard
                </a>
            </div>

        </div>
    </main>

    <footer class="bg-white border-t border-slate-200 mt-10">
        <div class="max-w-7xl mx-auto px-6 py-5 text-center text-sm text-slate-500">
            &copy; {{ date('Y') }} Pearl Horizon University. All rights reserved.
        </div>
    </footer>

</body>
</html>
