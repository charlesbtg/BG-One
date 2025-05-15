<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check-In — Bella</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^3/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow p-4">
        <a href="{{ route('home') }}" class="font-medium mr-4">Home</a>
        <a href="{{ route('checkin') }}" class="font-medium">Check-In</a>
    </nav>

    <main class="max-w-3xl mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">Welcome to Bella</h1>
        {{-- This is what boots your Livewire component --}}
        <livewire:checkin-wizard />
    </main>

    @livewireScripts
</body>
</html>
