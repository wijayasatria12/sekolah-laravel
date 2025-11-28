@extends('admin.layout')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 mt-8 border border-gray-100">

  <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
    <i class="fa-solid fa-pen-to-square text-yellow-500"></i>
    Edit Data Pendaftaran Siswa
  </h2>

  <form action="{{ route('admin.pendaftaran.update', $siswa->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    {{-- Nama Lengkap --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
      <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}"
        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    {{-- NISN --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-2">NISN</label>
      <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn) }}"
        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    {{-- Jenis Kelamin --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-2">Jenis Kelamin</label>
      <select name="jenis_kelamin"
        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    {{-- Tempat & Tanggal Lahir --}}
    <div class="grid sm:grid-cols-2 gap-4">
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
    </div>

    {{-- Alamat --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
      <textarea name="alamat" rows="3"
        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('alamat', $siswa->alamat) }}</textarea>
    </div>

    {{-- No HP & Email --}}
    <div class="grid sm:grid-cols-2 gap-4">
      <div>
        <label class="block text-gray-700 font-semibold mb-2">No. HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp', $siswa->no_hp) }}"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email', $siswa->email) }}"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
    </div>

    {{-- Jurusan Pilihan --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-2">Jurusan Pilihan</label>
      <select name="jurusan_pilihan"
              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
              required>
        <option value="">-- Pilih Jurusan --</option>
        @foreach($jurusans as $j)
          <option value="{{ $j->namajurusan }}"
            {{ old('jurusan_pilihan', $siswa->jurusan_pilihan) == $j->namajurusan ? 'selected' : '' }}>
            {{ $j->namajurusan }}
          </option>
        @endforeach
      </select>
      @error('jurusan_pilihan')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Nama Ayah & Ibu --}}
    <div class="grid sm:grid-cols-2 gap-4">
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Nama Ayah</label>
        <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $siswa->nama_ayah) }}"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Nama Ibu</label>
        <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $siswa->nama_ibu) }}"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
    </div>

    {{-- Asal Sekolah --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-2">Asal Sekolah</label>
      <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $siswa->asal_sekolah) }}"
        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    {{-- Status Pendaftaran --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-2">Status Pendaftaran</label>
      <select name="status_pendaftaran"
        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        <option value="menunggu" {{ $siswa->status_pendaftaran == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
        <option value="diterima" {{ $siswa->status_pendaftaran == 'diterima' ? 'selected' : '' }}>Diterima</option>
        <option value="ditolak" {{ $siswa->status_pendaftaran == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
      </select>
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex justify-end gap-4 pt-4">
      <a href="{{ route('admin.pendaftaran.index') }}"
        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gray-200 text-gray-700 hover:bg-gray-300 transition-all duration-300">
        <i class="fa-solid fa-arrow-left"></i>
        Batal
      </a>

      <button type="submit"
        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow-md hover:shadow-lg hover:scale-[1.02] transition-all duration-300">
        <i class="fa-solid fa-floppy-disk"></i>
        Simpan Perubahan
      </button>
    </div>

  </form>
</div>
@endsection
