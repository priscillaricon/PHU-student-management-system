<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Directory - Pearl Horizon University</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen text-slate-800">

    <!-- Navigation -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-5 flex flex-wrap justify-between items-center gap-4">

            <a href="{{ route('home') }}" class="text-xl font-extrabold text-slate-900">
                Pearl Horizon University
            </a>

            <nav class="flex flex-wrap gap-5 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-emerald-600">
                    Home
                </a>

                <a href="{{ route('dashboard') }}" class="hover:text-emerald-600">
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}" class="text-emerald-600 font-bold">
                    Students
                </a>

                <a href="{{ route('courses.index') }}" class="hover:text-emerald-600">
                    Courses
                </a>

                <a href="{{ route('registration') }}" class="hover:text-emerald-600">
                    Registrations
                </a>
            </nav>

        </div>
    </header>


    <!-- Student Directory -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6">

                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">
                        Student Directory
                    </h1>

                    <p class="text-slate-500 mt-2">
                        View and manage Pearl Horizon University student records.
                    </p>
                </div>

                <a href="{{ route('students.create') }}"
                   class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-semibold text-sm">
                    + Add Student
                </a>

            </div>


            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-emerald-100 text-emerald-800 p-4 rounded-xl mb-5">
                    {{ session('success') }}
                </div>
            @endif


            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-xl mb-5">

                    <p class="font-semibold mb-2">
                        Please correct the following errors:
                    </p>

                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif


            <!-- Student Table -->
            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <thead>
                        <tr class="bg-slate-100 text-slate-700">

                            <th class="p-4">Registration No.</th>
                            <th class="p-4">Full Name</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Program</th>
                            <th class="p-4">Actions</th>

                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($students as $student)

                            <tr class="border-b border-slate-200 hover:bg-slate-50">

                                <td class="p-4 font-medium">
                                    {{ $student->reg_no }}
                                </td>

                                <td class="p-4">
                                    {{ $student->full_name }}
                                </td>

                                <td class="p-4">
                                    {{ $student->email }}
                                </td>

                                <td class="p-4">
                                    {{ $student->program }}
                                </td>

                                <td class="p-4 whitespace-nowrap">

                                    <a href="{{ route('students.show', $student) }}"
                                       class="text-blue-600 hover:underline mr-3">
                                        View
                                    </a>

                                    <a href="{{ route('students.edit', $student) }}"
                                       class="text-emerald-600 hover:underline mr-3">
                                        Edit
                                    </a>

                                    <form action="{{ route('students.destroy', $student) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this student?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-600 hover:underline">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="p-8 text-center text-slate-500">
                                    No students have been added yet.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- Pagination -->
            <div class="mt-6">
                {{ $students->links() }}
            </div>

        </div>

    </main>


    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-10">
        <div class="max-w-7xl mx-auto px-6 py-5 text-center text-sm text-slate-500">
            &copy; {{ date('Y') }} Pearl Horizon University. All rights reserved.
        </div>
    </footer>

</body>
</html>

