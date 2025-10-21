<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Profile</title>
  @vite('resources/css/app.css')
  <style>
    html, body {
      font-family: "Helvetica Narrow", "Arial Narrow", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
  </style>
</head>

<body class="min-h-screen bg-cover bg-center bg-no-repeat text-gray-900"
      style="background-image: url('{{ asset('images/hmm.png') }}');">

  {{-- Header --}}
  <header class="bg-neutral-900/90 text-white py-4 shadow-md backdrop-blur-sm">
      <div class="max-w-7xl mx-auto px-8 flex items-center justify-between">
          <a href="{{ url('/') }}" class="flex items-center gap-2">
              <img src="{{ asset('images/starea.svg') }}" alt="App Logo" class="h-10 w-auto">
          </a>

          <nav class="flex items-center space-x-6">
              <a href="{{ route('apply') }}" class="text-base font-normal text-white hover:text-gray-300 transition">
                  Apply Now
              </a>
              <a href="{{ route('applications.index') }}" class="text-base font-normal text-white hover:text-gray-300 transition">
                  View Applicants
              </a>
              @auth
                  <form method="POST" action="{{ route('logout') }}" class="inline">
                      @csrf
                      <button type="submit" class="text-base font-normal text-white hover:text-gray-300 transition">
                          Log Out
                      </button>
                  </form>
              @endauth
          </nav>
      </div>
  </header>

  {{-- Main --}}
  <main class="flex justify-center items-center min-h-[calc(100vh-5rem)] px-6 py-16 bg-white/40 backdrop-blur-xs">
    <div class="bg-white/90 rounded-2xl shadow-lg p-8 max-w-3xl w-full">
      <h1 class="text-3xl font-normal text-gray-900 mb-6 text-center">Your Profile</h1>

      <div class="space-y-6">
        <div>
          <p class="text-sm text-gray-500">Full Name</p>
          <p class="text-lg font-medium text-gray-900">{{ Auth::user()->name }}</p>
        </div>

        <div>
          <p class="text-sm text-gray-500">Email Address</p>
          <p class="text-lg font-medium text-gray-900">{{ Auth::user()->email }}</p>
        </div>

        <div>
          <p class="text-sm text-gray-500">Member Since</p>
          <p class="text-lg font-medium text-gray-900">{{ Auth::user()->created_at->format('F Y') }}</p>
        </div>
      </div>

      <div class="mt-8 flex justify-end">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="px-6 py-2 rounded-md bg-neutral-900 text-white hover:bg-neutral-800 transition">
            Log Out
          </button>
        </form>
      </div>
    </div>
  </main>

</body>
</html>
