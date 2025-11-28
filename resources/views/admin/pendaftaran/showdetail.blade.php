@extends('admin.layout')

@section('content')
<div class="max-w-5xl mx-auto mt-0">
  <!-- Header -->
  <div class="flex items-center justify-between mb-8">
    <h2 class="text-3xl font-semibold text-gray-800 flex items-center gap-3">
      <i class="fa-solid fa-id-card text-blue-600"></i>
      Detail Pendaftaran Siswa
    </h2>
    <a href="{{ route('admin.pendaftaran.index') }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-all duration-300 shadow-sm">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </div>

  <!-- Card Detail -->
  <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="p-8 grid md:grid-cols-2 gap-8">
      <!-- Kolom Kiri -->
      <div class="space-y-3">
        <div>
          <p class="text-sm text-gray-500">Nama Lengkap</p>
          <p class="text-lg font-semibold text-gray-800">{{ $siswa->nama_lengkap }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">NISN</p>
          <p class="text-lg text-gray-800">{{ $siswa->nisn }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Jenis Kelamin</p>
          <p class="text-lg text-gray-800">{{ $siswa->jenis_kelamin }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Tempat, Tanggal Lahir</p>
          <p class="text-lg text-gray-800">{{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Alamat</p>
          <p class="text-lg text-gray-800">{{ $siswa->alamat }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">No. HP</p>
          <p class="text-lg text-gray-800">{{ $siswa->no_hp }}</p>
        </div>
      </div>

      <!-- Kolom Kanan -->
      <div class="space-y-3">
        <div>
          <p class="text-sm text-gray-500">Email</p>
          <p class="text-lg text-gray-800">{{ $siswa->email }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Asal Sekolah</p>
          <p class="text-lg text-gray-800">{{ $siswa->asal_sekolah }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Jurusan Pilihan</p>
          <p class="text-lg font-semibold text-blue-700">{{ $siswa->jurusan_pilihan }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Nama Ayah</p>
          <p class="text-lg text-gray-800">{{ $siswa->nama_ayah }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Nama Ibu</p>
          <p class="text-lg text-gray-800">{{ $siswa->nama_ibu }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Status Pendaftaran</p>
          <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium
              @if($siswa->status_pendaftaran == 'diterima') bg-green-100 text-green-700
              @elseif($siswa->status_pendaftaran == 'ditolak') bg-red-100 text-red-700
              @else bg-yellow-100 text-yellow-700 @endif">
            <i class="fa-solid fa-circle mr-2 text-xs"></i>
            {{ ucfirst($siswa->status_pendaftaran) }}
          </span>
        </div>
      </div>
    </div>

    <!-- Gambar -->
    <div class="border-t border-gray-100 bg-gray-50 p-8 grid sm:grid-cols-2 gap-6">
      <!-- pas foto -->
      <div x-data="{ open: false }" class="relative">
        <h3 class="text-gray-700 font-semibold mb-2 flex items-center gap-2">
          <i class="fa-solid fa-image text-gray-500"></i> Pas Foto
        </h3>
        <!-- Thumbnail -->
        <div 
          class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 w-56 h-56 flex items-center justify-center cursor-pointer hover:opacity-90 transition"
          @click="open = true"
        >
          <img src="{{ asset('storage/'.$siswa->pas_foto) }}" alt="Pas Foto" class="object-cover w-full h-full">
        </div>
        <!-- Modal preview. Pastikan Alpine.js sudah ada di layout.blade.php -->
        <div 
          x-show="open" 
          @click.away="open = false"
          class="fixed inset-0 bg-white/10 backdrop-blur-[2px] flex items-center justify-center z-50"
          x-transition
        >
          <div class="relative">
            <img src="{{ asset('storage/'.$siswa->pas_foto) }}" alt="Preview"
                class="max-w-[90vw] max-h-[85vh] rounded-lg shadow-2xl border-4 border-white">
            <button 
              @click="open = false"
              class="absolute -top-3 -right-3 bg-white text-gray-700 rounded-full p-2 shadow hover:bg-gray-200"
            >
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Scan SKHUN -->
<div x-data="{ open: false }" class="relative">
  <h3 class="text-gray-700 font-semibold mb-2 flex items-center gap-2">
    <i class="fa-solid fa-file-image text-gray-500"></i> Scan SKHUN
  </h3>

  <!-- Thumbnail -->
  <div 
    class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 w-56 h-56 flex items-center justify-center cursor-pointer hover:opacity-90 transition"
    @click="open = true"
  >
    <img src="{{ asset('storage/'.$siswa->scan_skhun) }}" alt="Scan SKHUN" class="object-cover w-full h-full">
  </div>

  <!-- Modal preview -->
  <div 
    x-show="open" 
    @click.away="open = false"
    class="fixed inset-0 bg-white/30 flex items-center justify-center z-50"
    x-transition
  >
    <div class="relative">
      <img src="{{ asset('storage/'.$siswa->scan_skhun) }}" alt="Preview Scan SKHUN"
           class="max-w-[90vw] max-h-[85vh] rounded-lg shadow-2xl border-4 border-white transition-transform duration-200 ease-out">
      <button 
        @click="open = false"
        class="absolute -top-3 -right-3 bg-white text-gray-700 rounded-full p-2 shadow hover:bg-gray-200 transition"
      >
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
  </div>
</div>

    </div>

    <!-- Footer + Aksi -->
    <div class="px-8 py-6 border-t border-gray-100 bg-white flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <p class="text-sm text-gray-500">
        Didaftarkan pada: <strong>{{ $siswa->created_at->format('d M Y H:i') }}</strong><br>
        Terakhir diperbarui: <strong>{{ $siswa->updated_at->format('d M Y H:i') }}</strong>
      </p>

      <div class="flex flex-wrap gap-3 mt-6">

        <!-- Tombol Diterima -->
        <form action="{{ route('admin.pendaftaran.updateStatus', [$siswa->id, 'status' => 'diterima']) }}" method="POST" onsubmit="return confirm('Yakin ingin menandai sebagai DITERIMA?')">
            @csrf
            @method('PATCH')
            <button type="submit"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-green-600 text-white shadow-md hover:shadow-lg hover:scale-[1.03] active:scale-95 transition-all duration-300 backdrop-blur-sm">
            <i class="fa-solid fa-circle-check text-white/90"></i>
            <span class="font-semibold">Diterima</span>
            </button>
        </form>

        <!-- Tombol Ditolak -->
        <form action="{{ route('admin.pendaftaran.updateStatus', [$siswa->id, 'status' => 'ditolak']) }}" method="POST" onsubmit="return confirm('Yakin ingin menandai sebagai DITOLAK?')">
            @csrf
            @method('PATCH')
            <button type="submit"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-rose-500 to-red-600 text-white shadow-md hover:shadow-lg hover:scale-[1.03] active:scale-95 transition-all duration-300 backdrop-blur-sm">
            <i class="fa-solid fa-circle-xmark text-white/90"></i>
            <span class="font-semibold">Ditolak</span>
            </button>
        </form>

        <!-- Tombol Menunggu -->
        <form action="{{ route('admin.pendaftaran.updateStatus', [$siswa->id, 'status' => 'menunggu']) }}" method="POST" onsubmit="return confirm('Kembalikan status menjadi MENUNGGU?')">
            @csrf
            @method('PATCH')
            <button type="submit"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-slate-400 to-gray-500 text-white shadow-md hover:shadow-lg hover:scale-[1.03] active:scale-95 transition-all duration-300 backdrop-blur-sm">
            <i class="fa-solid fa-hourglass-half text-white/90"></i>
            <span class="font-semibold">Menunggu</span>
            </button>
        </form>

        </div>

    </div>
  </div>
</div>
@endsection
