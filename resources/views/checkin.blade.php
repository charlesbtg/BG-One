{{-- resources/views/checkin.blade.php --}}
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    {{-- your global CSS / meta tags --}}
    @livewireStyles
  </head>
  <body class="p-layout bg-gray-100">
    <nav class="bg-gray-800 text-white p-4 flex justify-between">
      <a href="{{ route('home') }}" class="hover:underline">Home</a>
      <a href="{{ route('checkin') }}" class="hover:underline">Check-In</a>
    </nav>

    <main class="py-8">
      {{-- Here Livewire actually boots your component class: --}}
      <livewire:checkin-wizard />
    </main>

    @livewireScripts
  </body>
</html>
