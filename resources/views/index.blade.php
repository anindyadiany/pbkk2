@extends('layouts.app')

@section('title', 'Applicants')

@section('content')
 <!-- NAVBAR -->
    <header class="bg-neutral-900 text-white py-4">
        <div class="max-w-7xl mx-auto px-8 flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/starea.svg') }}" alt="App Logo" class="h-10 w-auto">
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center space-x-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-base font-normal text-white hover:text-gray-300 transition">
                            Profile
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-base font-semibold text-white hover:text-gray-300 transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2 border border-white rounded-md text-base font-semibold hover:bg-white hover:text-neutral-900 transition">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>
<main class="max-w-6xl mx-auto px-6 py-10">
    <div class="flex items-center justify-between gap-4">
        <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Applicants</h1>

        <form method="get" class="flex items-center gap-2">
            <input
                type="text"
                name="q"
                value="{{ $q ?? '' }}"
                placeholder="Search name/email/generation…"
                class="rounded-lg border border-gray-300 bg-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-neutral-900"
            />
            <button class="rounded-lg bg-neutral-900 text-white px-4 py-2 hover:bg-neutral-800">Search</button>
        </form>
    </div>

    <div class="mt-6 overflow-x-auto rounded-xl border border-gray-200 bg-white">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr class="[&>th]:px-4 [&>th]:py-3">
                    <th>#</th>
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
                    <tr class="[&>td]:px-4 [&>td]:py-3 hover:bg-gray-50">
                        <td class="text-gray-500">
                            {{ ($applications->currentPage()-1)*$applications->perPage() + $i + 1 }}
                        </td>
                        <td class="font-medium">{{ $app->name }}</td>
                        <td class="text-gray-700">{{ $app->email }}</td>
                        <td>{{ $app->generation ?? '—' }}</td>
                        <td class="text-gray-600">{{ \Illuminate\Support\Str::limit($app->motivation, 60) }}</td>
                        <td class="text-gray-600">{{ $app->created_at?->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('applications.show', $app) }}"
                               class="inline-flex items-center rounded-md px-3 py-1.5 text-sm ring-1 ring-gray-300 hover:bg-gray-50">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No applications yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $applications->links() }}
    </div>

    <div class="mt-8">
        <a href="{{ route('apply') }}"
           class="inline-flex items-center rounded-xl px-5 py-2.5 bg-neutral-900 text-white hover:bg-neutral-800">
            + New Application
        </a>
    </div>
</main>
@endsection
