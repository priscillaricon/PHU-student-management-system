
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register User - PHU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen text-slate-800">

    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <a href="{{ route('dashboard') }}"
               class="text-xl font-extrabold text-slate-900">
                Pearl Horizon University
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="text-emerald-600 font-semibold hover:underline">
                User Directory
            </a>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-5 py-10">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">

            <h1 class="text-3xl font-extrabold text-slate-900">
                Register New User
            </h1>

            <p class="text-slate-500 mt-2 mb-7">
                Create a student, lecturer or administrator account.
            </p>

            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-xl mb-6">
                    <p class="font-semibold mb-2">Please correct these errors:</p>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="block font-semibold mb-2" for="account_type">
                        Account Type
                    </label>

                    <select name="account_type" id="account_type" required
                            class="w-full border border-slate-300 rounded-xl p-3">
                        <option value="">Choose account type</option>
                        <option value="student" {{ old('account_type') === 'student' ? 'selected' : '' }}>
                            Student
                        </option>
                        <option value="lecturer" {{ old('account_type') === 'lecturer' ? 'selected' : '' }}>
                            Lecturer
                        </option>
                        <option value="admin" {{ old('account_type') === 'admin' ? 'selected' : '' }}>
                            Administrator
                        </option>
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2" for="name">
                        Full Name
                    </label>
                    <input type="text" name="name" id="name"
                           value="{{ old('name') }}" required
                           class="w-full border border-slate-300 rounded-xl p-3"
                           placeholder="Enter full name">
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2" for="email">
                        Email Address
                    </label>
                    <input type="email" name="email" id="email"
                           value="{{ old('email') }}" required
                           class="w-full border border-slate-300 rounded-xl p-3"
                           placeholder="Enter email address">
                </div>

                <div id="student-fields" class="hidden border-t pt-5 mt-5">
                    <h2 class="font-bold text-lg mb-4">Student Information</h2>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2" for="reg_no">
                            Registration Number
                        </label>
                        <input type="text" name="reg_no" id="reg_no"
                               value="{{ old('reg_no') }}"
                               class="w-full border border-slate-300 rounded-xl p-3"
                               placeholder="e.g. 24/U/12345/EVE">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2" for="program">
                            Academic Programme
                        </label>
                        <input type="text" name="program" id="program"
                               value="{{ old('program') }}"
                               class="w-full border border-slate-300 rounded-xl p-3"
                               placeholder="e.g. Bachelor of Business Computing">
                    </div>
                </div>

                <div id="lecturer-fields" class="hidden border-t pt-5 mt-5">
                    <h2 class="font-bold text-lg mb-4">Lecturer Information</h2>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2" for="department">
                            Department
                        </label>
                        <input type="text" name="department" id="department"
                               value="{{ old('department') }}"
                               class="w-full border border-slate-300 rounded-xl p-3"
                               placeholder="e.g. Business Computing">
                    </div>

                    <p class="text-sm text-slate-500 mb-5">
                        If this lecturer already has a lecturer record with the same
                        email and name, the system will link the new login account
                        to that existing record.
                    </p>
                </div>

                <div class="border-t pt-5 mt-5">
                    <h2 class="font-bold text-lg mb-4">Login Security</h2>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2" for="password">
                            Password
                        </label>
                        <input type="password" name="password" id="password"
                               required minlength="8"
                               class="w-full border border-slate-300 rounded-xl p-3"
                               placeholder="At least 8 characters">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2" for="password_confirmation">
                            Confirm Password
                        </label>
                        <input type="password" name="password_confirmation"
                               id="password_confirmation" required
                               class="w-full border border-slate-300 rounded-xl p-3"
                               placeholder="Enter password again">
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 mt-7">
                    <button type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-semibold">
                        Register Account
                    </button>

                    <a href="{{ route('admin.users.index') }}"
                       class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-xl font-semibold">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </main>

    <script>
        const accountType = document.getElementById('account_type');
        const studentFields = document.getElementById('student-fields');
        const lecturerFields = document.getElementById('lecturer-fields');

        const studentInputs = studentFields.querySelectorAll('input');
        const lecturerInputs = lecturerFields.querySelectorAll('input');

        function updateAccountFields() {
            const type = accountType.value;

            studentFields.classList.toggle('hidden', type !== 'student');
            lecturerFields.classList.toggle('hidden', type !== 'lecturer');

            studentInputs.forEach(input => {
                input.required = type === 'student';
            });

            lecturerInputs.forEach(input => {
                input.required = type === 'lecturer';
            });
        }

        accountType.addEventListener('change', updateAccountFields);

        updateAccountFields();
    </script>

</body>
</html>
