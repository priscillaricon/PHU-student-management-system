<x-guest-layout>
    <x-authentication-card>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-center">
            <h2 class="text-xl font-bold text-gray-800">
                Pearl Horizon University
            </h2>
            <p class="text-sm text-gray-600">
                Create your account
            </p>
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- ACCOUNT TYPE -->
            <div>
                <x-label for="account_type" value="Register As" />

                <select
                    id="account_type"
                    name="account_type"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                    required
                    onchange="toggleRegistrationFields()"
                >
                    <option value="">Select Account Type</option>
                    <option value="student" {{ old('account_type') == 'student' ? 'selected' : '' }}>
                        Student
                    </option>
                    <option value="lecturer" {{ old('account_type') == 'lecturer' ? 'selected' : '' }}>
                        Lecturer
                    </option>
                </select>
            </div>

            <!-- FULL NAME -->
            <div class="mt-4">
                <x-label for="name" value="Full Name" />
                <x-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                />
            </div>

            <!-- EMAIL -->
            <div class="mt-4">
                <x-label for="email" value="Email Address" />
                <x-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                />
            </div>

            <!-- STUDENT FIELDS -->
            <div id="student_fields" class="hidden">

                <div class="mt-4">
                    <x-label for="reg_no" value="Student Registration Number" />
                    <x-input
                        id="reg_no"
                        class="block mt-1 w-full"
                        type="text"
                        name="reg_no"
                        :value="old('reg_no')"
                        placeholder="e.g. 24/U/12345/EVE"
                    />
                </div>

                <div class="mt-4">
                    <x-label for="program" value="Academic Programme" />
                    <x-input
                        id="program"
                        class="block mt-1 w-full"
                        type="text"
                        name="program"
                        :value="old('program')"
                        placeholder="e.g. Bachelor of Business Computing"
                    />
                </div>

            </div>

            <!-- LECTURER INFORMATION -->
            <div id="lecturer_fields" class="hidden mt-4">
                <p class="text-sm text-blue-700 bg-blue-50 p-3 rounded">
                    Your name and email must match the lecturer records
                    already registered by the PHU administrator.
                </p>
            </div>

            <!-- PASSWORD -->
            <div class="mt-4">
                <x-label for="password" value="Password" />
                <x-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Confirm Password" />
                <x-input
                    id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-6">

                <a
                    class="underline text-sm text-gray-600"
                    href="{{ route('login') }}"
                >
                    Already registered?
                </a>

                <x-button>
                    Create Account
                </x-button>

            </div>

        </form>

        <script>
            function toggleRegistrationFields() {
                const accountType = document.getElementById('account_type').value;

                const studentFields = document.getElementById('student_fields');
                const lecturerFields = document.getElementById('lecturer_fields');

                const regNo = document.getElementById('reg_no');
                const program = document.getElementById('program');

                studentFields.classList.toggle('hidden', accountType !== 'student');
                lecturerFields.classList.toggle('hidden', accountType !== 'lecturer');

                regNo.required = accountType === 'student';
                program.required = accountType === 'student';
            }

            document.addEventListener('DOMContentLoaded', toggleRegistrationFields);
        </script>

    </x-authentication-card>
</x-guest-layout>
