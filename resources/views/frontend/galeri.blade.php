<x-layout>
    <x-slot:header> 
        
    </x-slot>

    <!-- Galeri Section -->
    <section class="py-6 bg-white rounded-lg">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Galeri Kegiatan
          </h2>
          <div class="section-divider"></div>
          <p class="text-gray-600 max-w-3xl mx-auto">
            Momen-momen berharga siswa-siswi dan para tenaga pengajar di {{ $websiteData->namasekolah }}
          </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          @forelse ($galeris as $item)
            <div class="relative overflow-hidden rounded-lg group">
              @php
                  // Tentukan path gambar
                  $path = $item->image 
                      ? (file_exists(public_path('storage/' . $item->image)) 
                          ? asset('storage/' . $item->image) 
                          : asset('image/' . $item->image))
                      : asset('image/no-image.jpg');
              @endphp

              <img
                src="{{ $path }}"
                alt="{{ $item->deskripsi ?? $item->judulgaleri }}"
                class="w-full h-48 object-cover transition duration-500 group-hover:scale-110 group-hover:blur-sm"
              />

              <div
                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500"
              >
                <p class="text-white text-center text-sm font-medium">
                  {{ $item->judulgaleri ?? 'Tanpa Judul' }}
                </p>
              </div>
            </div>
          @empty
            <div class="col-span-4 text-center text-gray-500 py-8">
              <i class="fas fa-image text-4xl mb-2"></i>
              <p>Tidak ada data galeri untuk ditampilkan.</p>
            </div>
          @endforelse
        </div>

      </div>
    </section>

    {{-- Tambahkan section kontak --}}
    @include('components.kontak')

</x-layout>