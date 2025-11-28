<x-layout>
    <x-slot:header> 

        <!-- Hero Slider -->
        <section id="home" class="hero-slider">
          <!-- Slide 1 -->
          <div class="slide active">
              <img
              src="image/banner1.jpg"
              alt="Gedung sekolah dengan arsitektur modern dan taman hijau"
              class="w-full h-full object-cover"
              />
              <div class="slide-content">
              <div class="container mx-auto px-4">
                  <h2 class="text-3xl md:text-4xl font-bold mb-4">
                  {{ $websiteData->namasekolah }}
                  </h2>
                  <p class="text-lg md:text-xl mb-6">
                  Mencerdaskan Generasi Islami Berbasis Teknologi
                  </p>
                  <a
                  href="#program"
                  class="btn-primary px-6 py-3 rounded-full font-medium inline-block"
                  >Lihat Program Kami</a
                  >
              </div>
              </div>
          </div>

          <!-- Slide 2 -->
          <div class="slide">
              <img
              src="image/banner2.jpg"
              alt="Siswa sedang belajar di laboratorium komputer dengan peralatan modern"
              class="w-full h-full object-cover"
              />
              <div class="slide-content">
              <div class="container mx-auto px-4">
                  <h2 class="text-3xl md:text-4xl font-bold mb-4">
                  Pendidikan Berkualitas
                  </h2>
                  <p class="text-lg md:text-xl mb-6">
                  Gabungan kurikulum nasional, pendidikan Islam, dan teknologi
                  mutakhir
                  </p>
                  <a
                  href="#profile"
                  class="btn-primary px-6 py-3 rounded-full font-medium inline-block"
                  >Tentang Kami</a
                  >
              </div>
              </div>
          </div>

          <!-- Slide 3 -->
          <div class="slide">
              <img
              src="image/banner3.jpg"
              alt="Kegiatan ekstrakurikuler robotika dengan siswa sedang merakit robot"
              class="w-full h-full object-cover"
              />
              <div class="slide-content">
              <div class="container mx-auto px-4">
                  <h2 class="text-3xl md:text-4xl font-bold mb-4">
                  Pengembangan Potensi
                  </h2>
                  <p class="text-lg md:text-xl mb-6">
                  Berbagai program ekstrakurikuler untuk mengasah bakat siswa
                  </p>
                  <a
                  href="#facility"
                  class="btn-primary px-6 py-3 rounded-full font-medium inline-block"
                  >Lihat Fasilitas</a
                  >
              </div>
              </div>
          </div>

          <div class="nav-dots">
              <div class="nav-dot active" data-slide="0"></div>
              <div class="nav-dot" data-slide="1"></div>
              <div class="nav-dot" data-slide="2"></div>
          </div>
        </section>
        
    </x-slot>

    <!-- Profile Section -->
    <section id="profile" class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Profil Sekolah
          </h2>
          <div
            class="section-divider mx-auto my-4 w-24 h-1 bg-blue-600 rounded-full"
          ></div>
          <p class="text-gray-600 max-w-3xl mx-auto">
            {{ $websiteData->namasekolah }} adalah sekolah menengah atas berbasis Islam dengan
            penekanan pada penguasaan teknologi informasi dan komunikasi.
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
                      {{ $websiteData->namasekolah }} <br />dengan kurikulum modern dan
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
              Menjadi lembaga pendidikan unggulan yang mencetak generasi muslim
              berkualitas, berakhlak mulia, dan menguasai teknologi informasi
              dan komunikasi.
            </p>

            <h3 class="text-2xl font-bold text-gray-800 mb-4">Misi</h3>
            <ul class="text-gray-700 space-y-3">
              <li
                class="flex items-start"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                <i class="fas fa-check-circle text-green-600 mt-1 mr-2"></i>
                <span
                  >Menyelenggarakan pendidikan berbasis nilai-nilai Islam</span
                >
              </li>
              <li
                class="flex items-start"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <i class="fas fa-check-circle text-green-600 mt-1 mr-2"></i>
                <span
                  >Mengembangkan kompetensi siswa dalam teknologi
                  informasi</span
                >
              </li>
              <li
                class="flex items-start"
                data-aos="fade-up"
                data-aos-delay="300"
              >
                <i class="fas fa-check-circle text-green-600 mt-1 mr-2"></i>
                <span>Membentuk karakter siswa yang berakhlak mulia</span>
              </li>
              <li
                class="flex items-start"
                data-aos="fade-up"
                data-aos-delay="400"
              >
                <i class="fas fa-check-circle text-green-600 mt-1 mr-2"></i>
                <span
                  >Menyiapkan lulusan yang mampu bersaing di era digital</span
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Program Section -->
    <section id="program" class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="100">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Program Unggulan
          </h2>
          <div class="section-divider mx-auto my-4 w-24 h-1 bg-blue-600 rounded-full"></div>
          <p class="text-gray-600 max-w-3xl mx-auto">
            Berbagai program unggulan yang kami tawarkan untuk pengembangan potensi siswa/i
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          @foreach ($programs as $program)
          <div
            class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl hover:border hover:border-green-600"
            data-aos="zoom-in"
            data-aos-delay="{{ $loop->iteration * 100 }}"
          >
            <div class="h-48 overflow-hidden">
              @if ($program->image)
                <img
                  src="{{ asset('storage/'.$program->image) }}"
                  alt="{{ $program->namaprogram }}"
                  class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                />
              @else
                <img
                  src="{{ asset('image/no-image.jpg') }}"
                  alt="Program default image"
                  class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                />
              @endif
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-2">
                {{ $program->namaprogram }}
              </h3>
              <p class="text-gray-600 mb-4">
                {{ $program->deskripsi }}
              </p>
            </div>
          </div>
          @endforeach

          @if ($programs->isEmpty())
            <p class="text-center text-gray-500 col-span-3">Belum ada program yang ditambahkan.</p>
          @endif
        </div>
      </div>
    </section>

    <!-- Facility Section -->
    <section id="facility" class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Fasilitas Sekolah
          </h2>
          <div
            class="section-divider mx-auto my-4 w-24 h-1 bg-blue-600 rounded-full"
          ></div>
          <p class="text-gray-600 max-w-3xl mx-auto">
            Fasilitas modern dan lengkap untuk mendukung proses pembelajaran
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Fasilitas 1 -->
          <div
            class="bg-white rounded-lg p-6 shadow-md flex items-start transition-transform transform hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 hover:border hover:border-green-500/30 duration-300 ease-out"
          >
            <div
              class="text-green-600 text-3xl mr-4 transition-transform duration-300 group-hover:scale-105"
            >
              <i class="fas fa-laptop"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">
                Lab. Komputer
              </h3>
              <p class="text-gray-600">
                Ruangan ber-AC dengan perangkat komputer terbaru dan koneksi
                internet cepat.
              </p>
            </div>
          </div>

          <!-- Fasilitas 2 -->
          <div
            class="bg-white rounded-lg p-6 shadow-md flex items-start transition-transform transform hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 hover:border hover:border-green-500/30 duration-300 ease-out"
            data-aos="zoom-in-up"
          >
            <div
              class="text-green-600 text-3xl mr-4 transition-transform duration-300 group-hover:scale-105"
            >
              <i class="fas fa-mosque"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Musholla</h3>
              <p class="text-gray-600">
                Tempat ibadah yang nyaman dengan fasilitas wudhu yang memadai.
              </p>
            </div>
          </div>

          <!-- Fasilitas 3 -->
          <div
            class="bg-white rounded-lg p-6 shadow-md flex items-start transition-transform transform hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 hover:border hover:border-green-500/30 duration-300 ease-out"
          >
            <div
              class="text-green-600 text-3xl mr-4 transition-transform duration-300 group-hover:scale-105"
            >
              <i class="fas fa-book"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Perpustakaan</h3>
              <p class="text-gray-600">
                Koleksi buku lengkap dengan ruang baca yang nyaman dan sistem
                digital.
              </p>
            </div>
          </div>

          <!-- Fasilitas 4 -->
          <div
            class="bg-white rounded-lg p-6 shadow-md flex items-start transition-transform transform hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 hover:border hover:border-green-500/30 duration-300 ease-out"
            data-aos="zoom-in-up"
          >
            <div
              class="text-green-600 text-3xl mr-4 transition-transform duration-300 group-hover:scale-105"
            >
              <i class="fas fa-flask"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">
                Laboratorium Sains
              </h3>
              <p class="text-gray-600">
                Peralatan praktikum lengkap untuk mata pelajaran fisika, kimia,
                dan biologi.
              </p>
            </div>
          </div>

          <!-- Fasilitas 5 -->
          <div
            class="bg-white rounded-lg p-6 shadow-md flex items-start transition-transform transform hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 hover:border hover:border-green-500/30 duration-300 ease-out"
          >
            <div
              class="text-green-600 text-3xl mr-4 transition-transform duration-300 group-hover:scale-105"
            >
              <i class="fas fa-basketball-ball"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">
                Lapangan Olahraga
              </h3>
              <p class="text-gray-600">
                Lapangan basket, futsal, dan voli dengan standar kompetisi.
              </p>
            </div>
          </div>

          <!-- Fasilitas 6 -->
          <div
            class="bg-white rounded-lg p-6 shadow-md flex items-start transition-transform transform hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 hover:border hover:border-green-500/30 duration-300 ease-out"
            data-aos="zoom-in-up"
          >
            <div
              class="text-green-600 text-3xl mr-4 transition-transform duration-300 group-hover:scale-105"
            >
              <i class="fas fa-wifi"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">WiFi Area</h3>
              <p class="text-gray-600">
                Akses internet nirkabel kecepatan tinggi di seluruh area
                sekolah.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Galeri Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Galeri Kegiatan
          </h2>
          <div class="section-divider"></div>
          <p class="text-gray-600 max-w-3xl mx-auto">
            Momen-momen berharga di {{ $websiteData->namasekolah }}
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

        <div class="text-center mt-8">
          <a
            href="{{ url('galeri') }}"
            class="btn-primary px-6 py-3 rounded-full font-medium inline-block flex items-center justify-center gap-2"
          >
            <i class="fas fa-images text-lg"></i>
            Lihat Galeri Lainnya
          </a>
        </div>
      </div>
    </section>

    {{-- Tambahkan section kontak --}}
    @include('components.kontak')

</x-layout>