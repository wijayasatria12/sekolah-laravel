<!-- Kontak & Peta Section -->
    <section id="contact" class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Hubungi Kami
          </h2>
          <div class="section-divider"></div>
          <p class="text-gray-600 max-w-3xl mx-auto">
            Kami siap menjawab pertanyaan Anda tentang {{ $websiteData->namasekolah }}
          </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
          <!-- Form Kontak -->
          <div class="lg:w-1/2">
            <div class="bg-white p-8 rounded-lg shadow-md">
              <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
              <form id="whatsappForm">
                <div class="mb-4">
                  <label for="name" class="block text-gray-700 mb-2">Nama Anda</label>
                  <input
                    type="text"
                    id="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                    required
                  />
                </div>

                <div class="mb-4">
                  <label for="email" class="block text-gray-700 mb-2">Email (opsional)</label>
                  <input
                    type="email"
                    id="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                  />
                </div>

                <div class="mb-4">
                  <label for="phone" class="block text-gray-700 mb-2">Nomor WA Anda</label>
                  <input
                    type="tel"
                    id="phone"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                    required
                  />
                </div>

                <div class="mb-4">
                  <label for="message" class="block text-gray-700 mb-2">Isi Pesan/Keperluan</label>
                  <textarea
                    id="message"
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                    required
                  ></textarea>
                </div>

                <button
                  type="submit"
                  class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-full w-full flex items-center justify-center gap-2 transition duration-300"
                >
                  <i class="fab fa-whatsapp text-xl"></i>
                  Kirim Pesan WA
                </button>
              </form>
            </div>
          </div>

          <script>
          document.getElementById('whatsappForm').addEventListener('submit', function(e) {
              e.preventDefault();
              const nama = document.getElementById('name').value.trim();
              const email = document.getElementById('email').value.trim();
              const telepon = document.getElementById('phone').value.trim();
              const pesan = document.getElementById('message').value.trim();
              // Ambil nomor dari database (Blade)
              let nomorTujuan = "{{ $websiteData->no_wa ?? '081234567890' }}";
              // Hapus semua karakter selain angka
              nomorTujuan = nomorTujuan.replace(/[^0-9]/g, '');
              // Jika diawali 0 → ganti jadi 62
              if (nomorTujuan.startsWith('0')) {
                  nomorTujuan = '62' + nomorTujuan.substring(1);
              }
              // Format pesan ke WhatsApp
              const text =
                  `Halo Admin Sekolah,%0A` +
                  `Saya ingin mendaftar / menghubungi melalui form kontak:%0A%0A` +
                  `Nama Saya: ${nama}%0A` +
                  (email ? `Email: ${email}%0A` : '') +
                  `No. WA: ${telepon}%0A` +
                  `Pesan:%0A${pesan}`;
              const url = `https://wa.me/${nomorTujuan}?text=${text}`;
              window.open(url, '_blank');
          });
          </script>

          <!-- Info Kontak & Peta -->
          <div class="lg:w-1/2 space-y-6">
            <div class="bg-white p-8 rounded-lg shadow-md">
              <h3 class="text-2xl font-bold text-gray-800 mb-6">
                Informasi Kontak
              </h3>
              <div class="space-y-4">
                <div class="flex items-start">
                  <div class="text-green-600 text-xl mr-4 mt-1">
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-gray-800">Alamat</h4>
                    <p class="text-gray-600">
                      {{ $websiteData->alamat }}
                    </p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="text-green-600 text-xl mr-4 mt-1">
                    <i class="fas fa-phone-alt"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-gray-800">Telepon/WA</h4>
                    <p class="text-gray-600">{{ $websiteData->no_wa }}</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="text-green-600 text-xl mr-4 mt-1">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-gray-800">Email</h4>
                    <p class="text-gray-600">{{ $websiteData->email }}</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="text-green-600 text-xl mr-4 mt-1">
                    <i class="fas fa-clock"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-gray-800">Jam Operasional</h4>
                    <p class="text-gray-600">Senin-Jumat: 07.30 - 16.00 WIB</p>
                    <p class="text-gray-600">Sabtu: 08.00 - 12.00 WIB</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Peta Sekolah -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
              <div class="h-80 w-full">
                <iframe
                  src="{{ $websiteData->embeded_maps }}"
                  width="100%"
                  height="100%"
                  style="border: 0"
                  allowfullscreen=""
                  loading="lazy"
                  title="Peta Lokasi"
                  aria-label="Peta digital yang menampilkan lokasi sekolah"
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>