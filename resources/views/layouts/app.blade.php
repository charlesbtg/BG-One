<head>
  <!-- … -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>
<body>
  {{ $slot ?? '' }}

  @livewireScripts
</body>
<!-- Add this to the end of your app.blade.php file -->