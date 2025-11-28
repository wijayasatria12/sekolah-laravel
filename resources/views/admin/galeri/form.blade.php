@extends('admin.layout')

@section('content')
<div class="max-w-3xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-100">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
      <i class="fa-solid fa-image text-blue-600"></i>
      {{ $galeri->exists ? 'Edit Galeri Kegiatan' : 'Tambah Galeri Kegiatan' }}
    </h1>
    <a href="{{ route('admin.galeri.index') }}"
       class="inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 transition">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </div>

  <form method="POST"
        action="{{ $galeri->exists ? route('admin.galeri.update', $galeri->id) : route('admin.galeri.store') }}"
        enctype="multipart/form-data"
        class="space-y-6">
    @csrf
    @if($galeri->exists)
      @method('PUT')
    @endif

    <!-- Nama  -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">Judul Galeri</label>
      <input type="text" name="judulgaleri"
             value="{{ old('judulgaleri', $galeri->judulgaleri) }}"
             placeholder="Masukkan judul galeri"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
      @error('judulgaleri')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Deskripsi -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">
        Deskripsi <span class="text-gray-400 text-sm">(maks. 100 karakter)</span>
      </label>
      <textarea 
          name="deskripsi" 
          rows="4"
          maxlength="100"
          oninput="updateCharCount(this)"
          placeholder="Tulis deskripsi singkat galeri..."
          class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

      <div class="flex justify-between text-xs text-gray-500 mt-1">
        <span>Ketik deskripsi singkat galeri.</span>
        <span id="charCount" class="font-medium">0 / 100</span>
      </div>
      @error('deskripsi')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
    <script>
    function updateCharCount(textarea) {
      const counter = document.getElementById('charCount');
      counter.textContent = textarea.value.length + ' / 100';
    }
    document.addEventListener('DOMContentLoaded', () => {
      const textarea = document.querySelector('textarea[name="deskripsi"]');
      if (textarea) updateCharCount(textarea);
    });
    </script>

    <!-- Upload Gambar -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">Gambar Galeri Kegiatan (jpg/png)</label>
      <div class="flex items-center gap-4">
        <input type="file" name="image"
               class="w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                      file:rounded-lg file:border-0 file:text-sm file:font-semibold
                      file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100
                      cursor-pointer border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 transition">
        @if($galeri->image)
          <img src="{{ asset('storage/'.$galeri->image) }}"
               class="w-20 h-20 rounded-lg object-cover border shadow-sm">
        @endif
      </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
      <a href="{{ route('admin.galeri.index') }}"
         class="px-5 py-2.5 rounded-xl bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
        <i class="fa-solid fa-xmark mr-2"></i> Batal
      </a>
      <button type="submit"
              class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2">
        <i class="fa-solid fa-save animate-pulse-slow"></i> Simpan
      </button>
    </div>
  </form>
</div>

<style>
@keyframes pulse-slow {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.1); opacity: 0.8; }
}
.animate-pulse-slow {
  animation: pulse-slow 2s infinite;
}
</style>
@endsection
