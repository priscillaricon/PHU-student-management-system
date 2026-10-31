<footer class="bg-white border-t border-slate-200 py-8 px-6 text-center text-xs text-slate-500">

    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">

        <div class="flex items-center gap-2">

            <img
                src="{{ asset('assets/image/logo.jpg') }}"
                alt="PHU Logo"
                class="w-9 h-9 rounded-full object-cover"
            >

            <span class="font-semibold text-slate-700">
                Pearl Horizon University
            </span>

        </div>

        <p>
            © {{ date('Y') }} Pearl Horizon University. All rights reserved.
        </p>

        <div class="flex gap-4">

            <a href="{{ route('login') }}" class="hover:underline">
                Staff Login
            </a>

            <a href="{{ route('lecturer-login') }}" class="hover:underline">
                Lecturer Login
            </a>

        </div>

    </div>

</footer>