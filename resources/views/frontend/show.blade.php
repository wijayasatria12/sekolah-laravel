<x-layout>
<x-slot:header></x-slot:header>

  <section class="py-2 mb-6 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-10">

      {{-- 🔹 KONTEN ARTIKEL UTAMA --}}
      <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-8 border border-gray-100" data-aos="fade-up">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 leading-snug mb-4">
          {{ $artikel->judulartikel }}
        </h1>

        <div class="flex items-center text-sm text-gray-500 mb-6">
          <span class="flex items-center gap-2 mr-6">
            <i class="fas fa-user text-green-600"></i> {{ $artikel->author ?? 'Admin' }}
          </span>
          <span class="flex items-center gap-2">
            <i class="fas fa-calendar-alt text-green-600"></i> {{ $artikel->created_at->format('d F Y') }}
          </span>
        </div>

        @if ($artikel->image)
          <div class="rounded-xl overflow-hidden mb-6">
            <img src="{{ asset('storage/' . $artikel->image) }}" 
                 alt="{{ $artikel->judulartikel }}" 
                 class="w-full h-80 object-cover rounded-xl shadow-md transition-transform duration-500 hover:scale-105">
          </div>
        @else
          <div class="rounded-xl overflow-hidden mb-6">
            <img src="{{ asset('image/no-image.jpg') }}" 
                 alt="Default image" 
                 class="w-full h-80 object-cover opacity-80 rounded-xl">
          </div>
        @endif

        <article class="prose max-w-none text-gray-700 leading-relaxed text-justify">
          {!! nl2br(e($artikel->deskripsi)) !!}
        </article>

        <div class="mt-10 text-right">
          <a href="{{ route('artikel') }}"
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-green-600 text-white font-semibold hover:bg-green-700 transition-all duration-300">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Artikel
          </a>
        </div>
      </div>

      {{-- 🔹 SIDEBAR ARTIKEL TERBARU --}}
      <aside class="space-y-6">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6" data-aos="fade-left">
          <h3 class="text-xl font-bold text-gray-800 border-b border-gray-200 pb-3 mb-4 flex items-center gap-2">
            <i class="fas fa-newspaper text-green-600"></i> Artikel Terbaru
          </h3>

          @forelse ($artikels_terbaru as $a)
            <a href="{{ route('artikel.show', $a->id) }}" 
               class="flex items-center gap-4 mb-4 group hover:bg-gray-50 rounded-lg p-2 transition">
              <div class="w-20 h-16 overflow-hidden rounded-lg flex-shrink-0">
                @if ($a->image)
                  <img src="{{ asset('storage/' . $a->image) }}" 
                       alt="{{ $a->judulartikel }}" 
                       class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                @else
                  <img src="{{ asset('image/no-image.jpg') }}" 
                       alt="default" 
                       class="w-full h-full object-cover opacity-80">
                @endif
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 text-sm leading-snug group-hover:text-green-600 transition line-clamp-2">
                  {{ $a->judulartikel }}
                </h4>
                <p class="text-xs text-gray-500 mt-1">
                  {{ $a->created_at->format('d M Y') }}
                </p>
              </div>
            </a>
          @empty
            <p class="text-gray-500 text-sm text-center py-4">Belum ada artikel terbaru.</p>
          @endforelse
        </div>
      </aside>

    </div>
  </section>

  {{-- Tambahkan section kontak --}}
  @include('components.kontak')

</x-layout>
