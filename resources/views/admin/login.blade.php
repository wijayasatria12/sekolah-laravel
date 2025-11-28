<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin - {{ $websiteData->namasekolah }}</title>
    <script src="https://kit.fontawesome.com/a2d9d5a64c.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <style>
      :root {
        --primary: #16a34a;
        --surface: #1e293b;
      }
      .bg-surface {
        background-color: var(--surface);
      }
      .text-primary {
        color: var(--primary);
      }
      .bg-primary {
        background-color: var(--primary);
      }
    </style>
  </head>

  <body class="flex items-center justify-center min-h-screen text-gray-100 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">

    <div class="bg-surface border border-gray-700 shadow-2xl rounded-2xl p-8 w-full max-w-md backdrop-blur-xl">
      <!-- Logo -->
      <div class="flex justify-center mb-0">
        <img src="{{ asset('uploads/logo/'.$websiteData->logo) }}" alt="Logo Sekolah" class="w-30 h-30 object-contain">
      </div>

      <!-- Judul -->
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white">Login Admin Sekolah</h2>
        <p class="text-gray-400 text-sm mt-1">Masuk untuk mengelola website sekolah</p>
      </div>

      <!-- Form Login -->
      <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div class="mb-5">
          <label for="email" class="block text-gray-300 font-medium mb-2">
            <i class="fa-solid fa-envelope mr-2 text-primary"></i>Email
          </label>
          <input
            type="email"
            id="email"
            name="email"
            required
            class="w-full px-4 py-2 bg-gray-800 text-gray-100 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition duration-200"
            placeholder="email"
          />
        </div>

        <div class="mb-6">
          <label for="password" class="block text-gray-300 font-medium mb-2">
            <i class="fa-solid fa-lock mr-2 text-primary"></i>Password
          </label>
          <input
            type="password"
            id="password"
            name="password"
            required
            class="w-full px-4 py-2 bg-gray-800 text-gray-100 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition duration-200"
            placeholder="••••••••"
          />
        </div>

        @if(session('error'))
        <div class="mb-4 text-red-400 text-sm bg-red-900/40 p-3 rounded-lg border border-red-700">
          {{ session('error') }}
        </div>
        @endif

        <button
          type="submit"
          class="w-full bg-primary hover:bg-green-500 text-white font-semibold py-3 rounded-full flex items-center justify-center gap-2 shadow-md transition duration-300"
        >
          <i class="fa-solid fa-right-to-bracket"></i>
          Masuk Sekarang
        </button>
      </form>

      <!-- Link ke Beranda -->
      <div class="text-center mt-6">
        <a href="{{ url('/') }}" class="text-primary hover:underline flex items-center justify-center gap-2">
          <i class="fa-solid fa-house"></i>
          <span>Kembali ke Beranda</span>
        </a>
      </div>

      <p class="text-center text-xs text-gray-500 mt-4">
        © {{ date('Y') }} {{ $websiteData->namasekolah }}. All rights reserved.
      </p>
    </div>

  </body>
</html>
