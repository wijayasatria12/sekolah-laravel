@extends('admin.layout')

@section('content')
<div class="max-w-3xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-100">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
      <i class="fa-solid fa-users text-blue-600"></i>
      {{ $user->exists ? 'Edit User' : 'Tambah User' }}
    </h1>
    <a href="{{ route('admin.user.index') }}"
       class="inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 transition">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </div>

  <form method="POST"
        action="{{ $user->exists ? route('admin.user.update', $user->id) : route('admin.user.store') }}"
        class="space-y-6">
    @csrf
    @if($user->exists)
      @method('PUT')
    @endif

    <!-- Nama -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">Nama User</label>
      <input type="text" name="name"
             value="{{ old('name', $user->name) }}"
             placeholder="Masukkan nama user"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
      @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
    
    <!-- Email -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">Email User</label>
      <input type="email" name="email"
             value="{{ old('email', $user->email) }}"
             placeholder="Masukkan email user"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
      @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Password -->
    <div>
      <label class="block text-sm font-semibold text-gray-600 mb-2">
        {{ $user->exists ? 'Ubah Password (Opsional)' : 'Password' }}
      </label>
      <input type="password" name="password"
             placeholder="{{ $user->exists ? 'Kosongkan jika tidak ingin mengubah password' : 'Masukkan password user' }}"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
      @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Tombol Aksi -->
    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
      <a href="{{ route('admin.user.index') }}"
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
