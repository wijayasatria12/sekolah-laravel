<x-layout>
    <x-slot:header> 
        {{-- Kosongkan jika tidak perlu header tambahan --}}
    </x-slot>

    <!-- Section Pendaftaran -->
    <section class="py-6 bg-white rounded-lg">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
            Pendaftaran Online Siswa Baru
          </h2>
          <div class="section-divider"></div>
          <p class="text-gray-600 max-w-3xl mx-auto">
            Formulir pendaftaran online untuk calon siswa/i {{ $websiteData->namasekolah }}
          </p>
        </div>

        {{-- Formulir Pendaftaran --}}
        <div class="max-w-2xl mx-auto bg-gray-50 p-8 rounded-lg shadow">
          @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
              {{ session('success') }}
            </div>
          @endif

          <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block mb-1 font-medium">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full border p-2 rounded" required>
              </div>

              <div>
                <label class="block mb-1 font-medium">NISN</label>
                <input type="text" name="nisn" class="w-full border p-2 rounded">
              </div>

              <div>
                <label class="block mb-1 font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                  <option value="">-- Pilih --</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div>
                <label class="block mb-1 font-medium">Jurusan Pilihan</label>
                <select name="jurusan_pilihan" class="w-full border p-2 rounded" required>
                  <option value="">-- Pilih Jurusan --</option>
                  @foreach($jurusans as $j)
                    <option value="{{ $j->namajurusan }}">{{ $j->namajurusan }}</option>
                  @endforeach
                </select>
              </div>

              <div>
                <label class="block mb-1 font-medium">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="w-full border p-2 rounded" required>
              </div>

              <div>
                <label class="block mb-1 font-medium">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded" required>
              </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="w-full border p-2 rounded" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="w-full border p-2 rounded" required>
                </div>

              <div class="md:col-span-2">
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea name="alamat" class="w-full border p-2 rounded"></textarea>
              </div>

              <div class="md:col-span-2">
                <label class="block mb-1 font-medium">Asal Sekolah</label>
                <input name="asal_sekolah" class="w-full border p-2 rounded" required>
              </div>

              <div>
                <label class="block mb-1 font-medium">Nomor HP</label>
                <input type="text" name="no_hp" class="w-full border p-2 rounded" required>
              </div>

              <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
              </div>
            </div>

       <div class="grid md:grid-cols-2 gap-6 mt-4">
        <!-- Pas Foto -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Pas Foto Terbaru</label>
            <div class="border rounded-lg p-2 flex flex-col items-center justify-center">
            <img id="previewFoto" class="w-32 h-40 object-cover rounded mb-2 hidden" />
            <input 
                type="file" 
                name="pas_foto" 
                accept="image/*" 
                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-green-500 focus:border-green-500"
                onchange="previewImage(event, 'previewFoto')" 
                required
            />
            <p class="text-sm text-gray-500 mt-1">Maximum file size: 2MB</p>
            </div>
        </div>

        <!-- SKHUN -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Scan SKHUN</label>
            <div class="border rounded-lg p-2 flex flex-col items-center justify-center">
            <img id="previewSkhun" class="w-32 h-40 object-cover rounded mb-2 hidden" />
            <input 
                type="file" 
                name="scan_skhun" 
                accept=".jpg,.jpeg,.png,.pdf" 
                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-green-500 focus:border-green-500"
                onchange="previewImage(event, 'previewSkhun')"
                required 
            />
            <p class="text-sm text-gray-500 mt-1">Maximum file size: 2MB</p>
            </div>
        </div>
        </div>

        <script>
        function previewImage(event, previewId) {
        const file = event.target.files[0];
        const preview = document.getElementById(previewId);

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
            preview.src = '';
        }
        }
        </script>

            <br>
            <label class="block text-yellow-500 font-small mb-1">*Pastikan data diisi dengan lengkap dan benar sebelum klik tombol Kirim</label>
            <div class="mt-6">
                <button
                    type="submit"
                    class="flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-full w-full transition duration-300 shadow-md hover:shadow-lg"
                >
                    <i class="fa-solid fa-paper-plane text-white"></i>
                    Kirim Pendaftaran
                </button>
            </div>
            <br>
          </form>
        </div>

      </div>
    </section>
</x-layout>
