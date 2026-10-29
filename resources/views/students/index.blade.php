
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Directory - PHU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold mb-4">Student Directory</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('students.create') }}"
           class="inline-block bg-green-600 text-white px-4 py-2 rounded mb-4">
            Add Student
        </a>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3">Registration No.</th>
                        <th class="p-3">Full Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Program</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="border-b">
                            <td class="p-3">{{ $student->reg_no }}</td>
                            <td class="p-3">{{ $student->full_name }}</td>
                            <td class="p-3">{{ $student->email }}</td>
                            <td class="p-3">{{ $student->program }}</td>
                            <td class="p-3 whitespace-nowrap">
                                <a class="text-blue-600 mr-2"
                                   href="{{ route('students.show', $student) }}">
                                    View
                                </a>

                                <a class="text-green-600 mr-2"
                                   href="{{ route('students.edit', $student) }}">
                                    Edit
                                </a>

                                <form action="{{ route('students.destroy', $student) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center">
                                No students have been added yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</body>
</html>
