<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Application #{{ $application->id }}</title>
  @vite('resources/css/app.css')
</head>
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
<body class="min-h-screen bg-cover bg-center bg-no-repeat text-gray-900"
      style="background-image: url('{{ asset('images/hmm.png') }}');">

  <!-- Subtle overlay like the apply form -->
  <div class="flex justify-center items-center min-h-screen bg-white/50 backdrop-blur-xs px-4">

    <div class="w-full max-w-lg bg-white/90 p-8 rounded-2xl shadow-lg">
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl sm:text-3xl font-regular text-gray-800">Edit Application</h1>

        <a href="{{ route('applications.index') }}"
           class="inline-flex items-center rounded-xl px-3 py-2 bg-transparent text-gray-700 ring-1 ring-gray-300 hover:bg-gray-100 transition text-sm">
          ← Back
        </a>
      </div>

      {{-- Validation errors --}}
      @if ($errors->any())
        <div class="mb-4 rounded-xl bg-red-50 text-red-700 p-3 text-sm">
          <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('applications.update', $application) }}" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div>
          <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
          <input id="name" name="name" type="text"
                 value="{{ old('name', $application->name) }}"
                 class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                 required>
        </div>

        {{-- Email --}}
        <div>
          <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
          <input id="email" name="email" type="email"
                 value="{{ old('email', $application->email) }}"
                 class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                 required>
        </div>

        {{-- Generation (optional) --}}
        <div>
          <label for="generation" class="block text-gray-700 text-sm font-medium mb-2">Generation (optional)</label>
          <input id="generation" name="generation" type="text"
                 value="{{ old('generation', $application->generation) }}"
                 placeholder="C27"
                 class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        </div>

        {{-- Motivation --}}
        <div>
          <label for="motivation" class="block text-gray-700 text-sm font-medium mb-2">Motivation</label>
          <textarea id="motivation" name="motivation" rows="4"
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    required>{{ old('motivation', $application->motivation) }}</textarea>
        </div>

        {{-- Buttons --}}
        <div class="mt-2 flex items-center justify-center gap-4">
          <button type="submit"
                  class="inline-flex items-center rounded-xl px-6 py-3 bg-gray-900 text-white hover:bg-gray-800 transition shadow text-lg font-medium">
            Save changes
          </button>
          <a href="{{ route('applications.index') }}"
             class="inline-flex items-center rounded-xl px-6 py-3 bg-transparent text-gray-700 ring-1 ring-gray-300 hover:bg-gray-100 transition text-lg font-medium">
            Cancel
          </a>
        </div>
      </form>
    </div>

  </div>

</body>
</html>
