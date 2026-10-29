
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Student - PHU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold mb-5">Add New Student</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <label class="block mb-1">Registration Number</label>
            <input name="reg_no" value="{{ old('reg_no') }}" required
                   class="border p-2 w-full rounded mb-4">

            <label class="block mb-1">Full Name</label>
            <input name="full_name" value="{{ old('full_name') }}" required
                   class="border p-2 w-full rounded mb-4">

            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="border p-2 w-full rounded mb-4">

            <label class="block mb-1">Program</label>
            <input name="program" value="{{ old('program') }}" required
                   class="border p-2 w-full rounded mb-4">

            <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded">
                Save Student
            </button>

            <a href="{{ route('students.index') }}"
               class="ml-3 text-gray-600">Cancel</a>
        </form>
    </div>
</body>
</html>
