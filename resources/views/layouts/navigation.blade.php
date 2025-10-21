<header class="bg-neutral-900 text-white py-4">
    <div class="max-w-7xl mx-auto px-8 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/starea.svg') }}" alt="App Logo" class="h-10 w-auto">
        </a>

        <!-- Menu Items -->
        <nav class="flex items-center space-x-6">
            <a href="{{ route('apply') }}" class="text-base font-normal text-white hover:text-gray-300 transition">
                Apply Now
            </a>

            <a href="{{ route('applications.index') }}" class="text-base font-normal text-white hover:text-gray-300 transition">
                View Applicants
            </a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-base font-normal text-white hover:text-gray-300 transition">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-base font-normal text-white hover:text-gray-300 transition">
                            Log Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-base font-normal text-white hover:text-gray-300 transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2 border border-white rounded-md text-base font-normal hover:bg-white hover:text-neutral-900 transition">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </div>
</header>
