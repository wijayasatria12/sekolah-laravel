<x-layout>
    <x-slot:header> 
        
    </x-slot>

    <section id="tentang" class="py-4 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Tentang {{ $websiteData->namasekolah }}
          </h2>
          <div
            class="section-divider mx-auto my-4 w-12 h-1 bg-blue-600 rounded-full"
          ></div>
        </div>

        <!-- Sejarah -->
        <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="md:w-1/2" data-aos="fade-left">
                <p class="text-gray-600 max-w-3xl mx-auto">
                    {{ $websiteData->sejarah }}
                </p>
            </div>
          <div
            class="w-full mb-8 md:w-1/2 md:mb-0 md:pr-8 flex justify-center"
            data-aos="fade-right"
          >
            <div
              class="relative w-full h-[300px] sm:h-[350px] md:h-[400px] [perspective:1000px]"
            >
              <div
                class="w-full h-full transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180"
              >
                <div class="absolute w-full h-full backface-hidden">
                  <img
                    src="image/tentang1.jpg"
                    alt="alt2"
                    class="rounded-xl shadow-xl w-full h-full object-cover"
                  />
                </div>
                <div
                  class="absolute w-full h-full rotate-y-180 backface-hidden rounded-xl shadow-xl overflow-hidden"
                >
                  <img
                    src="image/tentang1.jpg"
                    alt="alt"
                    class="w-full h-full object-cover"
                  />
                  <div
                    class="absolute inset-0 bg-black/50 flex items-center justify-center px-4"
                  >
                    <p
                      class="text-white font-semibold text-xl text-center drop-shadow-lg leading-relaxed"
                    >
                      Sejarah dan Perjalanan <br /> {{ $websiteData->namasekolah }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <style>
              /* efek flip gambar */
              .transform-style-preserve-3d {
                transform-style: preserve-3d;
              }
              .backface-hidden {
                backface-visibility: hidden;
              }
              .rotate-y-180 {
                transform: rotateY(180deg);
              }
              .hover\:rotate-y-180:hover {
                transform: rotateY(180deg);
              }
            </style>
          </div>
        </div>
        
        <!-- Visi Misi -->
        <div class="text-center py-16 mb-0" data-aos="fade-up">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Visi dan Misi
          </h2>
          <div
            class="section-divider mx-auto my-4 w-12 h-1 bg-blue-600 rounded-full"
          ></div>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Visi dan Misi {{ $websiteData->namasekolah }}
            </p>
        </div>
        <div class="flex flex-col md:flex-row gap-8 items-center">
          <div
            class="w-full mb-8 md:w-1/2 md:mb-0 md:pr-8 flex justify-center"
            data-aos="fade-right"
          >
            <div
              class="relative w-full h-[300px] sm:h-[350px] md:h-[400px] [perspective:1000px]"
            >
              <div
                class="w-full h-full transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180"
              >
                <div class="absolute w-full h-full backface-hidden">
                  <img
                    src="image/tentang.webp"
                    alt="alt2"
                    class="rounded-xl shadow-xl w-full h-full object-cover"
                  />
                </div>
                <div
                  class="absolute w-full h-full rotate-y-180 backface-hidden rounded-xl shadow-xl overflow-hidden"
                >
                  <img
                    src="image/tentang.webp"
                    alt="alt"
                    class="w-full h-full object-cover"
                  />
                  <div
                    class="absolute inset-0 bg-black/50 flex items-center justify-center px-4"
                  >
                    <p
                      class="text-white font-semibold text-xl text-center drop-shadow-lg leading-relaxed"
                    >
                      {{ $websiteData->namasekolah }}<br />dengan kurikulum modern dan
                      religius!
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <style>
              /* efek flip gambar */
              .transform-style-preserve-3d {
                transform-style: preserve-3d;
              }
              .backface-hidden {
                backface-visibility: hidden;
              }
              .rotate-y-180 {
                transform: rotateY(180deg);
              }
              .hover\:rotate-y-180:hover {
                transform: rotateY(180deg);
              }
            </style>
          </div>

          <div class="md:w-1/2" data-aos="fade-left">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Visi</h3>
            <p class="text-gray-700 mb-6">
              {{ $websiteData->visi }}
            </p>

            <h3 class="text-2xl font-bold text-gray-800 mb-4">Misi</h3>
            <ul class="text-gray-700 space-y-3">
              <!-- pecah teks berdasarkan baris baru (\n) langsung di Blade dengan fungsi explode() dan looping tiap item. agar tiap baris ada icon cek nya -->
                @foreach(explode("\n", $websiteData->misi ?? '') as $misi)
                    @if(trim($misi) != '')
                        <li class="flex items-start" data-aos="fade-up" data-aos-delay="100">
                            <i class="fas fa-check-circle text-green-600 mt-1 mr-2"></i>
                            <span>{{ trim($misi) }}</span>
                        </li>
                    @endif
                @endforeach
            </ul>
          </div>
        </div>

      </div>
    </section>

    {{-- Tambahkan section kontak --}}
    @include('components.kontak')

</x-layout>