@extends('admin.layout')

@section('content')
<div class="max-w-3xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-100">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
      <i class="fa-solid fa-pen-nib text-blue-600"></i>
      {{ $artikel->exists ? 'Edit Artikel' : 'Tambah Artikel Berita' }}
    </h1>
    <a href="{{ route('admin.artikel.index') }}"
       class="inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 transition">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </div>

  <form method="POST"
        action="{{ $artikel->exists ? route('admin.artikel.update', $artikel->id) : route('admin.artikel.store') }}"
        enctype="multipart/form-data"
        class="space-y-6">
    @csrf
    @if($artikel->exists)
      @method('PUT')
    @endif

    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">Nama Author</label>
      <input type="text" name="author"
             value="{{ old('author', $artikel->author) }}"
             placeholder="Masukkan nama author"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
      @error('author')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- judul  -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">Judul Artikel</label>
      <input type="text" name="judulartikel"
             value="{{ old('judulartikel', $artikel->judulartikel) }}"
             placeholder="Masukkan judul artikel"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
      @error('judulartikel')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Deskripsi -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">
        Deskripsi Artikel<span class="text-gray-400 text-sm"></span>
      </label>
      <textarea 
          name="deskripsi" 
          rows="6"          
          placeholder="Tulis deskripsi artikel..."
          class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('deskripsi', $artikel->deskripsi) }}</textarea>

      <div class="flex justify-between text-xs text-gray-500 mt-1">
        <span>Ketik deskripsi artikel.</span>        
      </div>
      @error('deskripsi')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
    
    <!-- Upload Gambar -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">Gambar Artikel (jpg/png)</label>
      <div class="flex items-center gap-4">
        @if($artikel->image)
          <img src="{{ asset('storage/'.$artikel->image) }}"
              class="w-68 h-38 rounded-xl object-cover border shadow-md hover:scale-105 transition-transform duration-200">
        @endif
        <input type="file" name="image"
              class="w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                      file:rounded-lg file:border-0 file:text-sm file:font-semibold
                      file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100
                      cursor-pointer border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 transition">        
      </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
      <a href="{{ route('admin.artikel.index') }}"
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
