<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - {{ $websiteData->namasekolah }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite('resources/css/app.css')
  </head>

  <body class="bg-gray-100 min-h-screen flex font-sans text-gray-800">
    {{-- Sidebar --}}
    @include('admin.sidebar')

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10">
      <div class="bg-white/70 backdrop-blur-xl shadow-xl rounded-3xl p-8 transition-all duration-500 hover:shadow-[0_10px_25px_rgba(0,0,0,0.08)]">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang, Admin.</h2>
        <p class="text-gray-600 mb-8 text-base">Kelola website dan data pendaftaran siswa baru {{ $websiteData->namasekolah }} melalui panel ini.</p>

        <!-- Grid Cards -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

          <!-- CARD 1 -->
          <a href="{{ route('admin.pendaftaran.index') }}" 
            class="group block bg-white rounded-2xl p-5 flex items-center justify-between 
                    border border-gray-100 shadow-md hover:shadow-lg hover:-translate-y-1 
                    transition-all duration-300 no-underline">
            <div>
              <h3 class="text-base font-semibold text-gray-800 group-hover:text-green-700 transition-colors">
                Total Pendaftar
              </h3>
              <p class="text-3xl font-bold mt-1 text-gray-900">{{ $totalPendaftar ?? '0' }}</p>
              <p class="text-xs text-gray-500 mt-1">+{{ $pendaftarHariIni ?? 0 }} hari ini</p>
            </div>
            <div class="bg-gradient-to-br from-green-100 to-green-200 p-3.5 rounded-xl group-hover:scale-110 transition-transform duration-300">
              <i class="fa-solid fa-users text-2xl text-green-600"></i>
            </div>
          </a>

          <!-- CARD 2 -->
          <a href="{{ route('admin.artikel.index') }}" 
            class="group block bg-white rounded-2xl p-5 flex items-center justify-between 
                    border border-gray-100 shadow-md hover:shadow-lg hover:-translate-y-1 
                    transition-all duration-300 no-underline">
            <div>
              <h3 class="text-base font-semibold text-gray-800 group-hover:text-indigo-700 transition-colors">
                Total Artikel
              </h3>
              <p class="text-3xl font-bold mt-1 text-gray-900">{{ $totalArtikel ?? '0' }}</p>
              <p class="text-xs text-gray-500 mt-1">+{{ $artikelHariIni ?? 0 }} hari ini</p>
            </div>
            <div class="bg-gradient-to-br from-blue-100 to-indigo-200 p-3.5 rounded-xl group-hover:scale-110 transition-transform duration-300">
              <i class="fa-solid fa-pen-nib text-2xl text-indigo-600"></i>
            </div>
          </a>

          <!-- CARD 3 -->
          <a href="{{ route('admin.galeri.index') }}" 
            class="group block bg-white rounded-2xl p-5 flex items-center justify-between 
                    border border-gray-100 shadow-md hover:shadow-lg hover:-translate-y-1 
                    transition-all duration-300 no-underline">
            <div>
              <h3 class="text-base font-semibold text-gray-800 group-hover:text-amber-700 transition-colors">
                Galeri Kegiatan
              </h3>
              <p class="text-3xl font-bold mt-1 text-gray-900">{{ $totalGaleri ?? '0' }}</p>
              <p class="text-xs text-gray-500 mt-1">image</p>
            </div>
            <div class="bg-gradient-to-br from-amber-100 to-yellow-200 p-3.5 rounded-xl 
                        group-hover:scale-110 transition-transform duration-300">
              <i class="fa-solid fa-image text-2xl text-amber-600"></i>
            </div>
          </a>

          <!-- CARD 4 -->
          <a href="{{ route('admin.user.index') }}" 
            class="group block bg-white rounded-2xl p-5 flex items-center justify-between 
                    border border-gray-100 shadow-md hover:shadow-lg hover:-translate-y-1 
                    transition-all duration-300 no-underline">
            <div>
              <h3 class="text-base font-semibold text-gray-800 group-hover:text-indigo-700 transition-colors">
                Settings User
              </h3>
              <p class="text-3xl font-bold mt-1 text-gray-900">{{ $totalUser ?? '0' }}</p>
              <p class="text-xs text-gray-500 mt-1">Pengguna</p>
            </div>
            <div class="bg-gradient-to-br from-indigo-100 to-indigo-300 p-3.5 rounded-xl 
                        group-hover:scale-110 transition-transform duration-300">
              <i class="fa-solid fa-cog text-2xl text-indigo-600"></i>
            </div>
          </a>

        </div>

        <!-- GRID 2 KOLOM: DATA TERBARU -->
        <div class="grid lg:grid-cols-2 gap-8">

        <!-- KOLOM ARTIKEL TERBARU -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-all duration-300">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
              <i class="fa-solid fa-newspaper text-green-500"></i> Artikel Terbaru
            </h3>
            <a href="{{ url('/admin/artikel') }}" 
              class="text-sm text-green-600 hover:text-green-700 hover:underline transition-colors duration-200">
              Lihat semua
            </a>
          </div>

          <ul class="divide-y divide-gray-100">
            @forelse ($artikels as $artikel)
              <li class="py-3 flex justify-between items-center hover:bg-green-50 px-3 rounded-lg transition-all duration-300">
                <div>
                  <p class="font-medium text-gray-800">{{ $artikel->judulartikel }}</p>
                  <p class="text-xs text-gray-500">{{ $artikel->created_at->diffForHumans() }}</p>
                </div>
                <a href="{{ url('/admin/artikel/'.$artikel->id.'/edit') }}" 
                  class="text-green-500 hover:text-green-700 transition-colors duration-200">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
              </li>
            @empty
              <li class="py-3 text-gray-500 text-sm text-center">Belum ada artikel.</li>
            @endforelse
          </ul>
        </div>

          <!-- KOLOM PENDAFTARAN TERBARU -->
          <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <i class="fa-solid fa-user-graduate text-green-500"></i> Pendaftar Terbaru
              </h3>
              <a href="{{ url('/admin/pendaftaran') }}" class="text-sm text-green-600 hover:underline">Lihat semua</a>
            </div>

            <ul class="divide-y divide-gray-100">
              @forelse ($pendaftaran_siswas as $siswa)
                <li class="py-3 flex justify-between items-center hover:bg-green-50 px-2 rounded-lg transition-all duration-200">
                  <div>
                    <p class="font-medium text-gray-800">{{ $siswa->nama_lengkap }}</p>
                    <p class="text-xs text-gray-500">{{ $siswa->created_at->diffForHumans() }}</p>
                  </div>
                  <a href="{{ url('/admin/pendaftaran/'.$siswa->id.'') }}" class="text-green-500 hover:text-green-700">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                </li>
              @empty
                <li class="py-3 text-gray-500 text-sm">Belum ada pendaftar.</li>
              @endforelse
            </ul>
          </div>

        </div>
      </div>
    </main>
  </body>
</html>
