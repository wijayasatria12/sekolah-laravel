<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin - {{ $websiteData->namasekolah }}</title>
  {{-- Favicon dinamis dari field logo --}}
    @if(!empty($websiteData->logo))
        <link rel="icon" type="image/png" href="{{ asset('uploads/logo/'.$websiteData->logo) }}">
    @else
        {{-- fallback icon jika logo belum diupload --}}
        <link rel="icon" type="image/png" href="{{ asset('image/no-image.jpg') }}">
    @endif
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex font-sans text-gray-800">
  {{-- Tambahkan sidebar --}}
  @include('admin.sidebar')

  <main class="flex-1 ml-64 p-10 animate-fadeIn">
    @yield('content')
  </main>

  <!-- Pastikan Alpine.js sudah aktif (untuk perbesar foto pendaftar) -->
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
