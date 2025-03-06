<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $heading }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
  <!-- Header with title on left, nav on right -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <!-- Title on left -->
      <a href="/"><h1 class="text-xl font-bold text-gray-800">MoveMate</h1></a>
      
      <!-- Navigation on right -->
      <x-nav />

    </div>
  </header>

  <!-- Main content -->
  <main class="flex-grow container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">{{ $heading }}</h1>
    {{ $slot }}
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-4">
      <p class="text-center">&copy; 2025 My Website. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>