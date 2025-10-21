<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bureau Application Form</title>
@vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-cover bg-center bg-no-repeat text-gray-900"
style="background-image: url('{{ asset('images/hmm.png') }}');">

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

<div class="flex justify-center items-center min-h-screen bg-white/50 backdrop-blur-xs">

<form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data"
class="w-full max-w-lg bg-white/90 p-8 rounded-2xl shadow-lg">
@csrf

<h2 class="text-3xl font- text-center mb-6 text-gray-800">External Affairs Recruitment!</h2>

{{-- Name --}}
<div class="flex flex-wrap -mx-3 mb-6">
<div class="w-full px-3">
<label class="block text-gray-700 text-sm font-medium mb-2" for="name">Full Name</label>
<input name="name" id="name" type="text" placeholder="Seijoh"
class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
required>
</div>
</div>

{{-- Email --}}
<div class="flex flex-wrap -mx-3 mb-6">
<div class="w-full px-3">
<label class="block text-gray-700 text-sm font-medium mb-2" for="email">Email</label>
<input name="email" id="email" type="email" placeholder="seijohhhhh@example.com"
class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
required>
</div>
</div>


{{-- Motivation --}}
<div class="flex flex-wrap -mx-3 mb-6">
<div class="w-full px-3">
<label class="block text-gray-700 text-sm font-medium mb-2" for="motivation">Motivation</label>
<textarea name="motivation" id="motivation" rows="4" placeholder="Why do you want to join?"
class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
required></textarea>
</div>
</div>


{{-- Buttons --}}
<div class="mt-8 flex items-center justify-center gap-4">
<button type="submit"
class="inline-flex items-center rounded-xl px-6 py-3 bg-gray-900 text-white hover:bg-gray-800 transition shadow text-lg font-medium">
Submit Application
</button>
<a href="{{ url('/') }}"
class="inline-flex items-center rounded-xl px-6 py-3 bg-transparent text-gray-700 ring-1 ring-gray-300 hover:bg-gray-100 transition text-lg font-medium">
Cancel
</a>
</div>

</form>
</div>

</body>

</html>