<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Global Font: Helvetica Narrow -->
    <style>
        html, body {
            font-family: "Helvetica Narrow", "Arial Narrow", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        :root { --font-sans: "Helvetica Narrow", "Arial Narrow", "Helvetica Neue", Helvetica, Arial, sans-serif; }
    </style>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>/* minimal fallback when Vite isn't running */ .container{width:100%;}</style>
    @endif
</head>

<body class="min-h-screen bg-white text-[#1b1b18] font-sans">

    <!-- NAVBAR -->
    <header class="bg-neutral-900 text-white py-4">
        <div class="max-w-7xl mx-auto px-8 flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/starea.svg') }}" alt="App Logo" class="h-10 w-auto">
            </div>

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

    <!-- HERO -->
    <section class="relative h-[80vh] md:h-[88vh]">
        <img
            src="{{ asset('images/L1007399.JPG') }}"
            alt="Background"
            class="absolute inset-0 h-full w-full object-cover object-[center_55%]"
        />
        <div class="absolute inset-0 bg-neutral-900/40"></div>

        <div class="relative z-10 h-full flex items-center justify-center px-8">
            <div class="text-center max-w-5xl mx-auto">
                <h1 class="text-white tracking-tight font-normal text-4xl sm:text-5xl md:text-8xl">
                    external affairs department!
                </h1>

                <div class="mt-8 flex items-center justify-center gap-4">
                    @if (Route::has('apply'))
                        <a href="{{ route('apply') }}"
                           class="inline-flex items-center rounded-xl px-6 py-3 bg-white/90 text-gray-900 hover:bg-white transition shadow text-lg font-medium">
                            Apply now
                        </a>
                    @endif

                    <a href="{{ route('applications.index') }}"
                    class="inline-flex items-center rounded-xl px-6 py-3 bg-transparent text-white ring-1 ring-white/70 hover:bg-white/10 transition text-lg font-medium">
                        View Applicants
                    </a>

                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="bg-neutral-900 text-white py-12 md:py-14">
        <div class="max-w-7xl mx-auto px-8">
            <h2 class="text-3xl md:text-4xl font-regular mb-6">
                What is External Affairs?
            </h2>

            <div class="grid gap-8 md:grid-cols-2 leading-relaxed text-gray-300">
                <p>
                    Welcome to the External Affairs Department, the vanguard in building and maintaining the positive image of the Computer-Informatics Engineering Student Association (HMTC) ITS to the outside world. We are a department that embodies the spirit of Networking, Fun, and Travel &amp; Outings in every step we take. Our main mission is to be the bridge connecting HMTC with various strategic parties, from ITS Informatics Engineering alumni who have made their mark in numerous fields to other external stakeholders, both within and outside the scope of the ITS Student Body (KM ITS). We believe that strong relationships are the key to organizational success. Therefore, we dedicate ourselves to nurturing connections with our alumni, opening doors for collaboration, career insights, and mentorship, all while ensuring HMTC&apos;s reputation is consistently upheld and widely recognized as a professional and innovative organization.
                </p>
                <p>
                    For us, executing work programs isn&apos;t just about completing tasks; it&apos;s an exciting adventure filled with new experiences. This is where the concept of &quot;getting work done while traveling and having fun&quot; truly comes to life. We package all our professional responsibilities into dynamic and enjoyable activities. One of our unique facts is the opportunity to conduct benchmarking with over 15 student associations and Student Executive Boards (BEM) from various universities within a single management period. This isn&apos;t just about comparative studies; it&apos;s about broadening horizons, forging new friendships, and exploring new places. If you are an energetic individual who loves meeting new people and wants to develop your communication skills while experiencing the thrill of organizational life firsthand, then the External Affairs Department is the right home for you. Come join us and be part of an unforgettable journey!
                </p>
            </div>
        </div>
    </section>

    @php($leaders = $leaders ?? collect())
    <!-- LEADERSHIP -->
    <section class="bg-white pt-12 pb-10 sm:pt-16 sm:pb-12">
    <div class="mx-auto grid max-w-7xl gap-12 px-6 lg:px-8 xl:grid-cols-3">
        <div class="max-w-xl">
        <h2 class="text-4xl font-regular tracking-tight text-gray-900 sm:text-5xl mb-6">
            Meet our leaders!
        </h2>
        </div>

        <ul role="list" class="grid gap-x-12 gap-y-12 sm:grid-cols-2 xl:col-span-2">
        @forelse ($leaders as $leader)
            <li>
            <div class="flex items-center gap-x-8">
                @if ($leader->image)
                <img
                    src="{{ asset($leader->image) }}"
                    alt="{{ $leader->name }}"
                    class="size-24 rounded-full object-cover shadow-md"
                />
                @else
                <div class="size-24 rounded-full bg-gray-300 flex items-center justify-center text-gray-700 text-2xl font-bold shadow-inner">
                    {{ strtoupper(substr($leader->name, 0, 1)) }}
                </div>
                @endif

                <div>
                <h3 class="text-lg font-semibold tracking-tight text-gray-900">
                    {{ $leader->name }}
                    @if ($leader->generation)
                    <span class="text-gray-500 text-base">({{ $leader->generation }})</span>
                    @endif
                </h3>
                <p class="text-base font-medium text-gray-700 mt-1">{{ $leader->position }}</p>
                </div>
            </div>
            </li>
        @empty
            <li class="col-span-full text-gray-500 text-lg">No leaders found.</li>
        @endforelse
        </ul>
    </div>
    </section>



    <!-- BUREAU CARDS -->
    <section class="max-w-7xl mx-auto px-8 py-8">
    <h2 class="text-3xl md:text-4xl font-normal mb-6 text-center md:text-right">
        Bureaus of External Affairs!
    </h2>

    <div class="grid gap-6 md:grid-cols-3">
        {{-- External Bureau --}}
        <article class="rounded-lg border border-slate-200 shadow-sm bg-white overflow-hidden">
        <div class="w-full aspect-[16/9] bg-slate-100 flex items-center justify-center">
            <img
            src="{{ asset('images/L1007411.JPG') }}"
            alt="External Bureau"
            class="w-full h-full object-cover object-[center_55%]"
            />
        </div>
        <div class="p-5">
            <h3 class="text-xl font-semibold text-slate-900">External Bureau</h3>
            <p class="mt-2 text-slate-600">
            Partnerships, outreach, and cross-organization collaboration. Build bridges outside the organization.
            </p>
            <div class="mt-4 flex items-center gap-3">
            <a href="#about" class="px-4 py-2 rounded-md ring-1 ring-slate-300 text-slate-800 hover:bg-slate-50 transition">View more</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-neutral-900 text-white hover:bg-slate-900 transition">Register</a>
            @endif
            </div>
        </div>
        </article>

        {{-- Internal Bureau --}}
        <article class="rounded-lg border border-slate-200 shadow-sm bg-white overflow-hidden">
        <div class="w-full aspect-[16/9] bg-slate-100 flex items-center justify-center">
            <img
            src="{{ asset('images/L1227097.JPG') }}"
            alt="Internal Bureau"
            class="w-full h-full object-cover object-[center_55%]"
            />
        </div>
        <div class="p-5">
            <h3 class="text-xl font-semibold text-slate-900">Internal Bureau</h3>
            <p class="mt-2 text-slate-600">
            Operations, member support, and internal process excellence. Keep everything running smoothly.
            </p>
            <div class="mt-4 flex items-center gap-3">
            <a href="#about" class="px-4 py-2 rounded-md ring-1 ring-slate-300 text-slate-800 hover:bg-slate-50 transition">View more</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-neutral-900 text-white hover:bg-slate-900 transition">Register</a>
            @endif
            </div>
        </div>
        </article>

        {{-- Alumni Bureau --}}
        <article class="rounded-lg border border-slate-200 shadow-sm bg-white overflow-hidden">
        <div class="w-full aspect-[16/9] bg-slate-100 flex items-center justify-center">
            <img
            src="{{ asset('images/L1227080.JPG') }}"
            alt="Alumni Bureau"
            class="w-full h-full object-cover object-[center_62%]"
            />
        </div>
        <div class="p-5">
            <h3 class="text-xl font-semibold text-slate-900">Alumni Bureau</h3>
            <p class="mt-2 text-slate-600">
            Engage graduates, maintain networks, and create long-term opportunities with our alumni community.
            </p>
            <div class="mt-4 flex items-center gap-3">
            <a href="#about" class="px-4 py-2 rounded-md ring-1 ring-slate-300 text-slate-800 hover:bg-slate-50 transition">View more</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-neutral-900 text-white hover:bg-slate-900 transition">Register</a>
            @endif
            </div>
        </div>
        </article>
    </div>
    </section>

    <!-- SCROLLER -->
    <div class="bg-neutral-900 text-white py-3 border-y border-white text-center text-lg tracking-normal font-normal whitespace-nowrap overflow-hidden">
        @for ($i = 0; $i < 10; $i++)
            Internal Bureau &nbsp;&nbsp;•&nbsp;&nbsp;
            External Bureau &nbsp;&nbsp;•&nbsp;&nbsp;
            Alumni Bureau &nbsp;&nbsp;•&nbsp;&nbsp;
        @endfor
    </div>

</body>
</html>
