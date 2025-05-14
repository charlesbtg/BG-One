{{-- resources/views/layouts/app.blade.php --}}
<!doctype html>
<html lang="en">
<head>
  <!-- ... -->
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/gh/codegear/Puppertino@latest/dist/css/newfull.css"
  > {{-- :contentReference[oaicite:0]{index=0} --}}
  @livewireStyles
</head>
<body class="p-layout bg-gray-100">
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
</body> {{-- contentReference[oaicite:1]{index=1} --}}
</html>
