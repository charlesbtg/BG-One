{{-- resources/views/layouts/app.blade.php --}}
<head>
  <!-- ... -->
  @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">
  <nav class="bg-gray-800 text-white p-4 flex justify-between">
    {{-- replace any of these… --}}
    <a href="{{ route('home') }}" class="hover:underline">Home</a>
    {{-- …with: --}}
    <a href="{{ route('checkin') }}" class="hover:underline">Check‑In</a>
  </nav>
  <main class="py-8">
    @yield('content')
  </main>

  @livewireScripts
</body>
