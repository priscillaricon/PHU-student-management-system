<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User - PHU</title>
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
                Edit User Account
            </h1>

            <p class="text-slate-500 mt-2 mb-7">
                Update the user's account information and login security.
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

            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 mb-6">
                <p class="text-sm text-slate-500">Account Type</p>
                <p class="font-bold text-slate-800 capitalize">
                    {{ $user->role }}
                </p>
            </div>

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label class="block font-semibold mb-2" for="name">
                        Full Name
                    </label>

                    <input type="text" name="name" id="name"
                           value="{{ old('name', $user->name) }}"
                           required
                           class="w-full border border-slate-300 rounded-xl p-3"
                           placeholder="Enter full name">
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2" for="email">
                        Email Address
                    </label>

                    <input type="email" name="email" id="email"
                           value="{{ old('email', $user->email) }}"
                           required
                           class="w-full border border-slate-300 rounded-xl p-3"
                           placeholder="Enter email address">
                </div>

                <div class="border-t pt-5 mt-5">
                    <h2 class="font-bold text-lg mb-2">Login Security</h2>

                    <p class="text-sm text-slate-500 mb-5">
                        Leave the password fields empty if you do not want to
                        change the current password.
                    </p>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2" for="password">
                            New Password
                        </label>

                        <input type="password" name="password" id="password"
                               minlength="8"
                               class="w-full border border-slate-300 rounded-xl p-3"
                               placeholder="Enter new password (optional)">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2"
                               for="password_confirmation">
                            Confirm New Password
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               class="w-full border border-slate-300 rounded-xl p-3"
                               placeholder="Confirm new password">
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 mt-7">
                    <button type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-semibold">
                        Save Changes
                    </button>

                    <a href="{{ route('admin.users.index') }}"
                       class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-xl font-semibold">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>
