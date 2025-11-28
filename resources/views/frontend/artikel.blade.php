<x-layout>
    
    <x-slot:header></x-slot:header>

    <section class="py-6 mb-16 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Artikel dan Berita Terbaru
                </h2>
                <div class="mx-auto my-4 w-24 h-1 bg-green-600 rounded-full"></div>
                <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Ikuti kabar terbaru, kegiatan, dan prestasi siswa {{ $websiteData->namasekolah }}.
                </p>
            </div>

            {{-- Daftar Artikel --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse ($artikels as $artikel)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl border border-gray-100">
                        <div class="relative overflow-hidden h-56">
                            @if ($artikel->image)
                                <img 
                                    src="{{ asset('storage/' . $artikel->image) }}" 
                                    alt="{{ $artikel->judulartikel }}" 
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                            @else
                                <img 
                                    src="{{ asset('image/no-image.jpg') }}" 
                                    alt="Default image" 
                                    class="w-full h-full object-cover opacity-70"
                                >
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        </div>

                        <div class="p-6 flex flex-col justify-between h-[260px]">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-green-600 transition-colors duration-300">
                                    {{ $artikel->judulartikel }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($artikel->deskripsi), 150) }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between text-xs text-gray-500 mt-auto">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-user"></i>
                                    <span>{{ $artikel->author ?? 'Admin' }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ $artikel->created_at->format('d-m-Y') }}</span>
                                </div>
                            </div>

                            <div class="mt-5">
                                <a href="{{ route('artikel.show', $artikel->id) }}" 
                                   class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-all duration-300">
                                    <i class="fas fa-arrow-right"></i> Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Belum ada artikel yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Tambahkan section kontak --}}
    @include('components.kontak')

</x-layout>
