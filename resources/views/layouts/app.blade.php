{{-- resources/views/layouts/app.blade.php --}}
<head>
  <!-- ... -->
  @livewireStyles
</head>
<body>
  <nav>
    {{-- replace any of these… --}}
    <a href="{{ route('home') }}">Home</a>
    {{-- …with: --}}
    <a href="{{ route('checkin') }}">Check‑In</a>
  </nav>
  <main>
    @yield('content')
  </main>

  @livewireScripts
</body>
