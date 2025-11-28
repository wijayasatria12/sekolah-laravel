<!-- Sidebar -->
    <aside class="w-64 bg-white/60 backdrop-blur-xl border-r border-gray-200 shadow-lg fixed h-full flex flex-col">
      <!-- Logo Sekolah -->
      <div class="p-2 border-b border-gray-200 text-center">
        <div class="flex flex-col items-center">
          @if($websiteData && $websiteData->logo)
              <img src="{{ asset('uploads/logo/'.$websiteData->logo) }}" 
                  alt="Logo Sekolah" 
                  class="w-28 h-28 mb-0">
          @else
              <img src="{{ asset('image/no-image.jpg') }}" 
                  alt="Logo Sekolah" 
                  class="w-24 h-24 mb-0 opacity-60">
          @endif
          <h1 class="text-lg font-medium text-gray-800">
              {{ $websiteData && $websiteData->namasekolah ? $websiteData->namasekolah : 'Nama Sekolah Belum Diatur' }}
          </h1>
          <p class="text-xs text-gray-500 mt-1">Admin Dashboard</p>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="flex-1 px-3 py-3 space-y-2">
        <a href="{{ url('/admin/dashboard') }}"
          class="group relative flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all duration-300 ease-out
          {{ request()->is('admin/dashboard') 
              ? 'bg-emerald-100 text-emerald-800 shadow-inner scale-[1.02]' 
              : 'hover:bg-gray-100 hover:text-emerald-700 text-gray-700' }}">
          <i class="fa-solid fa-house transition-transform duration-300 group-hover:scale-110"></i>
          Beranda
          @if (request()->is('admin/dashboard'))
              <span class="absolute left-0 top-1/2 -translate-y-1/2 h-[60%] w-[3px] bg-emerald-400 rounded-r-md"></span>
          @endif
        </a>

        <a href="{{ url('/admin/pendaftaran') }}"
          class="group relative flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all duration-300 ease-out
          {{ request()->is('admin/pendaftaran*') 
              ? 'bg-emerald-100 text-emerald-800 shadow-inner scale-[1.02]' 
              : 'hover:bg-gray-100 hover:text-emerald-700 text-gray-700' }}">
          <i class="fa-solid fa-user-graduate transition-transform duration-300 group-hover:scale-110"></i>
          Data Pendaftaran
          @if (request()->is('admin/pendaftaran*'))
              <span class="absolute left-0 top-1/2 -translate-y-1/2 h-[60%] w-[3px] bg-emerald-400 rounded-r-md"></span>
          @endif
        </a>
        
        <a href="{{ url('/admin/program') }}"
          class="group relative flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all duration-300 ease-out
          {{ request()->is('admin/program*') 
              ? 'bg-emerald-100 text-emerald-800 shadow-inner scale-[1.02]' 
              : 'hover:bg-gray-100 hover:text-emerald-700 text-gray-700' }}">
          <i class="fa-solid fa-trophy transition-transform duration-300 group-hover:scale-110"></i>
          Kelola Program
          @if (request()->is('admin/program*'))
              <span class="absolute left-0 top-1/2 -translate-y-1/2 h-[60%] w-[3px] bg-emerald-400 rounded-r-md"></span>
          @endif
        </a>

        <a href="{{ url('/admin/galeri') }}"
          class="group relative flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all duration-300 ease-out
          {{ request()->is('admin/galeri*') 
              ? 'bg-emerald-100 text-emerald-800 shadow-inner scale-[1.02]' 
              : 'hover:bg-gray-100 hover:text-emerald-700 text-gray-700' }}">
          <i class="fa-solid fa-image transition-transform duration-300 group-hover:scale-110"></i>
          Kelola Galeri
          @if (request()->is('admin/galeri*'))
              <span class="absolute left-0 top-1/2 -translate-y-1/2 h-[60%] w-[3px] bg-emerald-400 rounded-r-md"></span>
          @endif
        </a>

        <a href="{{ url('/admin/artikel') }}"
          class="group relative flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all duration-300 ease-out
          {{ request()->is('admin/artikel*') 
              ? 'bg-emerald-100 text-emerald-800 shadow-inner scale-[1.02]' 
              : 'hover:bg-gray-100 hover:text-emerald-700 text-gray-700' }}">
          <i class="fa-solid fa-pen-nib transition-transform duration-300 group-hover:scale-110"></i>
          Kelola Artikel
          @if (request()->is('admin/artikel*'))
              <span class="absolute left-0 top-1/2 -translate-y-1/2 h-[60%] w-[3px] bg-emerald-400 rounded-r-md"></span>
          @endif
        </a>

        <a href="{{ url('/admin/website') }}"
          class="group relative flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all duration-300 ease-out
          {{ request()->is('admin/website*') 
              ? 'bg-emerald-100 text-emerald-800 shadow-inner scale-[1.02]' 
              : 'hover:bg-gray-100 hover:text-emerald-700 text-gray-700' }}">
          <i class="fa-solid fa-gear transition-transform duration-300 group-hover:rotate-45"></i>
          Kelola Website
          @if (request()->is('admin/website*'))
              <span class="absolute left-0 top-1/2 -translate-y-1/2 h-[60%] w-[3px] bg-emerald-400 rounded-r-md"></span>
          @endif
        </a>

        <a href="{{ url('/') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition-all duration-200">
            <i class="fa-solid fa-arrow-left"></i> Lihat Website
        </a>
      </nav>

      <!-- Logout -->
      <form action="{{ route('admin.logout') }}" method="POST" class="mt-auto p-4 border-t border-gray-200">
        @csrf
        <button type="submit"
          class="relative w-full flex items-center justify-center gap-2 
                bg-gradient-to-r from-red-500/80 via-rose-500/80 to-pink-500/80
                hover:from-red-500 hover:via-rose-500 hover:to-pink-500
                text-white/90 py-2.5 rounded-xl font-semibold
                backdrop-blur-md shadow-[0_4px_15px_rgba(0,0,0,0.25)]
                border border-white/10
                transition-all duration-500 ease-out hover:scale-[1.04] hover:shadow-[0_6px_20px_rgba(255,70,70,0.3)]">
          <i class="fa-solid fa-right-from-bracket text-white/90"></i>
          Logout
          <span
            class="absolute inset-0 rounded-xl opacity-0 hover:opacity-20 bg-white transition-opacity duration-300"></span>
        </button>
      </form>
    </aside>