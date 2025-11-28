@extends('admin.layout')

@section('content')
<div class="min-h-screen bg-gray-50 py-5 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8 border-b pb-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    <i class="fa-solid fa-cog text-green-600"></i> Pengaturan Profil Sekolah</h1>
                <p class="text-gray-500 text-sm mt-1">Perbarui informasi utama website sekolah Anda</p>
            </div>
            <div>
                <a href="{{ url('/') }}" target="_blank" 
                   class="inline-flex items-center text-green-600 hover:text-green-800 text-sm font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 3v4a1 1 0 001 1h4m-5 9v5m0-5l3 3m-3-3l-3 3M5 12h14" />
                    </svg>
                    Lihat Website
                </a>
            </div>
        </div>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="bg-green-50 text-green-800 px-4 py-3 rounded-lg mb-6 border border-green-200">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('website.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Logo --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Logo Sekolah</label>
                <div class="flex items-center gap-6">
                    @if($website->logo)
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('uploads/logo/'.$website->logo) }}" 
                                alt="Logo Sekolah"
                                class="h-28 w-28 object-contain border rounded-xl shadow-md bg-white p-2 hover:scale-105 transition-transform duration-300">
                            <p class="text-xs text-gray-500 mt-1">Pratinjau Logo</p>
                        </div>
                    @else
                        <div class="h-28 w-28 flex flex-col items-center justify-center bg-gray-100 text-gray-400 rounded-xl border border-gray-200">
                            No Logo
                            <p class="text-xs text-gray-400 mt-1">Belum diunggah</p>
                        </div>
                    @endif

                    <div class="flex-1">
                        <input type="file" name="logo"
                            class="w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100
                                cursor-pointer border border-gray-300 rounded-xl focus:ring-2 
                                focus:ring-blue-500 transition">
                        <p class="text-xs text-gray-400 mt-1">Format: JPG, JPEG, PNG (maks 2MB)</p>
                    </div>
                </div>
            </div>

            {{-- Nama & Judul --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Nama Sekolah</label>
                    <input type="text" name="namasekolah"
                        value="{{ old('namasekolah', $website->namasekolah) }}"
                        class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200"
                        required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Judul Kecil (dibawah nama sekolah)</label>
                    <input type="text" name="judulkecil"
                        value="{{ old('judulkecil', $website->judulkecil) }}"
                        class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200"
                        required>
                </div>
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Alamat Sekolah</label>
                <textarea name="alamat" rows="2"
                    class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200">{{ old('alamat', $website->alamat) }}</textarea>
            </div>

            {{-- Kontak --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Nomor WhatsApp (Isi nomor wa yang aktif)</label>
                    <input type="text" name="no_wa"
                        value="{{ old('no_wa', $website->no_wa) }}"
                        class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200"
                        placeholder="contoh: 082112345678">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email"
                        value="{{ old('email', $website->email) }}"
                        class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200">
                </div>
            </div>

            {{-- Sejarah / Visi / Misi --}}
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Sejarah Singkat</label>
                    <textarea name="sejarah" rows="4"
                        class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200">{{ old('sejarah', $website->sejarah) }}</textarea>
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Visi</label>
                    <textarea name="visi" rows="4"
                        class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200">{{ old('visi', $website->visi) }}</textarea>
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Misi</label>
                    <textarea name="misi" rows="4"
                        class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200">{{ old('misi', $website->misi) }}</textarea>
                </div>
            </div>

            {{-- Embed Maps --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Embeded Maps (iframe)</label>
                <textarea name="embeded_maps" rows="3"
                    class="w-full rounded-lg border border-gray-300 bg-white text-gray-800 
                            placeholder-gray-400 p-2.5 shadow-sm 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                            transition-all duration-200">{{ old('embeded_maps', $website->embeded_maps) }}</textarea>
                <p class="text-sm text-gray-400 mt-1">Masukkan kode embed dari Google Maps.</p>
            </div>

            {{-- Tombol --}}
            <div class="pt-4 border-t mt-8 flex justify-end">
                <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-2xl shadow hover:bg-blue-700 transition-all duration-200">
                    <i class="fa-solid fa-save animate-pulse-slow"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
