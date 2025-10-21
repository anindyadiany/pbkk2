<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Application #{{ $application->id }}</title>
  @vite('resources/css/app.css')
  <style>
    html, body {
      font-family: "Helvetica Narrow", "Arial Narrow", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-900">

  <!-- ✅ NAVBAR (same design as welcome) -->
  <header class="bg-neutral-900 text-white py-4">
      <div class="max-w-7xl mx-auto px-8 flex items-center justify-between">
          <!-- Logo -->
          <a href="{{ url('/') }}" class="flex items-center gap-2">
              <img src="{{ asset('images/starea.svg') }}" alt="App Logo" class="h-10 w-auto">
          </a>

          <!-- Links -->
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

  <!-- ✅ MAIN CONTENT -->
  <main class="max-w-3xl mx-auto px-6 py-10">
    <a href="{{ route('applications.index') }}"
       class="inline-flex items-center rounded-md px-3 py-1.5 text-sm ring-1 ring-gray-300 hover:bg-gray-50">
      ← Back
    </a>

    <div class="mt-6 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
      <h1 class="text-2xl font-normal text-gray-900 mb-4">Application #{{ $application->id }}</h1>

      <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <dt class="text-sm text-gray-500">Name</dt>
          <dd class="text-base font-medium">{{ $application->name }}</dd>
        </div>

        <div>
          <dt class="text-sm text-gray-500">Email</dt>
          <dd class="text-base font-medium">{{ $application->email }}</dd>
        </div>

        <div>
          <dt class="text-sm text-gray-500">Generation</dt>
          <dd class="text-base font-medium">{{ $application->generation ?? '—' }}</dd>
        </div>

        <div>
          <dt class="text-sm text-gray-500">Submitted</dt>
          <dd class="text-base font-medium">{{ $application->created_at?->format('Y-m-d H:i') }}</dd>
        </div>
      </dl>

      <div class="mt-6">
        <dt class="text-sm text-gray-500">Motivation</dt>
        <dd class="mt-1 whitespace-pre-line text-gray-800">{{ $application->motivation }}</dd>
      </div>
    </div>
  </main>
</body>
</html>
