<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Applicants</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-cover bg-center bg-no-repeat text-gray-900"
      style="background-image: url('{{ asset('images/eak.png') }}');">

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
  <!-- Subtle overlay for readability -->
  <div class="min-h-screen flex flex-col items-center justify-start bg-white/30 backdrop-blur-[2px] py-10 px-6">

    <main class="w-full max-w-6xl bg-white/80 rounded-2xl shadow-md p-8">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h1 class="text-3xl font-regular tracking-tight text-gray-900">Applicants</h1>

        <form method="GET" action="{{ route('applications.index') }}" class="flex items-center gap-2">
          <input
            type="text"
            name="q"
            value="{{ request('q', '') }}"
            placeholder="Search…"
            class="rounded-lg border border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"
          />
          <button class="rounded-lg bg-gray-900 text-white px-4 py-2 hover:bg-gray-800 transition">
            Search
          </button>
        </form>
      </div>

      <div class="mt-6 overflow-x-auto rounded-xl border border-gray-200 bg-white">
        <table class="min-w-full text-left text-sm table-fixed">
          <colgroup>
            <col class="w-14" />            {{-- No --}}
            <col class="w-44" />            {{-- Name --}}
            <col class="w-56" />            {{-- Email --}}
            <col class="w-28" />            {{-- Generation --}}
            <col class="w-[28rem]" />       {{-- Motivation --}}
            <col class="w-40" />            {{-- Submitted --}}
            <col class="w-40" />            {{-- Actions --}}
          </colgroup>

          <thead class="bg-gray-100 text-gray-700">
            <tr class="[&>th]:px-4 [&>th]:py-3">
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Generation</th>
              <th>Motivation</th>
              <th>Submitted</th>
              <th></th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-100">
            @forelse ($applications as $i => $app)
              <tr class="[&>td]:px-4 [&>td]:py-3 hover:bg-gray-50 transition">
                <td class="text-gray-500">
                  {{ ($applications->currentPage() - 1) * $applications->perPage() + $i + 1 }}
                </td>

                <td class="font-medium text-gray-900 truncate">
                  {{ $app->name }}
                </td>

                <td class="text-gray-700 truncate break-all">
                  {{ $app->email }}
                </td>

                <td class="whitespace-nowrap">
                  {{ $app->generation ?? '—' }}
                </td>

                <td class="text-gray-600 overflow-hidden whitespace-nowrap text-ellipsis">
                  {{ \Illuminate\Support\Str::limit($app->motivation, 120) }}
                </td>

                <td class="text-gray-600 whitespace-nowrap">
                  {{ optional($app->created_at)->format('Y-m-d H:i') }}
                </td>

                <td>
                  <div class="flex items-center gap-2">
                    {{-- View --}}
                    <a href="{{ route('applications.show', $app) }}"
                       class="inline-flex items-center rounded-md px-3 py-1.5 text-sm ring-1 ring-gray-300 hover:bg-gray-100 transition">
                      View
                    </a>

                    {{-- Edit --}}
                    <a href="{{ route('applications.edit', $app) }}"
                       class="inline-flex items-center rounded-md px-3 py-1.5 text-sm
                              bg-blue-50 text-blue-700 ring-1 ring-blue-200
                              hover:bg-blue-100 hover:ring-blue-300 transition">
                      Edit
                    </a>

                    {{-- Delete --}}
                    <form action="{{ route('applications.destroy', $app) }}" method="POST"
                          onsubmit="return confirm('Delete this application? This action cannot be undone.');">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                              class="inline-flex items-center rounded-md px-3 py-1.5 text-sm
                                     bg-red-50 text-red-700 ring-1 ring-red-200
                                     hover:bg-red-100 hover:ring-red-300 transition">
                        Delete
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                  @if (request('q'))
                    No applications match your search.
                  @else
                    No applications yet.
                  @endif
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-6">
        {{ $applications->appends(request()->query())->links() }}
      </div>

      <div class="mt-8 flex justify-center">
        <a href="{{ route('apply') }}"
           class="inline-flex items-center rounded-xl px-6 py-3 bg-gray-900 text-white hover:bg-gray-800 transition shadow text-lg font-medium">
          + New Application
        </a>
      </div>
    </main>

  </div>

</body>
</html>
